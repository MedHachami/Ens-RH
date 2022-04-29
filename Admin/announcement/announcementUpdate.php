<?php

if(isset($_POST['Envoyer'])) {

    include_once '../../DB/dbh.php' ;

    $title = $_POST['title'];
    $description = $_POST['description'];
    $dateA = $_POST['dateA'];
    $link = $_POST['link'];
    $id = $_POST['id'] ;



    if(empty($title) || empty($description) || empty($dateA)) {
        header("location : ../announcement/viewAnnouncement.php?error=All fields are required");
        exit();
    }
    else{
        $sql = " UPDATE announcement SET title='$title' , description = '$description' , date = '$dateA ' , link='$link' WHERE id = $id  ;";
        $result = mysqli_query($conn, $sql) ;
        
        if($result){
            header("Location:../Announcement.php?success=Announcement updated successfully");
            exit();
        
        }
        else{
            mysqli_error($conn);
        }
    }



}
else{

}