<?php



 $dsn = "mysql:host=localhost; dbname=zippyautos";
 $username = 'root';
 $password = '';

 try {
    $db = new PDO($dsn, $username, $password);

  $db = new PDO($dsn, $username);

} catch (PDOException $e) {

    $error_message = 'Database Error:<br/>';

    $error_message .= $e->getMessage();
 

    include('view/error.php');
    exit();

}




?>
