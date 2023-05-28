<?php
require "dbconnection.php";

$db = createDbConnection();

$artistBirthYear = strip_tags($_POST["BYear"]);
$artistGenre = strip_tags($_POST["AGenre"]);

$sql = "ALTER TABLE artists 
ADD COLUMN BirthYear INT,
ADD COLUMN Genre VARCHAR(100)";

$query = $db->query($sql);