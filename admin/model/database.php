<?php

// JAWS DB

 $dsn = "mysql:host=xq7t6tasopo9xxbs.cbetxkdyhwsb.us-east-1.rds.amazonaws.com; dbname=zo2hs1fk26fl3ugv";
 $username = 'q4vzzqm9ilxmj5tc';
 $password = 'h7allzfzqc2qtyb8';

 try {
    $db = new PDO($dsn, $username, $password);


} catch (PDOException $e) {

    $error_message = 'Database Error:<br/>';

    $error_message .= $e->getMessage();
 

    include('view/error.php');
    exit();

}




?>
