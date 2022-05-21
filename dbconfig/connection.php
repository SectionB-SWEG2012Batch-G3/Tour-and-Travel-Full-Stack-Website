<?php
    $hostname = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = '4hf';
    $port = 3306;
    $pdo = new PDO("mysql:host=$hostname;port=$port;dbname=$dbname;",$username,$password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    return $pdo;
