<?php
include_once '../../DB/dbh.php' ;
if(isset($_POST['Delete'])){
    

    $UniqId=$_POST['UniqId'];

    $sql1 = "DELETE FROM services_notifications WHERE UniqId='$UniqId' ;  " ;
    $result1 = mysqli_query($conn,$sql1);

    $string = "Votre demande a été satisfaite" ;
    $sql2 = "UPDATE  services_archive SET status='$string'   WHERE UniqId='$UniqId' ;  " ;
    $result2 = mysqli_query($conn,$sql2);

    if($result1 && $result2){
        header("Location: ../Admin.php?error=none ");
        exit();
    
    }
    else{
        mysqli_error($conn);
    }

}
elseif(isset($_POST['Seen'])){
    $UniqId=$_POST['UniqId'];
    $string = "Votre demande a ete vue" ;
    $sql = "UPDATE  services_archive SET status='$string'   WHERE UniqId='$UniqId' ;  " ;

    $result = mysqli_query($conn,$sql);
    if($result){
        header("Location: ../Admin.php?error=none ");
        exit();
    
    }
    else{
        mysqli_error($conn);
    }

}
elseif(isset($_POST['Imprimer'])){
    $userId=$_POST['userId'];
    $Topic=$_POST['Topic'];
    $UniqId=$_POST['UniqId'];

    $string = "En cours de traitement" ;
    $sql = "UPDATE  services_archive SET status='$string'   WHERE UniqId='$UniqId' ;  " ;

    $result = mysqli_query($conn,$sql);
    if($result){
        if($Topic == 'atte1'){

            header("Location: ../attestation/attestation1.php?id=$userId " );
            exit();
        }
    
    }
    else{
        mysqli_error($conn);
    }
}