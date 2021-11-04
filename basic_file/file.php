<?php

echo __FILE__ . "<br>"; //this file path
echo __LINE__ . "<br>"; //this line of code
echo __DIR__ . "<br>"; //this directory path


if(file_exists(__DIR__)) // check if the file/directory/etc exists
{ 
    echo "yes <br>";
}; 


if(is_file(__DIR__)) // check if the thing is a file
{ 
    echo "yes <br>";
} else { 
    echo "no <br>";
}; 


if(is_dir(__DIR__)) // check if the thing is a directory
{ 
    echo "yes <br>";
} else { 
    echo "no <br>";
}; 


echo file_exists(__FILE__) ? "yes" : "no"; //Thernary operator





?>