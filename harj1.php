<?php

require "dbconnection.php";

$db = createDbConnection();

$sql = "ALTER TABLE artists 
ADD COLUMN BirthYear INT,
ADD COLUMN Genre VARCHAR(100)";

$query = $db->query($sql);

if ($db->query($sql) === TRUE) {
    echo "Two new rows added successfully.";
} else {
    echo "Error";
}