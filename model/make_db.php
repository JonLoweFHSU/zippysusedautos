<?php

// ADD MAKE

function add_make($make) {
    
    global $db;

    $query = 'INSERT INTO makes (Make) VALUES (:make)';

    $statement = $db->prepare($query);
    $statement->bindValue(':make', $make);
    $statement->execute();
    $statement->closeCursor();
}

// GET MAKES

function get_makes() {

    global $db;

    $query = 'SELECT * FROM makes ORDER BY make_id';

    $statement = $db->prepare($query);
    $statement->execute();
    $makes = $statement->fetchAll();
    $statement->closeCursor();

    return $makes;
}

// DELETE MAKE

function delete_make($make_id) {

    global $db;

    $query = 'DELETE FROM makes where make_id = :make_id';

    $statement = $db->prepare($query);
    $statement->bindValue(':make_id', $make_id);
    $statement->execute();
    $statement->closeCursor();
}

// GET MAKE NAME

function get_make($make_id) {

    if (!$make_id) {

        return "All Makes";
    }

    global $db;

    $query = 'SELECT * FROM makes WHERE make_id = :make_id';

    $statement = $db->prepare($query);

    $statement->bindValue(':make_id', $make_id);
    $statement->execute();
    $make = $statement->fetch();
    $statement->closeCursor();

    $make = $make['Make'];

    return $make;
}





