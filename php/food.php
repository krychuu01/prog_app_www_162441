<?php

  $food = array("pizza", "kebab", "burger", "pasta", "lasagne");

  function print_food(array $foods) {

    foreach ($foods as $name) {
      echo "{$name} <br/>";
    }

  }

  function print_break_line() {
    echo "<br/><br/>";
  }


?>