<?php
/*
* MegoAdminCMS
*
* Very simple CMS as a help tool for PHP programmers
* It contains only core with basic functions
* Everything other you should program as your need
*/ 

// Basic settings
mb_internal_encoding("UTF-8");
session_start();
error_reporting(E_ALL);
ini_set('display_errors', '1'); // error reporting should by disabled on produce server

// Connecting the database using mysqli_safe connection
define("DB_HOSTNAME", 'localhost');
define("DB_USERNAME", 'root');
define("DB_PASSWORD", '');
define("DB_DATABASE", 'megoadmincms');
define("ROOTDIR", 'http://localhost/MegoAdminCMS');
define("TABLE_PREFIX", 'megoadmincms_');

$db=mysqli_connect(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
if ($db) {
    $db->query("SET character SET utf8;");
    $db->query("SET names utf8;");
}
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

// Autoloading a class, when new istance is created
function autoloadClass($class)
{
	require_once("classes/".$class.".php");
}
spl_autoload_register("autoloadClass");
?>