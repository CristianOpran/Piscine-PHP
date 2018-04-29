#!/usr/bin/php
<?php
$stdin = fopen("php://stdin", "r");
while ($stdin && !feof($stdin))
{
    echo "Enter a number: ";
    $number = fgets($stdin);
    if ($number)
    {
        $number = substr($number, 0, -1);
        if (strlen($number) && is_numeric($number))
        {
            if ($number % 2 == 0)
                echo "The number ". $number ." is even\n";
            else
                echo "The number ". $number . " is odd\n";
        }
        else
            echo "'" . $number . "' is not a number\n";
    }
}
fclose($stdin);
echo "\n";
?>