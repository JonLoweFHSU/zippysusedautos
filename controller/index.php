<?php

// Include necessary PHP files
require_once('model/database.php');
require_once('model/vehicles_db.php');

include('view/homepage.php');

// Determine the action to take, defaulting to 'list_vehicles' if none specified
$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING) ?: 'list_vehicles';

// Switch statement to handle different actions
switch ($action) {
    case "list_classes":
        header("Location: classes.php?action=list_classes");
        exit();
    case "list_types":
        header("Location: types.php?action=list_types");
        exit();
    case "list_makes":
        header("Location: makes.php?action=list_makes");
        exit();
    case "list_vehicles":
        $vehicles = get_vehicles();
        include('view/vehicles_list.php');
        break;
    default:
        // Redirect to the default action if an invalid action is requested
        header("Location: index.php?action=list_vehicles");
        exit();
}

// Include the footer
include('view/footer.php');
?>
