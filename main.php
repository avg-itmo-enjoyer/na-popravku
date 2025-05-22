<?php

//TODO: proper way to read input string from different sources (stdin / file / cli arg)
$string = trim(fgets(STDIN));

$tokens = array();
$word_buff = "";
//TODO: parse tokens
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

$map = array();
foreach ($tokens as $token) {
    if (array_key_exists($token, $map)) {
        $map[$token]++;
    } else {
        $map[$token] = 1;
    }
}

echo "Result:\n";
foreach ($map as $key => $value)
    echo "\t$key - $value\n";
