<?php

$fileName = 'day1/input1.txt';
$dial = 50;
$password = 0;

$handle = fopen($fileName, "r");
if ($handle) {
    while (($line = fgets($handle)) !== false) {
        $rotation = substr($line, 0, 1);
        $line = (int)ltrim($line, "RL");
        switch($rotation) {
            case 'R':
                $dial += $line;
                break;
            case 'L':
                $dial -= $line;
                break;
        }
        if($dial >= 100 || $dial < 0) {
            $dial = $dial % 100;
        }
        if ($dial == 0) $password++;
    }
    fclose($handle);
}
echo "Password: " . $password;
