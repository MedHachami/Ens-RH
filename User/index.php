<?php
     //Démarrer la session
     session_start();
?>

<!DOCTYPE HTML>
<html lang="en" >
<html>
<head>
  <title>Login</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="public/css/login_style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>  
  <link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'> 
  <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
</head>

<body class="body">
	


<div class="login-page">
  <div class="form">

    <form action="includes/loginTraitement.php" method="post" >
      <img src="public/icons/logo-ens.png" alt="">
      <input type="text" placeholder="&#xf007;  login" name="login" />

      <input type="password" id="password" placeholder="&#xf023;  password" name="password" />
      <i class="fas fa-eye" onclick="show()"></i> 
      <br>
      <br>
      <input type="submit" name="Envoyer" value="Envoyer" class="button">
      <p class="message"></p>
      <?php if (isset($_GET['error'])) { ?>
     		            <p  class="error"   ><?php echo $_GET['error']; ?></p>
     	<?php } ?>
    </form>

   
  </div>
</div>


  
  <script src="public/js/main.js"></script>
</body>
</html>
