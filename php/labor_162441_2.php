<?php

  include 'food.php';
  require_once 'food.php';

  $nr_indeksu = '162441';
  $nr_grupy = '2';
  $imie_nazwisko = "Grzegorz Krych";
  $break_line = "<br/><br/>";

  $pierwsza_liczba = 100;
  $druga_liczba = 15;

  echo "{$imie_nazwisko}, {$nr_indeksu}, grupa {$nr_grupy} <br/><br/>";

  echo "Zastosowanie metody include() <br/>";

  print_food($food);
  
  print_break_line();

  if ($pierwsza_liczba > $druga_liczba) {
    echo "{$pierwsza_liczba} jest wieksza od {$druga_liczba}";
  }
  else {
    echo "{$druga_liczba} jest wieksza od {$pierwsza_liczba}";
  }

  $i = 2;

  print_break_line();

  echo "uzycie switch:";

  print_break_line();

  switch ($i) {
    case 0:
        echo "{$food[0]}";
        break;
    case 1:
        echo "{$food[1]}";
        break;
    case 2:
        echo "{$food[2]}";
        break;
  }

  print_break_line();

  echo "uzycie while:";

  print_break_line();

  $iter = 0;
  while ($iter <= 10) {
    echo "while iter: {$iter}";
    $iter++;
    print_break_line();
  }

  print_break_line();

  echo "uzycie for:";

  print_break_line();

  for($i = 0; $i < 100; $i = $i + 10) {

    echo "for i: {$i}";
    print_break_line();

  }
  
  print_break_line();

  echo "uzycie GET:";

  print_break_line();

  echo 'Hello ' . htmlspecialchars($_GET["imie_nazwisko"]) . '!';

  print_break_line();

  echo "uzycie POST:";

  print_break_line();

  if(isset( $_POST['name'])){
    $name = $_POST['name'];
    echo "Wprowadzono name: {$name}";
  }
  else{
    echo "Wprowadz name aby uzyc metody post";
  }


  print_break_line();

  echo "uzycie SESSION:";

  print_break_line();

  $status = session_status();

  echo "{$status}";

  
  


?>