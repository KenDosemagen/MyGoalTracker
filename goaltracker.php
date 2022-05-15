
<?php
include("header.php");
include("navigation.php");
?>

<div id="container">
    <h1 class="ng">New Goal</h1>
    <form action="insertgoal.php" method="post">
        <p>Category <select name="category" id="cat">
            <option value="0">Personal</option>
            <option value="1">Professional</option>
            <option value="2">Other</option>
        </select></p>
        <p>Date <input type="date" id="goaldate" name="goaldate" /></p>
        <p>Goal <textarea name="text" id="text" cols="30" rows="1"></textarea></p>
        <p>Goal Completed <input type="checkbox" id="complete" name="complete"
                                 value="1" /></p>
        <input type="submit" name="btnSubmit" class="button" value="submit" />

    </form>
    <form method="post">
        <button name="btnIncomplete"
               class="button">Incomplete Goals</button>

        <button name="btnComplete"
               class="button">CompleteGoals</button>
    </form>
    <?php
    require('connect.php');

    print("<h2>Incomplete Goals</h2>");
    if(isset($_POST['btnIncomplete'])) {
        $queryCategory = 'SELECT * FROM goals WHERE goal_complete = 0';
        $statement1 = $GLOBALS['db']->prepare($queryCategory);
        $statement1 ->execute();
        $incgoals = $statement1->fetchAll();
        $statement1->closeCursor();

        foreach($incgoals as $goal){
            if($goal['goal_category'] == 0){
                $goal['goal_category'] = "Personal";
            }
            elseif ($goal['goal_category'] == 1){
                $goal['goal_category'] = "Professional";
            }
            else{
                $goal['goal_category'] = "Other";
            }
            echo "<table id='gtable'>
                  <tr>
                  <th>Goal <br/>  Number</th>
                  <th>Category</th>
                  <th>Goal</th>
                  
                  </tr>
                  <tr>
                  <td id='tdn'>" . $goal['goal_id'] . "</td>
                  <td id='tdn'>" . $goal['goal_category'] . "</td>
                  <td id='tdt'>" . $goal['goal_text'] . "</td>
                  </tr>
                  </table>";
        }
    }

    print("<h2>Complete Goals</h2>");
    if(isset($_POST['btnComplete'])) {
        $queryCategory = 'SELECT * FROM goals WHERE goal_complete = 1';
        $statement1 = $GLOBALS['db']->prepare($queryCategory);
        $statement1 ->execute();
        $cgoals = $statement1->fetchAll();
        $statement1->closeCursor();

        foreach($cgoals as $goal){
            if($goal['goal_category'] == 0){
                $goal['goal_category'] = "Personal";
            }
            elseif ($goal['goal_category'] == 1){
                $goal['goal_category'] = "Professional";
            }
            else{
                $goal['goal_category'] = "Other";
            }
            echo "<table id='gtable'>
                  <tr>
                  <th>Goal <br/> Number</th>
                  <th>Goal</th>
                  </tr>
                  <tr>
                  <td id='tdn'>" . $goal['goal_id'] . "</td>
                  <td id='tdn'>" . $goal['goal_category'] . "</td>
                  <td id='tdt'>" . $goal['goal_text'] . "</td>
                  </tr>
                  </table>";
        }
        echo "<br/>";
    }

    ?>
</div>

<?php include("footer.php") ?>
