<?php

namespace Korobovn\Tests;

use Korobovn\PalindromeInterface;
use Korobovn\PalindromeSimple;
use PHPUnit\Framework\TestCase;


class PalindromeSimpleTest extends TestCase
{
    /**
     * @var PalindromeInterface
     */
    protected $palindrome;

    public function setUp(): void
    {
        $this->palindrome = new PalindromeSimple();
    }


    public function testExample1()
    {
        $string = 'Sum summus mus';
        $palindrome = $this->palindrome->find($string);
        $this->assertSame('Sum summus mus', $palindrome);
    }

    public function testExample2()
    {
        $string = 'Аргентина манит негра';
        $palindrome = $this->palindrome->find($string);
        $this->assertSame('Аргентина манит негра', $palindrome);
    }


    public function testSub1()
    {
        $string = 'вывыв вот мой палиндром морднилап йом тов';
        $palindrome = $this->palindrome->find($string);

        /**
         * возможно, тут нужно было пробелы сохранить
         */
        $this->assertSame('вотмойпалиндромморднилапйомтов', $palindrome);
    }

    public function testNoPalindrome()
    {
        $string = 'абвгдежз';
        $palindrome = $this->palindrome->find($string);

        $this->assertSame('а', $palindrome);
    }

    public function testMaxSubPalindrome()
    {
        $string = '1234554321 098767890 12345678900987654321';
        $palindrome = $this->palindrome->find($string);

        $this->assertSame('12345678900987654321', $palindrome);
    }

    public function test1()
    {
        $string = 'На баклажан нажал кабан';
        $palindrome = $this->palindrome->find($string);

        $this->assertSame('На баклажан нажал кабан', $palindrome);
    }

    public function test2()
    {
        $string = 'Рожа хуем у Вас а в уме ухажор';
        $palindrome = $this->palindrome->find($string);

        $this->assertSame('Рожа хуем у Вас а в уме ухажор', $palindrome);
    }

    public function test3()
    {
        $string = 'Рожа хуем у Вас, а в уме ухажор.';
        $palindrome = $this->palindrome->find($string);

        $this->assertSame('Рожа хуем у Вас, а в уме ухажор.', $palindrome);
    }

    public function test4()
    {
        $string = 'Тип откусил нос собаки Бобика. Босс, он ли сук топит?';
        $palindrome = $this->palindrome->find($string);

        $this->assertSame('Тип откусил нос собаки Бобика. Босс, он ли сук топит?', $palindrome);
    }

    public function test5()
    {
        $string = 'Али дума да кручина, так и лежу я, ем сено, да на брегу Оби молоко колом, ибо у Герба надо не смея: "Ужели Катани, чурка, дам удил, а??"';
        $palindrome = $this->palindrome->find($string);

        $this->assertSame('Али дума да кручина, так и лежу я, ем сено, да на брегу Оби молоко колом, ибо у Герба надо не смея: "Ужели Катани, чурка, дам удил, а??"', $palindrome);
    }

    public function test6()
    {
        $string = 'Dogma: I am God';
        $palindrome = $this->palindrome->find($string);

        $this->assertSame('Dogma: I am God', $palindrome);
    }

    public function test7()
    {
        $string = 'Madam, I\'m Adam';
        $palindrome = $this->palindrome->find($string);

        $this->assertSame('Madam, I\'m Adam', $palindrome);
    }

}
