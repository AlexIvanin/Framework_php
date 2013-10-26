<?php
define('PATH', $_SERVER['DOCUMENT_ROOT']);
define('SYS', $_SERVER['DOCUMENT_ROOT'].'/root/system/');
require SYS."Router.php";
require SYS.'Core.php';
require SYS.'Model.php';
require SYS.'View.php';
require SYS.'Spyc.php';
require SYS.'Controller.php';
require SYS.'functions.php';