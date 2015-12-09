<?php

$input = [];

$fh = fopen("input.txt", 'r');
if($fh){
    while(($l = fgets($fh)) !== false) {
        $input[] = explode("x", $l);
    }

    fclose($fh);
}

$paper = 0;
$ribbon = 0;
$bow = 0;

for($i = 0; $i < count($input); $i++){
    sort($input[$i], SORT_NUMERIC);
    $sides = [];
    for($c = 0, $j = count($input[$i]) - 1; $c < count($input[$i]); $j = $c++){
        $paper += 2 * $input[$i][$c] * $input[$i][$j];
        $sides[] = $input[$i][$c] * $input[$i][$j];
    }
    sort($sides, SORT_NUMERIC);
    $paper += $sides[0];
    $ribbon += $input[$i][0] * 2 + $input[$i][1] * 2;
    $bow += $input[$i][0] * $input[$i][1] * $input[$i][2];
}
echo "Paper: " . $paper . "<br />";
echo "Ribbon: " . $ribbon . "<br />";
echo "Bow: " . $bow . "</br />";
echo "Ribbon Total: " . ($ribbon + $bow);