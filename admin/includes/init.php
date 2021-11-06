<?php

// In functions.php has claaAutoLoader in case you forget to include some class here
require("functions.php");

// ! Files that contain configuration or let's say objects or variables that other files depend on, must be loaded first.
include("config.php");
require("database.php");
require("db_object.php");
require("user.php");
require("session.php");

?>