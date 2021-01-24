<?php
session_start();
require_once('config.php');
?>
<form action="functions.php" class="form" method="post">
    <p>Add Task</p>
    <textarea name="task" class="textarea-task" rows="4" cols="50" placeholder="Write Task"></textarea>
    <br>
    <?php
    if ($_SESSION['inname'] == 'admin') {
        $select = "Select * from `users`";
        $result = mysqli_query($conn, $select);
        echo '<input list="userlist" class="select-input" name="username" placeholder="Username">';
        echo '<datalist class="select-user" id="userlist" >';
        while ($row = mysqli_fetch_array($result)) {
            if ($row['Name'] != 'admin') {
                echo '<option value=' . $row[Name] . ' class="option-user"><p>Email - ' . $row[Email] . '</p></option>';
            }
        }
        echo '</datalist>';
    }
//    echo '<a hidden><input name="usemail" value="' . $row[Email] . '" ></a>';

    ?>

    <input type="submit" class="task-send" name="add-task" value="Add Task">
</form>
