<?php

// Load files with classes if they are not included in init.php
function classAutoLoader($class){
    $class = strtolower($class);
    $the_path = 'includes/'.$class.'.php';

    if(file_exists($the_path)){
        require_once($the_path);
    } else {
        die("The file {$class}.php was not found.");
    }
};

spl_autoload_register('classAutoLoader');


// Redirect custom function
function redirect($location){
    header("Location: {$location}");
}

?>