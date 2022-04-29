<?php 
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="public/icons/mdi/materialdesignicons.min.css">
	<link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" href="public/css/profile.css">
</head>
<body>
<div class="wrapper">
		<!-- Sidebar -->
	    <nav id="sidebar">
	        <div class="sidebar-header">
            <h3><a href="Home.php"  >ENS-RH</a></h3>
	        </div>

	        <ul class="list-unstyled components">
	            
	            <li>
	                <a href="Home.php" >Home</a>
	                
	            </li>
	            <li>
	                <a href="#">About</a>
	            </li>
	            <li>
	                <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">E-Services  </a>
	                <ul class="collapse list-unstyled" id="pageSubmenu">
                    <li>
	                        <a href="service.php">Documents à Distance </a>
	                    </li>
	                    <li>
							<a href="SituationAdministrative.php">Situation Administrative</a>
						</li>
	                    <li>
                            <a href="Reclamation.php">Réclamation</a>
	                    </li>
						<li>
	                        <a href="SuiviDemande.php">Suivi De Demandes</a>
	                    </li>
						<li>
	                        <a href="Absences.php">Absences</a>
	                    </li>
						<li>
	                        <a href="#">Promotions</a>
	                    </li>
	                </ul>
	            </li>
	            
	            <li>
	                <a href="#">Contact</a>
	            </li>
				
	        </ul>
	    </nav>

        <!-- Page Content -->
	    <div id="content">
	    	<!-- navbar -->
	    	<nav class="navbar navbar-expand-lg navbar-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn btn-light rounded-circle" style="border: 2px solid #e1e1e1;">
                        <i class="mdi mdi-menu mdi-24px"></i>
                    </button>

                    <ul class="nav navbar-nav ml-auto">
                    	<li>
				          <a href="#" class="dropdown-toggle profile-navbar" data-toggle="dropdown" role="button" aria-expanded="false">
				          	<img src="https://avatars1.githubusercontent.com/u/49246221?s=60&u=1c235446e9abad64a002c82ec494f93d290110ff&v=4" class="img-fluid rounded-circle shadow" width="40">
				          	<?php echo $_SESSION['Nom'] . ' ' . $_SESSION['Prenom'] ;  ?><i class="mdi mdi-chevron-down ml-1"></i>
				          </a>
				          <ul class="dropdown-menu" role="menu">
				            <li class="dropdown-item"><a href="profile.php"><i class="mdi mdi-account mr-1"></i>Profile</a></li>
				            <li class="dropdown-item"><a href="settings.php"><i class="mdi mdi-settings mr-1"></i>Settings</a></li>
				            <div class="dropdown-divider"></div>
				            <li class="dropdown-item"><a href="logout.php"><i class="mdi mdi-logout-variant mr-1"></i>Déconnection</a></li>
				          </ul>
				        </li>
                    </ul>
                </div>
            </nav>

         <div class="container emp-profile">
         <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>CNE</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $_SESSION['cne'] ;?> </p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Nom</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $_SESSION['Nom'] ;?> </p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Prenom</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $_SESSION['Prenom'] ;?> </p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Date de Naissance</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $_SESSION['Date_Naissance'] ;?> </p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Grade</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $_SESSION['Grade'] ;?></p>
                                            </div>
                                        </div>
                                        <form action="includes/EserviceTraitement.php" method="POST">
                                        <div class="row">
                                            
                                            <div class="col-md-6">
                                                <label>Demande Attestation</label>
                                            </div>
                                            
                                            <div class="col-md-6">
                                            <select name="demande_atte" >
                                                <option value="atte1" >atte1</option>
                                                <option value="atte2" >atte2</option>
                                                <option value="atte3" >atte3</option>
                                                <option value="atte4" >atte4</option>
                                            </select>
                                            </div>
                                            <input type="hidden" name="userId" value="<?php echo $_SESSION['id']  ;?>">
                                            <input type="hidden" name="Nom" value="<?php echo $_SESSION['Nom']  ;?>">
                                            <input type="hidden" name="Prenom" value="<?php echo $_SESSION['Prenom']  ;?>">
                                            
                                        
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <?php if (isset($_GET['success'])) { ?>
     		                                        <p  class="success"   ><?php echo $_GET['success']; ?></p>
     	                                        <?php } ?>
                                            </div>
                                        </div>
                                        <input type="submit" name="Envoyer" value="Envoyer" class="btn btn-primary">
                                    </form>
                            </div>         
        </div>




    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	 <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>
</body>
</html>