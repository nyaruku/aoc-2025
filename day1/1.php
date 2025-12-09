<?php

$fileName = 'day1/input1.txt';
$dial = 50;
$password = 0;

$handle = fopen($fileName, "r");
if ($handle) {
    while (($line = fgets($handle)) !== false) {
        $rotation = substr($line, 0, 1);
        $line = ltrim($line, "RL");
        switch($rotation) {
            case 'R':
                $dial += (int)$line;
                if($dial >= 100) {
                    $dial = $dial - 100;
                }
                if($dial = 0) {
                    $password++;
                }               
                break;
            case 'L':
                $dial -= (int)$line;
                if($dial < 0) {
                    $dial = 100 - $dial;
                }
                if($dial = 0) {
                    $password++;
                }               
                break;
        }
    }
    echo $password;
    fclose($handle);
}