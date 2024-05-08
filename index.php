<?php
require_once('model/database.php');
require_once('model/make_db.php');
require_once('model/class_db.php');
require_once('model/type_db.php');
require_once('model/vehicle_db.php');


$vehicle_id = filter_input(INPUT_POST, 'vehicle_id', FILTER_VALIDATE_INT);
$model = filter_input(INPUT_POST, 'model', FILTER_SANITIZE_SPECIAL_CHARS);
$price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_INT);
$make = filter_input(INPUT_POST, 'make', FILTER_SANITIZE_SPECIAL_CHARS);
$class = filter_input(INPUT_POST, 'class', FILTER_SANITIZE_SPECIAL_CHARS);
$type = filter_input(INPUT_POST, 'type', FILTER_SANITIZE_SPECIAL_CHARS);
$year = filter_input(INPUT_POST, 'year', FILTER_VALIDATE_INT);
$sort = filter_input(INPUT_POST, 'selectedSort', FILTER_SANITIZE_SPECIAL_CHARS);

// TRY TO GET FROM POST, FALLS BACK TO GET IF NOT AVAILABLE
$make_id = filter_input(INPUT_POST, 'make_id', FILTER_VALIDATE_INT) ?: filter_input(INPUT_GET, 'make_id', FILTER_VALIDATE_INT);
$class_id = filter_input(INPUT_POST, 'class_id', FILTER_VALIDATE_INT) ?: filter_input(INPUT_GET, 'class_id', FILTER_VALIDATE_INT);
$type_id = filter_input(INPUT_POST, 'type_id', FILTER_VALIDATE_INT) ?: filter_input(INPUT_GET, 'type_id', FILTER_VALIDATE_INT);

// DETERMIINE WHAT ACTION TO TAKE, DEFAULTS TO list_vehicles
$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING) ?: filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING) ?: 'list_vehicles';

switch ($action) {

      // TYPES

      case "list_types":

        $types = get_types();
        include('view/type_list.php');

        break; 
        
    case "add_type":

        if (!empty($type)) {
            
            add_type($type);
            header("Location: .?action=list_types");
            exit(); 

        } else {

            $error = "Invalid type name.";

            include("view/error.php");
            exit(); 
        }
        break; 

        case "delete_type":

            if ($type_id) {
    
                try {
                    delete_type($type_id);
                    header("Location: .?action=list_types");
                    exit(); 
    
                } catch (PDOException $e) {
    
                    include('view/header.php'); 
    
                    $error = "You cannot delete a type if vehicles with this type are present.";
                    echo "<p type='error'>$error <a href='index.php'> << Home</a></p>";
                   
                    exit(); 
                }
            }
            break; 



    // CLASSES

    case "list_classes":

        $classes = get_classes();
        include('view/class_list.php');

        break; 
        
    case "add_class":

        if (!empty($class)) {
            
            add_class($class);
            header("Location: .?action=list_classes");
            exit(); 

        } else {

            $error = "Invalid class name.";

            include("view/error.php");
            exit(); 
        }
        break; 

        case "delete_class":

            if ($class_id) {
    
                try {
                    delete_class($class_id);
                    header("Location: .?action=list_classes");
                    exit(); 
    
                } catch (PDOException $e) {
    
                    include('view/header.php'); 
    
                    $error = "You cannot delete a class if vehicles with this class are present.";
                    echo "<p class='error'>$error <a href='index.php'> << Home</a></p>";
                   
                    exit(); 
                }
            }
            break; 



    // MAKES

    case "list_makes":

        $makes = get_makes();
        include('view/make_list.php');

        break; 
        
    case "add_make":

        if (!empty($make)) {
            
            add_make($make);
            header("Location: .?action=list_makes");
            exit(); 

        } else {

            $error = "Invalid make name.";

            include("view/error.php");
            exit(); 
        }
        break; 

        case "delete_make":

            if ($make_id) {
    
                try {
                    delete_make($make_id);
                    header("Location: .?action=list_makes");
                    exit(); 
    
                } catch (PDOException $e) {
    
                    include('view/header.php'); 
    
                    $error = "You cannot delete a make if vehicles with this make are present.";
                    echo "<p class='error'>$error <a href='index.php'> << Home</a></p>";
                   
                    exit(); 
                }
            }
            break; 

        // VEHICLES

    case "add_vehicle":

        if ($make_id && !empty($class_id) && !empty($type_id) && !empty($model) && !empty($price) && !empty($year)) {

            add_vehicle($class_id, $type_id, $make_id, $model, $price, $year);
            header("Location: .?action=list_vehicles&make_id=" . $make_id);
            exit(); 
            
        } else {
            
            $error = "Invalid vehicle data.";
            include("view/error.php");
            echo "<p class='error'>$error <a href='index.php'> << Home</a></p>";
            
            exit(); 
        }
        break; 

    case "delete_vehicle":

        if ($vehicle_id) {

            delete_vehicle($vehicle_id);
            header("Location: .?action=list_vehicles&make_id=" . $make_id);
            exit(); 

        } else {

            $error = "Wrong or missing vehicle.";
            include('view/error.php');

            echo "<p class='error'>$error <a href='index.php'> << Home</a></p>";
            exit(); 
        }

        break; 

    default:
        
        // DROPDOWNS SELECTS
        $types = get_types();
        $classes = get_classes();
        $makes = get_makes();

        // CATEGORIES SELECTS
        
        if ($class_id) {
         $vehicles = get_vehicles_by_class($class_id);

        } else if ($type_id) {

        $vehicles = get_vehicles_by_type($type_id);

        }
        else {
            
        // $vehicles = get_vehicles_by_make($make_id, $type_id, $class_id, $sort);
        $vehicles = get_vehicles_by_make($make_id, $sort);

        }

        include('view/vehicle_list.php');

      
        
}
