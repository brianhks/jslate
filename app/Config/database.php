<?php

class DATABASE_CONFIG {

    public $default = array(
        'datasource' => 'Database/Mysql',
        'persistent' => false,
        'host' => 'localhost',
        'login' => 'jslate',
        'password' => 'jslate123',
        'database' => 'jslate',
        'prefix' => '',
        //'unix_socket' => '/Applications/XAMPP/xamppfiles/var/mysql/mysql.sock',
        'encoding' => 'utf8',
    );

    public $test = array(
        'datasource' => 'Database/Mysql',
        'persistent' => false,
        'host' => 'localhost',
        'login' => 'jslate',
        'password' => 'jslate123',
        'database' => 'jslate_test',
        'prefix' => '',
        //'unix_socket' => '/Applications/XAMPP/xamppfiles/var/mysql/mysql.sock',
        'encoding' => 'utf8',
    );
}
?>
