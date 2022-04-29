<?php

    include_once '../../DB/dbh.php' ;
    $id = $_GET['id'];
    $sql = "DELETE FROM announcement WHERE id = $id ;" ;
    if($result = mysqli_query($conn, $sql)){
        header("Location: ../Announcement.php?success=Announcement deleted successfully");
        exit;
    } else {
        echo mysqli_error($conn);
    }