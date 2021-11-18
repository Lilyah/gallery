<?php

// Directory paths
defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR); // \ or / depending on what system you are
                            
defined('SITE_ROOT') ? null : define('SITE_ROOT', __DIR__ . DS . '..' . DS . '..'); // \ or / depending on what system you are

defined("INCLUDES_PATH") ? null : define("INCLUDES_PATH", SITE_ROOT . DS . 'admin' . DS . 'includes');

// In functions.php has claaAutoLoader in case you forget to include some class here
require_once(INCLUDES_PATH.DS."functions.php");

// ! Files that contain configuration or let's say objects or variables that other files depend on, must be loaded first.
require_once(INCLUDES_PATH.DS."config.php");
require_once(INCLUDES_PATH.DS."session.php");
require_once(INCLUDES_PATH.DS."database.php");
require_once(INCLUDES_PATH.DS."db_object.php");
require_once(INCLUDES_PATH.DS."user.php");
require_once(__DIR__ . DS . "photo.php");
require_once(INCLUDES_PATH.DS."comment.php");

?>