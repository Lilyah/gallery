<?php

/* Defining a class
*/

class Cars {
    // Here are the properties (usually variables)

    // Here are the methods (functions)
    function gretting(){

    }

    function gretting2(){

    }
}

/* get_class_method() is a build-in function for get all declared methods in this specific class
*/
$my_methods = get_class_methods('Cars');
foreach($my_methods as $methods){
    echo $methods . "<br>";
} 

?>