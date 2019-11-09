<?php


namespace Korobovn;


interface PalindromeInterface
{

    /**
     * @param string $string
     * @return string
     */
    public function find(string $string): string;

}