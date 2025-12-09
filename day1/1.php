<?php

$fileName = 'day1/input1.txt';
$dial = 50;

$handle = fopen($fileName, "r");
if ($handle) {
    while (($line = fgets($handle)) !== false) {
        echo $dial . "\n";
        echo $line . "\n";
        $rotation = substr($line, 0, 1);
        $line = ltrim($line, "RL");
        switch($rotation) {
            case 'R':
                $dial += (int)$line;
                if($dial >= 100) {
                    $dial = $dial - 100;
                }
                break;
            case 'L':
                $dial -= (int)$line;
                if($dial < 0) {
                    $dial = 100 - $dial;
                }
                break;
        }
    }

    fclose($handle);
}