<?php
     //Démarrer la session
     session_start();

	 //Announce 
	 include_once '../DB/dbh.php' ;

	$sql = "SELECT * FROM announcement ORDER BY date DESC;" ;

	$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title></title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="public/icons/mdi/materialdesignicons.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="public/css/style.css">
	<style>
	*{
		font-family: 'Poppins', sans-serif;
	}
	
	#sidebar ul li a {
    padding: 10px;
    font-size: 1.3em;
    display: block;
    transition: all .6s ease-in-out;
	color: #fff;

	}
	#sidebar ul ul a {
    font-size: 1.2em !important;
    padding-left: 30px !important;
    background: #2C21EB;
	}
	#sidebar ul li a {
    padding: 10px;
    font-size: 1.1em;
    display: block;
    transition: all .6s ease-in-out;
	}
	a, a:hover, a:focus {
    color: inherit;
    text-decoration: none;
    transition: all 0.3s;
	}
	.logo,.logo:hover{
		color: #fff;
		text-decoration: none;
		font-family: 'Poppins', sans-serif;
		
	}
	.navbar-nav>li>a {
    padding-top: 1px;
    padding-bottom: 1px;
	}
	.img_poster{
		width : 20%;
		transition: 1s ease-in-out;
	}
	.img_poster:hover{
		width : 40%;
	}
	#sidebar .sidebarcontent {
  		position: fixed;
	}
	</style>
    
</head>
<body>
	<div class="wrapper">
		<!-- Sidebar -->
	    <nav id="sidebar">
	        <div class="sidebarcontent">
				<div class="sidebar-header">
					<h3><a href="/RH_ens/User/Home.php" class="logo"  >ENS-RH</a></h3>
				</div>

				<ul class="list-unstyled components">
					
					<li>
						<a href="/RH_ens/User/Home.php" >Home</a>
						
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
			</div>
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
				            <li class="dropdown-item"><a href="/RH_ens/User/profile.php"><i class="mdi mdi-account mr-1"></i>Profile</a></li>
				            <li class="dropdown-item"><a href="/RH_ens/User/settings.php"><i class="mdi mdi-settings mr-1"></i>Settings</a></li>
				            <div class="dropdown-divider"></div>
				            <li class="dropdown-item"><a href="/RH_ens/User/logout.php"><i class="mdi mdi-logout-variant mr-1"></i>Déconnection</a></li>
				          </ul>
				        </li>
                    </ul>
                </div>
            </nav>
			<div class="container-body col-sm-10" >

				<h4><small><span class="glyphicon glyphicon-bullhorn"></span> Avis aux Enseignants</small></h4>
				<br>
				<?php 
				
                    foreach($result as $r) { 
						
				?>
 
				<div class="card">
					<h5 class="card-header " style="background: #f1f1f3;"><span class="glyphicon glyphicon-list-alt" ></span> <?php echo $r['title'] ?> </h5>
						<div class="card-body">

							<p class="card-text"style="color:black" ><?php echo $r['description'] ?></p>
							<div><img src=" ../DB/uploads/announces/<?php echo $r['urlImg'] ; ?>" class="img_poster" alt=""></div>
							<div>
								<?php if( !empty($r['link']) ) { ?>
									<a href="<?php echo $r['link'] ; ?> " style="color: #2C21EB;" >Read More</a>
								<?php } ?>
										
								
							</div>

						<h5 class="card-title">
							<span class="glyphicon glyphicon-time" ></span> Publié le  
							<span class="label label-success  "> 
								<?php echo date('d-m-Y', strtotime($r['date'])) ?>
							</span>
						</h5>

						</div>
						
				</div>
				<br><br>
				<?php } ?>
				
				
			</div>
			
			
			
			
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