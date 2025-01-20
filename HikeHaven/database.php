<?php

$host = "localhost";
$dbname = "hikehaven";
$username = "root";
$password = "leuard098";

$mysqli = new mysqli(hostname: $host,
                     username: $username,
                     password: $password,
                     database: $dbname);
                     
if ($mysqli->connect_errno) {
    die("Connection error: " . $mysqli->connect_error);
}

return $mysqli;