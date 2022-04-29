<?php 
include_once '../../DB/dbh.php' ;
$id = $_GET['id'];
$sql = "SELECT * FROM announcement WHERE id = $id ;" ;

$result = mysqli_query($conn, $sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="../public/icons/mdi/materialdesignicons.min.css">
	<link rel="stylesheet" type="text/css" href="../public/css/style.css">
    <link rel="stylesheet" href="/RH_ENS/User/public/css/profile.css">
    
</head>
<body>
<div class="wrapper">
		<!-- Sidebar -->
	    <nav id="sidebar">
	        <div class="sidebar-header">
	            <h3><a href="Home.php"  >DASHBOARD</a></h3>
	        </div>

	        <ul class="list-unstyled components">
	            
	            <li>
	                <a href="/RH_ENS/Admin/Admin.php" >Home</a>
	                
	            </li>
				<li>
	                <a href="/RH_ENS/Admin/Announcement.php" > Announcement</a>
	                
	            </li>
	            <li>
	                <a href="/RH_ENS/Admin/Reset.php">Reset Password</a>
	            </li>
                <li>
	                <a href="Reclamation.php">Reclamations</a>
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
				          	Admin<i class="mdi mdi-chevron-down ml-1"></i>
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

            <form method="post" action="announcementUpdate.php">
            <div class="container emp-profile">


                <?php 
                if ($result->num_rows > 0) {
                    // output data of each row
                    if($row = $result->fetch_assoc()) 
                    $title = $row['title'];
                    $description = $row['description'];
                    $date = $row['date'];
                    $link = $row['link'];

                    
                    ?>

                    <div class="col-md-6">
                        
                        <div class="form-group"  >
                            
                            <div class="form-group">
                            <label >Title</label>
                            <input type="text" class="form-control" value = "<?php echo "$title" ?>"  name="title">
                        </div>
                            
                        </div>
                        <div class="form-group">
                            <label for="">description</label><br>
                            <textarea name="description" id="" cols="30" rows="10" ><?php echo "$description" ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Link</label><br>
                            <input type="text" class="form-control" value = "<?php echo "$link" ?>"  name="link">
                        </div>
                        <div class="form-group">
                            <label >Date</label>
                            <input type="date" class="form-control" value = "<?php echo "$date" ?>"  placeholder="Enter Date" name="dateA">
                        </div>
                        
                        <input type="hidden" name="id" value="<?php echo  $_GET['id']  ?>">
                        <input type="submit" name="Envoyer" value="Envoyer" class="btn btn-primary">
                        
                        
                        
                    </div>
                    
                    
                </div>








                    
                    
                    <?php } ?>
           
                   
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

