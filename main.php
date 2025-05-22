<?php

//TODO: proper way to read input string from different sources (stdin / file / cli arg)
$string = fgets(STDIN);

$tokens = preg_split("/\s/m", $string);

$map = array();
foreach ($tokens as $token) {
    if (array_key_exists($token, $map)) {
        $map[$token]++;
    } else {
        $map[$token] = 1;
    }
}

print_r($map);
