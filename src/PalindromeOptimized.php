<?php

namespace Korobovn;

class PalindromeOptimized implements PalindromeInterface
{

    /**
     * @var int
     */
    protected $leftIndex = 0;

    /**
     * @var int
     */
    protected $rightIndex = 0;

    /**
     * @var int
     */
    protected $maxLength = 0;

    /**
     * @param string $string
     * @return string
     */
    public function find(string $string): string
    {
        $preparedString = mb_strtolower(preg_replace('/[^a-zA-Zа-яА-Я0-9]/ui', '', $string), 'utf8');
        if (mb_strlen($preparedString, 'utf8') < 2) {
            return $string;
        }

        $chars = preg_split('//u', $preparedString, NULL, PREG_SPLIT_NO_EMPTY);

        for ($i = 1; $i < count($chars); $i++) {
            $this->checkPalindrome($chars, $i, false);
            $this->checkPalindrome($chars, $i, true);
        }

        if ($this->maxLength && $this->maxLength < count($chars)) {
            $string = implode('', array_slice($chars, $this->leftIndex, $this->rightIndex - $this->leftIndex + 1));

        } elseif (!$this->maxLength) {
            $string = $chars[0];
        }

        return $string;
    }

    /**
     * @param array $chars
     * @param int $center
     * @param bool $even
     */
    protected function checkPalindrome(array $chars, int $center, bool $even)
    {
        $centerOffset = $even ? 1 : 0;
        $leftIndex = $center - $centerOffset;
        $rightIndex = $center + 1;
        $length = $rightIndex - $leftIndex + 1;

        $possibleMaxLength = $centerOffset + min($leftIndex + 1, count($chars) - $rightIndex) * 2;
        if ($this->maxLength >= $possibleMaxLength) {
            return;
        }

        while (
            $leftIndex >= 0 &&
            $rightIndex < count($chars) &&
            $chars[$leftIndex] == $chars[$rightIndex]
        ) {
            if ($length > $this->maxLength) {
                $this->maxLength = $length;
                $this->leftIndex = $leftIndex;
                $this->rightIndex = $rightIndex;
            }
            $length += 2;
            $leftIndex--;
            $rightIndex++;
        }

    }

}