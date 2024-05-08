<?php

// ADD TYPE

function add_type($type) {
    
    global $db;

    $query = 'INSERT INTO types (type) VALUES (:type)';

    $statement = $db->prepare($query);
    $statement->bindValue(':type', $type);
    $statement->execute();
    $statement->closeCursor();
}

// GET TYPES

function get_types() {

    global $db;

    $query = 'SELECT * FROM types ORDER BY type_id';

    $statement = $db->prepare($query);
    $statement->execute();
    $types = $statement->fetchAll();
    $statement->closeCursor();

    return $types;
}

// DELETE TYPE

function delete_type($type_id) {

    global $db;

    $query = 'DELETE FROM types where type_id = :type_id';

    $statement = $db->prepare($query);
    $statement->bindValue(':type_id', $type_id);
    $statement->execute();
    $statement->closeCursor();
}

// GET TYPE NAME

function get_type($type_id) {

    if (!$type_id) {

        return "All types";
    }

    global $db;

    $query = 'SELECT * FROM types WHERE type_id = :type_id';

    $statement = $db->prepare($query);

    $statement->bindValue(':type_id', $type_id);
    $statement->execute();
    $type = $statement->fetch();
    $statement->closeCursor();

    $type = $type['type'];

    return $type;
}





