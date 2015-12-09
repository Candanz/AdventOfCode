<?php

$input = "bgvyzdsv";

$i = 0;
for(;;$i++){
    $hash = md5($input.$i);
    if(substr($hash, 0, 5) === "00000") 
        break;
}

echo $i;
echo '<br />';

$i = 0;

for(;;$i++){
    $hash = md5($input.$i);
    if(substr($hash, 0, 6) === "000000") 
        break;
}

echo $i;