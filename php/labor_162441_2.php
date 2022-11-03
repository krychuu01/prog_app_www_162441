<?php

    include 'food.php';

    $indexNumber = '162441';
    $groupNumber = '2';
    $foods = array('pizza', 'burger', 'jalapeno', 'pasta');
    $numbers = array(1,2,3,4,5,6,7,8,9,10);

    echo "Grzegorz Krych ${indexNumber} group ${groupNumber} <br/><br/>";

    echo 'Zastosowanie metody include() <br />';

    printFoodNames($foods);
    printEvenNumbers($numbers);

?>