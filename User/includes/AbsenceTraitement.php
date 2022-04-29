<?php
session_start();
if(isset($_POST['Envoyer'])) {

    include_once '../../DB/dbh.php' ;
    $id = $_POST['id'] ;
    $description = $_POST['description'] ;
    $Nom = $_POST['Nom'] ;
    $Prenom = $_POST['Prenom'] ;
    $dateJustif = $_POST['dateJustif'];
    
    $file = $_FILES['file'] ;
    
    $fileName = $_FILES['file']['name'] ;
    $fileTmpName = $_FILES['file']['tmp_name'] ;
    $fileSize = $_FILES['file']['size'] ;
    $fileError = $_FILES['file']['error'] ;
    $fileType = $_FILES['file']['type'] ;
    
    $fileExt = explode('.' , $fileName) ;
    $fileActualExt = strtolower(end($fileExt)) ;
    
    $allowed = array('jpg' , 'jpeg' , 'png' , 'pdf' ) ;
    
    if($fileName == "") {
        header("Location: ../Absences.php?error=The image has not been set");  
        exit;
        
    }
    else{
        if(in_array($fileActualExt , $allowed)){
            if($fileError === 0 ){
                if($fileSize < 10000000){
                    $fileNameNew = uniqid('' ,true).$Nom .".".$fileActualExt ;
                    $fileDestination = '../../DB/uploads/AbsenceImg/' .$fileNameNew;
                    move_uploaded_file($fileTmpName, $fileDestination) ;
                    $sql1 = "INSERT INTO absences_notifications(description,Nom,Prenom,ImgUrl,dateJustif) VALUES ('$description' , '$Nom' , '$Prenom' ,'$fileNameNew','$dateJustif') ;";
                    $result1 = mysqli_query($conn, $sql1) ;
                    $sql2 = "INSERT INTO absences_archive(description,Nom,Prenom,ImgUrl,dateJustif) VALUES ('$description' , '$Nom' , '$Prenom' ,'$fileNameNew' ,'$dateJustif') ;";
                    $result2 = mysqli_query($conn, $sql2) ;
                    
                    if($result1 && $result2){
                        header("Location: ../Absences.php?success=Your justification was added successfully");  
                        exit;
                    }
                    else{
                        echo "re1" ;
                    }
                    
                }
                else{
                    header("Location: ../Absences.php?error=File size is too big");  
                    exit;
                }
            }else{
                header("Location: ../Absences.php?error=There was an a erro uploading your file");  
                exit;
            }
        }
        else{
            header("Location: ../Absences.php?error=File type is not allowed");  
            exit;
        }
    }

}
