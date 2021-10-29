<?php

/* Defining a class
*/

class Cars {
    // Here are the properties (uslualy variables)

    // Here are the methods (functions)
}

/* get_declared_classes() is a uild-in function for get all declared classes in this project
*/
$my_classes = get_declared_classes();
foreach($my_classes as $class){
    echo $class . "<br>";
} 

?>