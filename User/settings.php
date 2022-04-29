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
                   <a href="Home.php">Home</a>
	            </li>
	            <li>
	                <a href="#">About</a>
	            </li>
	            <li>
	                <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">E-Services</a>
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
	    	<nav class="navbar navbar-expand-lg navbar-light" >
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
            <form method="post" action="/RH_ens/User/includes/changepasswordTraitement.php">
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-img">
                            <img src="public/icons/profile.png" alt=""/>
                            
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="profile-head">
                                    <h5>
                                        <?php echo $_SESSION['Nom'] . ' ' . $_SESSION['Prenom'] ; ?>
                                    </h5>
                                    <h6>
                                    <?php echo $_SESSION['cne'] ; ?>
                                    </h6>
                                    <p class="proile-rating">Echelon : <span><?php echo $_SESSION['Echelon'] ; ?></span></p>
                            
                        </div>
                        <div class="form-group">
                            <h3>Change password</h3>
                            <div class="form-group">
                            <label >Old Password</label>
                            <input type="password" class="form-control"  placeholder="Enter Old Password" name="oldpassword">
                        </div>
                            
                        </div>
                        <div class="form-group">
                            <label >New Password</label>
                            <input type="password" class="form-control"  placeholder="Enter New Password" name="newpassword">
                        </div>
                        <div class="form-group">
                            <label >Confirm Password</label>
                            <input type="password" class="form-control"  placeholder="Confirm Password" name="confirmpassword">
                        </div>
                        <input type="hidden" name="id" value=" <?php echo $_SESSION['id'] ; ?>   " >
                        
                        <input type="submit" name="Envoyer" value="Envoyer" class="btn btn-primary">
                        <?php if (isset($_GET['error'])) { ?>
     		            <p  class="error"   ><?php echo $_GET['error']; ?></p>
     	                <?php } ?>
                         <?php if (isset($_GET['success'])) { ?>
                        <p class="success"><?php echo $_GET['success']; ?></p>
                        <?php } ?>
                        
                        
                    </div>
                    
                    
                </div>
                <div class="row">
                    
                    
                </div>
            </form>           
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