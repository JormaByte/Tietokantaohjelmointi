<?php

require "dbconnection.php";

$db= createDbConnection();



$playlist_id = $_GET["id"];


$sql = "SELECT tracks.Name as N, tracks.Composer as C
FROM playlists, playlist_track, tracks
WHERE playlists.PlaylistId = ?
AND playlist.PlaylistId = playlist_track.PlaylistId
AND playlist_track.TrackId = tracks.TrackId";

$statement = $db->prepare($sql);
$statement-> execute(array($playlist_id));

$rows = $statement->fetchAll(PDO::FETCH_ASSOC);

foreach($rows as $row){
    echo "<h3>".$row["N"]."</h3>"."<p>".$row["C"]."</p>"."</br>";
}