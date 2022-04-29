<?php



if(isset($_POST['Envoyer']) && isset($_POST['login']) && isset( $_POST['password']) ){
    include_once '../../DB/dbh.php';

    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
     }
    

    $login =validate($_POST['login']) ;
    $password = validate($_POST['password']);

    if(empty($login) || empty($password)){
        header("Location: /RH_ens/User/index.php?error=All fields are required");
	    exit();
    }
    elseif( $login==='admin' &&  $login==='admin'){
        header("Location: ../../Admin/Admin.php");
	    exit();
    }
    
    else{
        // hashing the password
       $password = md5($password);

        $sql = "SELECT * FROM user WHERE login='$login' AND password='$password'";

		$result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);

            if ($row['login'] === $login && $row['password'] === $password) {
                session_start(); 
            	$_SESSION['id'] = $row['id'];
            	$_SESSION['cne'] = $row['cne'];
            	$_SESSION['Nom'] = $row['Nom'];
                $_SESSION['Prenom'] = $row['Prenom'];
                $_SESSION['login'] = $row['login'];
                $_SESSION['Date_Naissance'] = $row['Date_Naissance'];
                $_SESSION['Lieu_Naissance'] = $row['Lieu_Naissance'];
                $_SESSION['Adresse'] = $row['Adresse'];
                $_SESSION['Situation_Familiale'] = $row['Situation_Familiale'];
                $_SESSION['Nombres_Enfants'] = $row['Nombres_Enfants'];
                $_SESSION['Grade'] = $row['Grade'];
                $_SESSION['Echelon'] = $row['Echelon'];
                $_SESSION['Date_Recrutement'] = $row['Date_Recrutement'];
                

                
            	header("Location:/RH_ens/User/Home.php");
		        exit();
            }else{
				header("Location: /RH_ens/User/index.php?error=Incorect User name or password");
		        exit();
			}
		}else{
			header("Location: /RH_ens/User/index.php?error=Incorect User name or password");
	        exit();
		}
    
    }

}

else{
	header("Location: /RH_ens/User/index.php");
	exit();
}