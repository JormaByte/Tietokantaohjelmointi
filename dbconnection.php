<?php


function createDbConnection() {
  $ini= parse_ini_file("config.ini");

  $host = $ini['host'];
  $database = $ini['database'];
  $user = $ini['user'];
  $password = $ini['password'];
  

  try{


    $db = new PDO("mysql:host=$host;dbname=$database;charset=utf8",$user, $password);
    return $db;
  } catch (PDOException $e) {

   
  }

  
}
