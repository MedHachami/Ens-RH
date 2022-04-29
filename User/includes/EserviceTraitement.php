<?php



if(isset($_POST['Envoyer'])) {
    include_once '../../DB/dbh.php';


    $demande_atte = $_POST['demande_atte'];
    $Nom = $_POST['Nom'] ;
    $Prenom = $_POST['Prenom'] ;
    $userId = $_POST['userId'] ;
    $UniqId = uniqid('' ,true) ;


    $sql1 ="INSERT INTO services_notifications(userId,UniqId,Nom,Prenom,Topic,status) VALUES ($userId, '$UniqId' ,'$Nom' , '$Prenom' , '$demande_atte','---') ; ";
    $sql2 = "INSERT INTO services_archive(userId,UniqId,Nom,Prenom,Topic,status) VALUES ($userId, '$UniqId' , '$Nom' , '$Prenom' , '$demande_atte','---') ;";
    $result1 = mysqli_query($conn, $sql1) ;
    $result2 = mysqli_query($conn, $sql2) ;
        
    if($result1 && $result2){
        header("Location: ../service.php?success=demand sent ");
        exit();
    
    }
    else{
        mysqli_error($conn);
    }


}
else{
    header("location:../service.php?error=notsubmitted");
    exit();
}