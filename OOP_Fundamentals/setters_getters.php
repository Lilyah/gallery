<?php

/* Defining a class
*/

class Cars {
    // Here are the properties (usually variables)
    /* PRIVATE : this property can be used only in this class
    */
    private $door_count = 4;

    // Here are the methods (functions)
    function get_values(){
        echo $this->door_count;
    }

    function set_values(){
        echo $this->door_count = 10;
    }

}

/* Instanciating
*/
$bmw = new Cars(); 
// echo $bmw->door_count; // this will throw and error "Cannot access private property Cars::$door_count"
/* We can access PRIVATE properties trought methods in the class
/* in this case we change the default value in set_values()
*/

$bmw->get_values(); // this will GET the default value from the method
echo "<br>";
$bmw->set_values(); // this will SET the value in the method which is 10 (in line 18)
echo "<br>";
$bmw->get_values(); // this will GET the new SETTED value whict is 10, because of line 33


?>