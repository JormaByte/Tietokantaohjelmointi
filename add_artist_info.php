<?php

require "dbconnection.php";

$db = createDbConnection();

$body = file_get_contents('php://input');
$data = json_decode($body);


$sql1 = "INSERT INTO artists (Name) VALUES (?)";
$sql2 = "INSERT INTO albums (Title, ArtistId) VALUES (?,?)";
$sql3 = "INSERT INTO tracks (Name, AlbumId, MediaTypeId, GenreID, Composer, Milliseconds, Bytes, UnitPrice) VALUES (?,?,?,?,?,?,?,?)";

$statement1 = $db->prepare($sql1);
$statement1->execute(array($data->Name));

$artistId = $db->lastInsertId();

$statement2 = $db->prepare($sql2);
$statement2->execute(array($data->Title, $artistId));

$albumId = $db->lastInsertId();

$statement3 = $db->prepare($sql3);

foreach ($data -> Tracks as $track) {
    $statement3->execute(array($track->Name, $albumId, $track->MediaTypeId, $track->GenreID, $track->Composer, $track->Milliseconds, $track->Bytes, $track->UnitPrice));
}



