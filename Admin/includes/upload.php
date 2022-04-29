<?php
session_start();
if(isset($_POST['Envoyer'])) {

    include_once '../../DB/dbh.php' ;
    
    $title = $_POST['title'];
    $description = $_POST['description'];
    $link = $_POST['link'];
    $dateA = $_POST['dateA'];
    
    $file = $_FILES['file'] ;
    
    $fileName = $_FILES['file']['name'] ;
    $fileTmpName = $_FILES['file']['tmp_name'] ;
    $fileSize = $_FILES['file']['size'] ;
    $fileError = $_FILES['file']['error'] ;
    $fileType = $_FILES['file']['type'] ;
    
    $fileExt = explode('.' , $fileName) ;
    $fileActualExt = strtolower(end($fileExt)) ;
    
    $allowed = array('jpg' , 'jpeg' , 'png' , 'pdf') ;
    
    
    

    if(in_array($fileActualExt , $allowed)){
        if($fileError === 0 ){
            if($fileSize < 10000000){
                $fileNameNew = $title .".".$fileActualExt ;
                $fileDestination = '../../DB/uploads/announces/' .$fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination) ;
                $sql = "INSERT INTO announcement(title,description,date,link,urlImg) VALUES ('$title' , '$description' , '$dateA' ,'$link' , '$fileNameNew' ) ;";
                $result = mysqli_query($conn, $sql) ;
                
                if($result){
                    header("Location: ../Announcement.php?success=Announcement Added successfully");  
                    exit;
                
                }
                else{
                    mysqli_error($conn);
                }
            }
            else{
                header("Location: ../Announcement.php?error=File size is too big");  
                exit;
            }
        }else{
            header("Location: ../Announcement.php?error=There was an a erro uploading your file");  
            exit;
        }
    }
    else{
        header("Location: ../Announcement.php?error=File type is not allowed");  
        exit;
    }
}
