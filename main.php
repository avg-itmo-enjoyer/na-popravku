<?php

require "src/lib.php";

//TODO: proper way to read input string from different sources (stdin / file / cli arg)
$string = trim(fgets(STDIN));

$tokens = split_str_to_tokens($string);
$map    = token_count($tokens);

echo "Result:\n";
foreach ($map as $key => $value)
    echo "\t$key - $value\n";
