<?php
session_start();
if(isset($_POST['Envoyer'])) {

    include_once '../../DB/dbh.php' ;
    $id = $_POST['id'] ;
    $description = $_POST['description'] ;
    $Nom = $_POST['Nom'] ;
    $Prenom = $_POST['Prenom'] ;

    
    $file = $_FILES['file'] ;
    
    $fileName = $_FILES['file']['name'] ;
    $fileTmpName = $_FILES['file']['tmp_name'] ;
    $fileSize = $_FILES['file']['size'] ;
    $fileError = $_FILES['file']['error'] ;
    $fileType = $_FILES['file']['type'] ;
    
    $fileExt = explode('.' , $fileName) ;
    $fileActualExt = strtolower(end($fileExt)) ;
    
    $allowed = array('jpg' , 'jpeg' , 'png' , 'pdf') ;
    
    if($fileName == "") {
        header("Location: ../Reclamation.php?error=The image has not been set");  
        exit;
        
    }
    else{
        if(in_array($fileActualExt , $allowed)){
            if($fileError === 0 ){
                if($fileSize < 10000000){
                    $fileNameNew = uniqid('' ,true).$Nom .".".$fileActualExt ;
                    $fileDestination = '../../DB/uploads/reclamationsImg/' .$fileNameNew;
                    move_uploaded_file($fileTmpName, $fileDestination) ;
                    $sql1 = "INSERT INTO reclamations_notifications(description,userId,Nom,Prenom,imgReclamtion,status) VALUES ('$description' , '$id','$Nom' , '$Prenom' ,'$fileNameNew','-') ;";
                    $result1 = mysqli_query($conn, $sql1) ;
                    $sql2 = "INSERT INTO reclamations_archive(description,userId,Nom,Prenom,imgReclamtion,status) VALUES ('$description' , '$id','$Nom' , '$Prenom' ,'$fileNameNew','-') ;";
                    $result2 = mysqli_query($conn, $sql2) ;
                    
                    if($result1){
                        header("Location: ../Reclamation.php?success=Reclamation Added successfully");  
                        exit;
                    }
                    else{
                        echo "re12" ;
                    }
                    
                }
                else{
                    header("Location: ../Reclamation.php?error=File size is too big");  
                    exit;
                }
            }else{
                header("Location: ../Reclamation.php?error=There was an a erro uploading your file");  
                exit;
            }
        }
        else{
            header("Location: ../Reclamation.php?error=File type is not allowed");  
            exit;
        }
    }
    

}
