<?php

$category = $_POST["category"];
$text= $_POST["text"];
$date = $_POST["goaldate"];
//$complete = $_POST["complete"];
if(isset($_POST['complete']))
    $complete = 1;
else
    $complete = 0;

//if($complete == '' || $complete == null){
//    $complete = 0;
//}

if($category == null || $date == null || $text == null) {
    $error = "Check all fields are filled out and try again.";

}else {
    require_once('connect.php');

    $query = 'INSERT INTO goals
               (goal_category, goal_text, goal_date, goal_complete)
               VALUES
                (:goal_category, :goal_text, :goal_date, :goal_complete)';
    $statement = $db->prepare($query);
    $statement->bindValue(':goal_category', $category);
    $statement->bindValue(':goal_text', $text);
    $statement->bindValue(':goal_date', $date);
    $statement->bindValue(':goal_complete', $complete);
    $statement->execute();
    $statement->closeCursor();


}
include("goaltracker.php");