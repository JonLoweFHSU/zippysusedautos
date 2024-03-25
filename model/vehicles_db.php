<?php
// model/vehicles_db.php

include_once('database.php');

function add_vehicle($make_id, $type_id, $class_id, $year, $model, $price)
{
    global $db;
    $query = 'INSERT INTO vehicles (makeID, typeID, classID, year, model, price) 
              VALUES (:make_id, :type_id, :class_id, :year, :model, :price)';
    $statement = $db->prepare($query);
    $statement->bindValue(':make_id', $make_id);
    $statement->bindValue(':type_id', $type_id);
    $statement->bindValue(':class_id', $class_id);
    $statement->bindValue(':year', $year);
    $statement->bindValue(':model', $model);
    $statement->bindValue(':price', $price);
    $success = $statement->execute();
    $statement->closeCursor();
    
    if (!$success) {
        $error_message = $statement->errorInfo();
        include('view/error.php');
        exit();
    }
}
?>
