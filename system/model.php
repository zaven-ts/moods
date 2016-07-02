<?php

class System_model {
    public $db;
    public function __construct() {
        global $config;
        $this -> db = new Libs_db($config['db_host'], $config['db_user'], $config['db_pass'], $config['db_name']);
    }
}