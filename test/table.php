<?php
session_start();
require_once('config.php');
?>
<div class="sort"></div>
<table border="1" class="content-table" id="id01">
    <tr class="col-md-3">
        <th id="facility_header" >Username</th>
        <th>Email</th>
        <th>Task</th>
        <th>Date</th>
        <th>Status</th>
        <?php
        if ($_SESSION['inname'] == 'admin') {
            echo '<th class="admin-tools">Admin Tools</th>';
        }
        ?>

    </tr>
    <?php

    $select = "Select * from `task`";
    $result = mysqli_query($conn, $select);
    while ($row = mysqli_fetch_array($result)) {
        echo "<tr class='list'>";
        echo "<form action='functions.php' method='post' role = 'form'>";
        echo "<td>$row[Name]</td>";
        echo "<td>$row[Email]</td>";
        if ($_SESSION['inname'] == 'admin') {
            echo '<a hidden><input type="hidden" name="id" value="' . $row[Id] . '"></a>';
            echo "<td><textarea name='taskUpdate' class='admin-textarea'>$row[Task]</textarea></td>";
        } else {
            echo "<td>$row[Task]</td>";
        }
        echo "<td>$row[Date]</td>";
        echo "<td class='status'><button type='text' class='status status-btn' name='status'>$row[Status]</button></td>";
        if ($_SESSION['inname'] == 'admin') {
            echo "<td class='admin-buttons '><button type='submit' name='update'><img src='images/refresh.png' alt='refresh'></button>
                                <button  type='submit' class='confirm-task' name='confirm'><img src='images/confirm.png' alt='confirm'></button>
                                <a class='delete-icon'><img src='images/delete.png' alt='delete'></a>
                                <div class='delete-but'>
                                <p>delete?</p>
                                <button type='submit' class='delete-task-yes' name='delete'>Yes</button>
                                <a class='delete-task-no'>No</a>
                                </div></td>";
        }
        echo "</form>";
        echo "</tr>";


    }

    ?>
</table>


