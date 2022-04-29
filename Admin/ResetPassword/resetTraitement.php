<?php 


        include_once '../../DB/dbh.php';

        $id = $_GET['id'] ;
        $password=md5(1234);
        $sql = "UPDATE user SET password='$password' WHERE id=$id ;" ;
        $result = mysqli_query($conn, $sql) ;
        
        if($result){
            header("Location:../Reset.php?success=password is reset");
            exit();
        
        }
        else{
            mysqli_error($conn);
        }

      


