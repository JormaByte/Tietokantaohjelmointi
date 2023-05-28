<?php

require "dbconnection.php";
$db = createDbConnection();

$body = file_get_contents("php://input");
$data = json_decode($body);

$artist_id = strip_tags($data->id);

try{
    $db->beginTransaction();

    $db->exec("DELETE FROM invoice_items 
    WHERE TrackId IN (SELECT TrackId FROM tracks 
    WHERE AlbumId IN(SELECT AlbumId FROM albums 
    WHERE ArtistId In( SELECT ArtistId FROM artists 
    WHERE ArtistId = $artist_id)))");

    $db->exec("DELETE FROM playlist_track 
    WHERE TrackId IN (SELECT TrackId FROM tracks 
    WHERE AlbumId IN(SELECT AlbumId FROM albums 
    WHERE ArtistId In( SELECT ArtistId FROM artists 
    WHERE ArtistId = $artist_id)))");

    $db->exec("DELETE FROM tracks
    WHERE AlbumId IN (SELECT AlbumId FROM albums
    WHERE ArtistId IN(SELECT ArtistId FROM artists
    WHERE ArtistId = $artist_id))");

    $db->exec("DELETE FROM albums
    WHERE ArtistId = $artist_id");

    $db->exec("DELETE FROM artists
    WHERE ArtistId = $artist_id");

    $db->commit();
} catch(Exception $e){
    $db->rollBack();
    echo "Failed:".$e->getMessage();
}