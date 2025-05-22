<?php

/**
 * @param string $string
 * @return iterable<string>
 */
function split_str_to_tokens(string $string): iterable {
    $tokens = array();
    $word_buff = "";

    for ($i = 0; $i < grapheme_strlen($string); ++$i) {
        if (IntlChar::isWhitespace($string[$i])) {
            $tokens[] = $word_buff;
            $word_buff = "";
        } else {
            $word_buff .= $string[$i];
        }
    }
    if (!empty($word_buff))
        $tokens[] = $word_buff;

    return $tokens;
}

/**
* @param iterable<string> $tokens
* @return iterable<string, int>
*/
function token_count(iterable $tokens): iterable {
    $map = array();
    foreach ($tokens as $token) {
        if (array_key_exists($token, $map)) {
            $map[$token]++;
        } else {
            $map[$token] = 1;
        }
    }
    return $map;
}

//TODO: proper way to read input string from different sources (stdin / file / cli arg)
$string = trim(fgets(STDIN));

$tokens = split_str_to_tokens($string);
$map    = token_count($tokens);

echo "Result:\n";
foreach ($map as $key => $value)
    echo "\t$key - $value\n";
