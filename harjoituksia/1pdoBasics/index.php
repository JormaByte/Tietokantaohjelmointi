<?php

$ini = parse_ini_file("myconf.ini");


$host = $ini["host"];
$dbname = $ini["db"];
$username = $ini["username"];
$pw = $ini["pw"];

$sqlCommand = "insert into student (name) values ('Reima'), ('Tiina'),('Pekka')";


try{
    $dbcon = new PDO("mysql:host=$host;dbname=$dbname", $username, $pw);
    $dbcon ->exec($sqlCommand);
} catch(PDOException $e){
    echo $e->getMessage();
}