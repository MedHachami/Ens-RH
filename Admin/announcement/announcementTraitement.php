<?php

if(isset($_POST['Envoyer'])) {

    include_once '../../DB/dbh.php' ;

    $title = $_POST['title'];
    $description = $_POST['description'];
    $dateA = $_POST['dateA'];
    $link = $_POST['link'] ;


    if(empty($title)  || empty($dateA)) {
        header("location : ../Announcement.php?error=All fields are required");
        exit();
    }
    else{
        $sql = "INSERT INTO announcement(title,description,date,link) VALUES ('$title' , '$description' , '$dateA' ,'$link' ) ;";
        $result = mysqli_query($conn, $sql) ;
        
        if($result){
            header("Location:../Announcement.php?success=Announcement added successfully");
            exit();
        
        }
        else{
            mysqli_error($conn);
        }
    }


}
else{

}