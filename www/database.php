<?php

$dbhost = 'mariadb';
$dbname = 'restaurant';
$dbuser = 'user';
$dbpass = 'password';
$conn = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
