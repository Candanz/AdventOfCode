<?php

$input = [];
$niceStrings = [];
$vowels = ["a","e","i","o","u"];
$naughtyParts = ["ab", "cd", "pq", "xy"];

$fh = fopen("input.txt", 'r');
if($fh){
    while(($l = fgets($fh)) !== false) {
        $input[] = $l;
    }

    fclose($fh);
}

for($i = 0; $i < count($input); $i++){
    $vowelCount=0;
    for($c = 0; $c < strlen($input[$i]); $c++){
        $vowelCount += (array_search($input[$i][$c],$vowels) !== false)?1:0;
    }
    if($vowelCount < 3)
        continue;

    $isNaughty = false;
    for($c = 0; $c < count($naughtyParts); $c++){
        $isNaughty = (strpos($input[$i], $naughtyParts[$c]) !== false)?true:$isNaughty;
    }
    if($isNaughty) 
        continue;

    $hasDoubles = false;
    for($c = 0; $c < strlen($input[$i])-1; $c++){
        if($input[$i][$c] === $input[$i][$c+1]){
            $hasDoubles = true;
            break;
        }
    }
    if(!$hasDoubles)
        continue;

    $niceStrings[] = $input[$i];
}

echo count($niceStrings);

echo '<br />';

$niceStrings = [];

for($i = 0; $i < count($input); $i++){
    if(strlen($input[$i]) == 1) continue;
    $pair = false;
    $repeat = false;
    for($c = 0; $c < strlen($input[$i]) - 2; $c++){
        if($input[$i][$c] === $input[$i][$c+2])
            $pair = true;
    }
    for($c = 0; $c < strlen($input[$i]) - 1; $c++){
        $sub = substr($input[$i], $c, $c+2);
        $pos = strpos($input[$i], $pos);
        echo $pos .' - '.$sub.'<br/>';
        if($c==1)exit();
        if(strpos($input[$i], substr($input[$i], $c, $c+2)) > $c + 2)
            $repeat = true;
    }
    echo $input[$i].' - '.($pair?"true":"false").' - '.($repeat?"true":"false").'<br />';
    if($pair&&$repeat)
        $niceStrings[] = $input[$i];
}

echo count($niceStrings);
