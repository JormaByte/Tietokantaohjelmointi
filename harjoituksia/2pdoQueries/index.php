<?php


$ini = parse_ini_file("myconf.ini");


$host = $ini["host"];
$dbname = $ini["db"];
$username = $ini["username"];
$pw = $ini["pw"];

$sqlQuery= "SELECT * FROM offices";

$dbcon = new PDO("mysql:host=$host;dbname=$dbname", $username, $pw);

$statement = $dbcon -> prepare($sqlQuery);
$statement -> execute();

$allRows = $statement -> fetchAll(PDO::FETCH_COLUMN, 2);

forEach($allRows as $row) {

    echo $row. "<br>";
}