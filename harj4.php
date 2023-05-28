<?php

require "dbconnection.php";
$db = createDbConnection();

// YHTIÖ PERUSTAA UUDEN TOIMIPISTEEN RANSKAAN,
//JONNE LÄHETETÄÄN SALES MANAGER NANCY SEKÄ 
// IT-PUOLEN ROBERT.

//SAMALLA YHTIÖ OTTAA KÄYTTÖÖN UUDEN KOKEELLISEN
// KVANTTIAUDIO - MEDIATIEDOSTON.


$Country = "France";
$mType = "Quantum audio file";
$MediaTypeId = "6";


try{
    $db->beginTransaction();

    $statement1 = $db->prepare("UPDATE employees SET Country = '$Country' WHERE EmployeeId LIKE 2 OR LIKE 7");

    $statement1->execute(array($Country));

    

    $statement2 = $db->prepare("INSERT INTO media_types VALUES ('$mType', '$MediaTypeId')");

    $statement2->execute(array($mType, $MediaTypeId));


    $db->commit();
    
} catch(Exception $e){
    $db->rollBack();
   $e->getMessage();
}