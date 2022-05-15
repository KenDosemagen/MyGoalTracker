<?php
$dsn = 'mysql:host=apollo.gtc.edu;dbname=kdosemagen_goals';
$username = 'kdosemagen';
$password = '1272518';

try{
    $db = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
    $error_message = $e->getMessage();
    include('database_error.php');
    exit();
}


//$host = "apollo.gtc.edu";
//$user = "kdosemagen";
//$password = "1272518";
//$db = "kdosemagen_goals";
//
//$conn = mysqli_connect($host, $user, $password, $db);

?>


