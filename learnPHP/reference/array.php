<?php
    $cars = array("BMW", "Toyota", "Mitshubisi", "Kia", "Volvo", "Ford");
    $ages = array ("Ben"=>"25", "Peter"=>"20", "John"=>"24", "Lan"=>"21");
    //print array
    foreach($ages as $x=>$x_value){
        echo "Name: ".$x.", Age: ".$x_value."<br>";
    }

    $cars_length = count($cars);
    for ($x = 0; $x < $cars_length; $x++){
        echo $cars[$x]."<br>";
    }

    //array upperCase and lowercase
    echo "Upper case"."<br>";
    print_r(array_change_key_case($cars, CASE_UPPER));
    echo "<br>";
    print_r(array_change_key_case($ages, CASE_UPPER));

    //array_chunk: chia 1 array thanh nhieu array nho hon, nam trong array do
    echo "<br>Array chunk";
    print_r(array_chunk($ages, 2));
    echo "<br>";
    $array_tmp = array_chunk($cars, 2);
    print_r($array_tmp);
    echo "<br>";
    print_r(array_chunk($cars, 3));
?>