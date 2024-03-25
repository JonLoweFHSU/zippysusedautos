<?php
// Include necessary PHP files
require_once('../model/types_db.php');

// Determine the action to take
$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING) ?: 'list_types';
$type_name = filter_input(INPUT_POST, 'type_name', FILTER_SANITIZE_SPECIAL_CHARS);

switch ($action) {
    case "list_types":
        $types = get_types();
        include('../view/types_list.php');
        break; // Prevent fall-through
    case "add_type":
        if (!empty($type_name)) {
            add_type($type_name);
            header("Location: .?action=list_types");
            exit(); // Exits the script, making a break optional but good practice
        } else {
            $error = "Invalid type name. Please check the field and try again.";
            include("../view/error.php");
            exit(); // Exits the script, making a break optional but good practice
        }
        break; // Good practice even after exit()

    case "delete_type":
        $type_id = filter_input(INPUT_GET, 'type_id', FILTER_VALIDATE_INT);
        if ($type_id) {
            try {
                delete_type($type_id);
                header("Location: .?action=list_types");
                exit(); // Exits the script, making a break optional but good practice
            } catch (PDOException $e) {
                $error = "You cannot do that.";
                include('../view/error.php');
                exit(); // Exits the script, making a break optional but good practice
            }
        }
        break; // Prevent fall-through
    default:
        $types = get_types();
        include('../view/types_list.php');
        // No break needed after default as it's the last case
}
?>
