<?php

$fileName = 'day1/input.txt';
$dial = 50;
$password = 0;

$handle = fopen($fileName, "r");
if ($handle) {
    echo "-> " . $dial . "\n";
    while (($line = fgets($handle)) !== false) {
        echo $line;
        $rotation = substr($line, 0, 1);
        $line = (int)ltrim($line, "RL");
        $prevDial = $dial;
        switch($rotation) {
            case 'R':
                $dial += $line;
                break;
            case 'L':
                $dial -= $line;
                break;
        }
        echo "dial: " . $dial . "\n";
        $fullCycles = 0;
        $passwordIncrement = 0;
        if ($dial > 99) {
            $fullCycles = (int)($dial / 100);
            $passwordIncrement = $fullCycles;
            $dial -= ($fullCycles * 100);
        } 
        if ($dial < 0) {
            $fullCycles = (int)(($dial * -1) / 100);
            $passwordIncrement = (int)($dial / -100);
            if ($prevDial != 0) $passwordIncrement++;
            $dial = 100 + ($dial + ($fullCycles * 100));
        } 
        echo "dial: " . $dial . " - Cycles: " . $fullCycles . "\n";
        $dial == 0 && $passwordIncrement == 0 ? $password++ : $password += $passwordIncrement;
        echo "Password: " . $password . "\n";
        
    }
    fclose($handle);
}
echo "Password: " . $password;