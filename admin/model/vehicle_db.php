<?php

// ADD ITEMS

function add_vehicle($type_id, $class_id, $make_id, $model, $price, $year) {

    global $db;

    $query = 'INSERT INTO vehicles ( type_id, class_id, make_id, model, price, year ) 
                VALUES (:type_id, :class_id, :make_id, :model, :price, :year)';

    $statement = $db->prepare($query);

    $statement->bindValue(':make_id', $make_id);
    $statement->bindValue(':class_id', $class_id);
    $statement->bindValue(':type_id', $type_id);
    $statement->bindValue(':model', $model);
    $statement->bindValue(':price', $price);
    $statement->bindValue(':year', $year);

    $statement->execute();
    $statement->closeCursor();
}

// DELETE ITEMS

function delete_vehicle($vehicle_id) {

    global $db;

    $query = 'DELETE FROM vehicles WHERE vehicle_id = :vehicle_id';

    $statement = $db->prepare($query);
    $statement->bindValue(':vehicle_id', $vehicle_id);

    $statement->execute();
    $statement->closeCursor();
}

// GET VEHICLES BY MAKE (TOP DROPDOWN SELECT)

function get_vehicles_by_make($make_id) {
    global $db;

    if ($make_id) {

        $query = 'SELECT A.vehicle_id, A.model, A.price, A.year, C.Class, D.Type, B.Make From vehicles A
            LEFT JOIN makes B ON A.make_id = B.make_id
            JOIN classes C ON A.class_id = C.class_id
            JOIN types D ON A.type_id = D.type_id
                WHERE A.make_id = :make_id ORDER BY A.price DESC';

    } else {

        $query = 'SELECT A.vehicle_id, A.model, A.price, A.year, C.Class, D.Type, B.Make From vehicles A
        LEFT JOIN makes B ON A.make_id = B.make_id 
         JOIN classes C ON A.class_id = C.class_id
         JOIN types D ON A.type_id = D.type_id
         ORDER BY A.price DESC';

    }

    $statement = $db->prepare($query);

    if ($make_id) {
        $statement->bindValue(':make_id', $make_id);
    }

    $statement->execute();
    $vehicles = $statement->fetchAll();
    $statement->closeCursor();

    return $vehicles;
}

// GET VEHICLES BY CLASS (TOP DROPDOWN SELECT) ------------------------------------------

function get_vehicles_by_class($class_id) {
    global $db;

    if ($class_id) {

        $query = 'SELECT A.vehicle_id, A.model, A.price, A.year, C.Class, D.Type, B.Make From vehicles A
            LEFT JOIN makes B ON A.make_id = B.make_id
            JOIN classes C ON A.class_id = C.class_id
            JOIN types D ON A.type_id = D.type_id
                WHERE A.class_id = :class_id ORDER BY A.price DESC';

    } else {

        $query = 'SELECT A.vehicle_id, A.model, A.price, A.year, C.Class, D.Type, B.Make From vehicles A
        LEFT JOIN makes B ON A.make_id = B.make_id 
         JOIN classes C ON A.class_id = C.class_id
         JOIN types D ON A.type_id = D.type_id
         ORDER BY A.price DESC';

    }

    $statement = $db->prepare($query);

    if ($class_id) {
        $statement->bindValue(':class_id', $class_id);
    }

    $statement->execute();
    $vehicles = $statement->fetchAll();
    $statement->closeCursor();

    return $vehicles;
}

// GET VEHICLES BY TYPE (TOP DROPDOWN SELECT) ------------------------------------------

function get_vehicles_by_type($type_id) {
    global $db;

    if ($type_id) {

        $query = 'SELECT A.vehicle_id, A.model, A.price, A.year, C.Class, D.Type, B.Make From vehicles A
            LEFT JOIN makes B ON A.make_id = B.make_id
            JOIN classes C ON A.class_id = C.class_id
            JOIN types D ON A.type_id = D.type_id
                WHERE A.type_id = :type_id ORDER BY A.price DESC';

    } else {

        $query = 'SELECT A.vehicle_id, A.model, A.price, A.year, C.Class, D.Type, B.Make From vehicles A
        LEFT JOIN makes B ON A.make_id = B.make_id 
         JOIN classes C ON A.class_id = C.class_id
         JOIN types D ON A.type_id = D.type_id
         ORDER BY A.price DESC';

    }

    $statement = $db->prepare($query);

    if ($type_id) {
        $statement->bindValue(':type_id', $type_id);
    }

    $statement->execute();
    $vehicles = $statement->fetchAll();
    $statement->closeCursor();

    return $vehicles;
}

// GET VEHICLE

function get_vehicle($vehicle_id)  {

    global $db;

    $query = 'SELECT * FROM vehicles WHERE vehicle_id = :vehicle_id';

    $statement = $db->prepare($query);

    if ($vehicle_id) {
        $statement->bindValue(':vehicle_id', $vehicle_id);
    }

    $statement->execute();
    $vehicle = $statement->fetchAll();
    $statement->closeCursor();

    return $vehicle;

}



