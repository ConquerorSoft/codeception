<?php

use conquerorsoft\codeception\StringTransformation;

class StringTransformationTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;
    
    protected function _before()
    {
    }

    protected function _after()
    {
    }

    /**
     * @dataProvider alphaValidStringsProvider
     */
    public function testAlphaValidStringIsEncoded(
        string $input_string,
        string $expected
    ) {
        $string = new StringTransformation();
        $new_string = $string->encode($input_string);
        $this->assertEquals($expected, $new_string);
    }
    
    public function alphaValidStringsProvider(): array
    {
        return [
            ['some string', 'ßøµ´  ßÎ®ˆ˜©'],
            ['valid string', '¡å¬ˆı  ßÎ®ˆ˜©'],
            ['christian varela', 'ç˙®ˆßÎˆå˜  ¡å®´¬å'],
            ['yin', '¥ˆ˜'],
        ];
    }

    /**
     * @dataProvider encodedValidStringsProvider
     */
    public function testEncodedValidStringIsDecoded(
        string $input_string,
        string $expected
    ) {
        $string = new StringTransformation();
        $new_string = $string->decode($input_string);
        $this->assertEquals($expected, $new_string);
    }

    public function encodedValidStringsProvider(): array
    {
        return [
            ['πåßßÏø®ı', 'password'],
            ['¥å˜©', 'yang'],
            ['ßøµ´  ´Óåµπ¬´', 'some example'],
            ['ß¨˜ß˙ˆ˜´π˙π', 'sunshinephp'],
        ];
    }
}
