<?php

require "dbconnection.php";
$db = createDbConnection();

$City = "Calgary";
$Title = "Sales Support Agent";

$sql = "select * from employees where City = '$City' AND Title = '$Title'";

$query = $db->query($sql);

$results = $query->fetchAll(PDO::FETCH_ASSOC);

header('HTTP/1.1 200 OK');

print json_encode($results);