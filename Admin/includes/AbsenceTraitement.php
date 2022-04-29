<?php

if(isset($_POST['Delete'])){
    include_once '../../DB/dbh.php' ; 
    $id = $_POST['id'] ;
    $ImgUrl = $_POST['ImgUrl'] ;	

   
        $sql1 = "DELETE FROM absences_notifications WHERE ImgUrl = '$ImgUrl';" ;
        $result1 = mysqli_query($conn,$sql1); 
        if($result1){
            header("Location: ../Absences.php?error=none ");
            exit();
        }
        else{
            echo "err2";
        }
 
    

}