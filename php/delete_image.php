<?php
    require_once './db_connection.php';

    $del_id =  $_REQUEST['id'];
    $delete_query = "DELETE FROM imageInfo where id=$del_id";
    $delete =  mysqli_query($conn, $delete_query);

    if ($delete) {
        echo '<script>alert("User data successfully deleted!")</script>';
        echo "<script>window.location='imgTable.php';</script>";
    }

mysqli_close($connection);
   