<?php
// Include necessary PHP files
require_once('../model/makes_db.php');

// Determine the action to take
$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING) ?: 'list_makes';
$make_name = filter_input(INPUT_POST, 'make_name', FILTER_SANITIZE_SPECIAL_CHARS);

switch ($action) {
    case "list_makes":
        $makes = get_makes();
        include('view/makes_list.php');
        break; // Prevent fall-through
    case "add_make":
        if (!empty($make_name)) {
            add_make($make_name);
            header("Location: .?action=list_makes");
            exit(); // Exits the script, making a break optional but good practice
        } else {
            $error = "Invalid make name. Please check the field and try again.";
            include("view/error.php");
            exit(); // Exits the script, making a break optional but good practice
        }
        break; // Good practice even after exit()

    case "delete_make":
        if ($make_id) {
            try {
                delete_make($make_id);
                header("Location: .?action=list_makes");
                exit(); // Exits the script, making a break optional but good practice
            } catch (PDOException $e) {
                $error = "You cannot do that.";
                include('view/error.php');
                exit(); // Exits the script, making a break optional but good practice
            }
        }
        break; // Prevent fall-through
    default:
        $makes = get_makes();
        include('view/makes_list.php');
        // No break needed after default as it's the last case
}
?>
