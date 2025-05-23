<?php

require_once "vendor/autoload.php";
require_once "src/lib.php";

use PHPUnit\Framework\Attributes\CoversFunction;
use PHPUnit\Framework\TestCase;

#[CoversFunction("split_str_to_tokens")]
class SplitStrToTokensTests extends TestCase {
    public function testSplitEmptyStrToTokens() {
        $string = "";
        $result = split_str_to_tokens($string);

        $this->assertEmpty($result);
    }

    public function testSplitValidStrToTokens() {
        $string = "valid string";
        $expected = array("valid", "string");

        $result = split_str_to_tokens($string);

        $this->assertEquals($expected, $result);
    }

    public function testSplitValidStrWithTrailingWhitespacesToTokens() {
        $string = "  valid string  ";
        $expected = array("valid", "string");

        $result = split_str_to_tokens($string);

        $this->assertEquals($expected, $result);
    }
}