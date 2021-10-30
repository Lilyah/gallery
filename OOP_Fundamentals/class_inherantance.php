<?php

/* Defining a class
*/

use Cars as GlobalCars;

class Cars {
    // Here are the properties (usually variables)
    var $wheels = 4;

    // Here are the methods (functions)
    function gretting(){
        return "Hello World";
    }

}

/* Instanciating
*/
$bmw = new Cars();
$toyota = new Cars();

/* Inherantance
*/
class Trucks extends Cars {

}

/* Instanciating
*/
$tacoma = new Trucks;

echo $tacoma->wheels; // will display the default value ot property wheels in class Cars


?>