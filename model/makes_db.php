<?php
// model/makes_db.php

// Include database connection
require_once('database.php');

function get_makes()
{
    global $db;
    $query = 'SELECT * FROM makes ORDER BY makeID';
    $statement = $db->prepare($query);
    $statement->execute();
    $makes = $statement->fetchAll();
    $statement->closeCursor();
    return $makes;
}

function get_make_name($make_id)
{
    if (!$make_id) {
        return "All Makes";
    }
    global $db;
    $query = 'SELECT * FROM makes WHERE makeID = :make_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':make_id', $make_id);
    $statement->execute();
    $make = $statement->fetch();
    $statement->closeCursor();
    $make_name = $make['makeName'];
    return $make_name;
}

function delete_make($make_id)
{
    global $db;
    $query = 'DELETE FROM makes WHERE makeID = :make_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':make_id', $make_id);
    $statement->execute();
    $statement->closeCursor();
}

function add_make($make_name)
{
    global $db;
    $query = 'INSERT INTO makes (makeName) VALUES (:make_name)';
    $statement = $db->prepare($query);
    $statement->bindValue(':make_name', $make_name);
    $statement->execute();
    $statement->closeCursor();
}
?>
