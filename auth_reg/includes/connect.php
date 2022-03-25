<?php

$host = '127.0.0.1';
$db   = 'users';
$user = 'root';
$pass = 'mmz0812po';
$charset = 'utf8';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";


function connect_db(): PDO {
    global $dsn, $user, $pass;
    try {
        $dbh = new PDO($dsn, $user, $pass);
    } catch (PDOException $e) {
        die('Connection error: ' . $e->getMessage());
    }
    return $dbh;
}

$connect = connect_db();
