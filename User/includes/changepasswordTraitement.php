<?php



if(isset($_POST['Envoyer'])) {

    
    include_once '../../DB/dbh.php';

    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
     }

    $oldpassword = validate($_POST['oldpassword']);
    $newpassword = validate($_POST['newpassword']);
    $confirmpassword = validate($_POST['confirmpassword']);
    

    $id=$_POST['id'];

    if( empty($newpassword) || empty($confirmpassword) || empty($oldpassword)){
        header("location: /RH_ens/User/settings.php?error=all fields required");
        exit();
    }
    elseif($newpassword != $confirmpassword ){
        header("location: /RH_ens/User/settings.php?error=password does not match");
        exit();
    }
    else{
        // hashing the password
    	$oldpassword = md5($oldpassword);
    	$newpassword = md5($newpassword);



        $sql = "SELECT password FROM user WHERE  id=$id AND password='$oldpassword' ;";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) == 1) {
            

            $sql_2 = "UPDATE user SET password='$newpassword' WHERE id=$id ";
        	mysqli_query($conn, $sql_2);

            header("Location: /RH_ens/User/settings.php?success=Your password has been changed successfully");
	        exit();

        }
        else {
            header("Location: /RH_ens/User/settings.php?error=Incorrect old password");
	        exit();
        }

         

            
    }       


}


else{
    header("location:/RH_ens/User/settings.php?error=notsubmitted");
    exit();
}