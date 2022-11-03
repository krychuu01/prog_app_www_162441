<?php

    function printFoodNames(iterable $foods) {
        foreach ($foods as $item) {
            echo "{$item} <br/>";
        }
    }

    function printEvenNumbers(iterable $numbers) {
        foreach ($numbers as $number) {
            if ($number % 2 == 0) {
                echo "${number} <br/>";
            }
        }
    }

?>

