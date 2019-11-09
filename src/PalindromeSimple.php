<?php

namespace Korobovn;

class PalindromeSimple implements PalindromeInterface
{

    /**
     * решение "в лоб"
     * @param string $string
     * @return string
     */
    public function find(string $string): string
    {
        $preparedString = mb_strtolower(preg_replace('/[^a-zA-Zа-яА-Я0-9]/ui', '', $string), 'utf8');
        if (mb_strlen($preparedString, 'utf8') < 2) {
            return $string;
        }

        if ($this->isPalindrome($preparedString)) {
            return $string;
        }

        $palindromes = $this->findSubPalindromes($preparedString);

        if ($palindromes) {
            $palindrome = $this->getLongestPalindrome($palindromes);
            return $palindrome;
        }

        return mb_substr($string, 0, 1, 'utf8');
    }

    /**
     * @param array $palindromes
     * @return string
     */
    protected function getLongestPalindrome(array $palindromes): string
    {
        /**
         * Возможно, тут было бы проще и читабельнее сделать простым циклом,
         * предположим, что продемонстрировал знание некоторых функций работы с массивами)
         */
        $utf8 = array_fill(0, count($palindromes), 'utf8');
        $lengths = array_map('mb_strlen', $palindromes, $utf8);
        $maxValue = max($lengths);
        $index = array_search($maxValue, $lengths);

        return $palindromes[$index];
    }

    /**
     * @param string $preparedString
     * @return array
     */
    protected function findSubPalindromes(string $preparedString): array
    {
        $subPalindromes = [];
        for ($startPos = 1; $startPos < mb_strlen($preparedString, 'utf8') - 1; $startPos++) {
            for ($length = mb_strlen($preparedString, 'utf8') - $startPos; $length > 1; $length--) {
                $subStr = mb_substr($preparedString, $startPos, $length, 'utf8');
                if ($this->isPalindrome($subStr)) {
                    $subPalindromes[] = $subStr;
                }
            }
        }

        return $subPalindromes;
    }

    /**
     * @param string $string
     * @return bool
     */
    protected function isPalindrome(string $string): bool
    {
        return $string == $this->mbStrrev($string);
    }

    /**
     * @param string $str
     * @return string
     */
    protected function mbStrrev(string $str)
    {
        /**
         * @todo можно сделать более оптимизировано
         */
        $r = '';
        for ($i = mb_strlen($str, 'utf8'); $i >= 0; $i--) {
            $r .= mb_substr($str, $i, 1, 'utf8');
        }
        return $r;
    }

}