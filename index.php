<?php
session_start();
require_once 'config/config.php';
spl_autoload_register(function ($name){
    $name = lcfirst($name);
    $name = str_replace('_','/',$name);
    include $name . '.php';
});

$url = $_SERVER['REQUEST_URI'];

new System_routes($url);