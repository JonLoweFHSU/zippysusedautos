<?php
// Include necessary PHP files
require_once('../model/classes_db.php');

// Determine the action to take
$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING) ?: 'list_classes';
$class_name = filter_input(INPUT_POST, 'class_name', FILTER_SANITIZE_SPECIAL_CHARS);

switch ($action) {
    case "list_classes":
        $classes = get_classes();
        include('../view/classes_list.php');
        break; // Prevent fall-through
    case "add_class":
        if (!empty($class_name)) {
            add_class($class_name);
            header("Location: .?action=list_classes");
            exit(); // Exits the script, making a break optional but good practice
        } else {
            $error = "Invalid class name. Please check the field and try again.";
            include("../view/error.php");
            exit(); // Exits the script, making a break optional but good practice
        }
        break; // Good practice even after exit()

    case "delete_class":
        $class_id = filter_input(INPUT_GET, 'class_id', FILTER_VALIDATE_INT);
        if ($class_id) {
            try {
                delete_class($class_id);
                header("Location: .?action=list_classes");
                exit(); // Exits the script, making a break optional but good practice
            } catch (PDOException $e) {
                $error = "You cannot do that.";
                include('../view/error.php');
                exit(); // Exits the script, making a break optional but good practice
            }
        }
        break; // Prevent fall-through
    default:
        $classes = get_classes();
        include('../view/classes_list.php');
        // No break needed after default as it's the last case
}
?>
