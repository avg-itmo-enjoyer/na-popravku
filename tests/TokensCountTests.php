<?php

require_once "vendor/autoload.php";
require_once "src/lib.php";

use PHPUnit\Framework\Attributes\CoversFunction;
use PHPUnit\Framework\TestCase;

#[CoversFunction("token_count")]
class TokensCountTests extends TestCase {
    public function testTokensCountOnEmptyList() {
        $tokens = array();
        $result = token_count($tokens);

        $this->assertEmpty($result);
    }

    public function testTokensCountOnDistinctList() {
        $tokens = array("some", "distinct", "tokens");
        $expected = array("some" => 1, "distinct" => 1, "tokens" => 1);
        $result = token_count($tokens);

        $this->assertEqualsCanonicalizing($expected, $result);
    }

    public function testTokensCountOnNonDistinctList() {
        $tokens = array("some", "tokens", "that", "are", "not", "distinct", "some", "other", "tokens");
        $expected = array(
            "some" => 2,
            "tokens" => 2,
            "that" => 1,
            "are" => 1,
            "not" => 1,
            "distinct" => 1,
            "other" => 1
        );
        $result = token_count($tokens);

        $this->assertEqualsCanonicalizing($expected, $result);
    }
}