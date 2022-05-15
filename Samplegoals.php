<?php
include("header.php");
include("navigation.php");
require_once("connect.php");

$queryCategory = 'SELECT * FROM goals WHERE goal_complete = 1';
$statement1 = $GLOBALS['db']->prepare($queryCategory);
$statement1 ->execute();
$fgoals = $statement1->fetchAll();
$statement1->closeCursor();

print("<h2>Here are some goals from our database to get you started</h2>");

foreach($fgoals as $goal){
    echo "<table id='gtable2'>
                  <tr>
                  <td id='tdsg'>" . "\"" . $goal['goal_text'] . "\"" . "</td>
                  </tr>
                  </table>";
}
echo "<br/>";



include("footer.php");

