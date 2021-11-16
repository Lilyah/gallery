<?php

// Directory paths
defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR); // \ or / depending on what system you are
                            
defined('SITE_ROOT') ? null : define('SITE_ROOT', __DIR__ . DS . '..' . DS . '..'); // \ or / depending on what system you are

defined("INCLUDES_PATH") ? null : define("INCLUDES_PATH", SITE_ROOT . DS . 'admin' . DS . 'includes');

// In functions.php has claaAutoLoader in case you forget to include some class here
require("functions.php");

// ! Files that contain configuration or let's say objects or variables that other files depend on, must be loaded first.
include("config.php");
require("session.php");
require("database.php");
require("db_object.php");
require("user.php");
require("photo.php");

?>