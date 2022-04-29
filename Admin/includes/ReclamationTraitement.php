<?php
include_once '../../DB/dbh.php' ;
if(isset($_POST['Seen'])){
    
    $imgReclamtion = $_POST['imgReclamtion'] ;
    

        $string = "Votre demande a ete vue" ;
        $sql1 = "UPDATE reclamations_archive SET status = '$string' WHERE  imgReclamtion = '$imgReclamtion'  ;" ;
        $result1 = mysqli_query($conn,$sql1); 
        if($result1){
            header("Location: ../Reclamation.php?error=none ");
            exit();
        }
        else{
            echo "err1";
        }



}

elseif(isset($_POST['Delete'])){
     
   $id = $_POST['id'] ;
   $imgReclamtion = $_POST['imgReclamtion'] ;
    
   $string = "Votre demande a été résolue";
   

   $sql1 = "UPDATE reclamations_archive SET status='$string' WHERE  imgReclamtion = '$imgReclamtion' ;" ;
   $result1 = mysqli_query($conn,$sql1);

   $sql2 = "DELETE FROM reclamations_notifications WHERE imgReclamtion = '$imgReclamtion' ;" ;
   $result2 = mysqli_query($conn,$sql2);
   
   if($result1 && $result2 ){
    header("Location: ../Reclamation.php?error=none ");
    exit();
   }
   else{
    mysqli_error($conn);
    }


   
}
elseif(isset($_POST['processed'])){
     
    $id = $_POST['id'] ;
    $imgReclamtion = $_POST['imgReclamtion'] ;
     
    $string = "En cours de traitement ";
    
 
    $sql1 = "UPDATE reclamations_archive SET status='$string' WHERE  imgReclamtion = '$imgReclamtion' ;" ;
    $result1 = mysqli_query($conn,$sql1);
 
    
    if($result1 ){
         header("Location: ../Reclamation.php?error=none ");
         exit();
    }
    else{
     mysqli_error($conn);
     }
 
 
    
 }

