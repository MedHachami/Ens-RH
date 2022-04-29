<?php 
include_once '../DB/dbh.php' ;

$sql = "SELECT * FROM announcement ;" ;

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
	<link rel="stylesheet" type="text/css" href="public/icons/mdi/materialdesignicons.min.css">
	<link rel="stylesheet" type="text/css" href="/RH_ENS/Admin/public/css/style.css">
    <link rel="stylesheet" href="/RH_ENS/User/public/css/profile.css">
</head>
<style>
    .notif{
			margin-left: 7px;
			background-color: red;
			border-radius: 5px;
			justify-content: center;
			width: 20px;
			padding-left: 5px;

		}
		span{
			width: 10px;
			display: inline-block;
		}
</style>
<body>
<?php
		$sql1 = "SELECT COUNT(`id`) FROM reclamations_notifications;" ;
		$result1 = mysqli_query($conn, $sql1);
		foreach($result1 as $res1){
			$reclamtionCount = $res1['COUNT(`id`)'] ;
		}

		$sql2 = "SELECT COUNT(`id`) FROM absences_notifications;" ;
		$result2 = mysqli_query($conn, $sql2);
		foreach($result2 as $res2){
			$absenceCount = $res2['COUNT(`id`)'] ;
		}

		
?>
<div class="wrapper">
		<!-- Sidebar -->
	    <nav id="sidebar">
	        <div class="sidebar-header">
	            <h3><a href="Home.php"  >DASHBOARD</a></h3>
	        </div>

	        <ul class="list-unstyled components">
	            
	            <li>
	                <a href="Admin.php" >Home</a>
	                
	            </li>
                <li>
	                <a href="Announcement.php" > Announcement</a>
	                
	            </li>
	            <li>
	                <a href="Reset.php">Reset Password</a>
	            </li>
                <li>
	                <a href="Reclamation.php">Reclamations<span class="notif"><?php if($reclamtionCount!=0)  echo $reclamtionCount ; ?></span></a>
	            </li>
				<li>
	                <a href="Absences.php">Absences<span class="notif"><?php if($absenceCount!=0) echo $absenceCount ; ?></span></span></a>
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
<!---->
<div class="container emp-profile">
    <div >
        <div class="row">
            
            <div class="col-md-12">
                <div class="profile-head">
                            
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">All Announcement</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Add Announcement</a>
                        </li>
                        
                        
                    </ul>
                </div>
            </div>
            
        </div>
        <div class="row">
            
            <div class="col-md-8">
                <div class="tab-content profile-tab" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Date </th>
                                <th scope="col" colspan="2" >Functions</th>
                               

                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                            
                               foreach($result as $r) { ?>


                                <tr>
                                    <th scope="row"><?php echo $r['id'] ;    ?></th>
                                    <td><?php echo $r['title'] ;    ?></td>  
                                    <td><?php echo $r['date'] ;    ?></td>
                                    <td >
                                        <a href="./announcement/viewAnnouncement.php?id=<?php echo $r['id'] ; ?> " class="btn btn-primary" >Edit</a>
                                        <a href="./announcement/deleteAnnouncement.php?id=<?php echo $r['id'] ; ?> " class="btn btn-danger" >Delete</a>
                                    </td>
                                    
                                    
                                </tr>
                                
                                <?php } ?>
                                
                            </tbody>
                            </table>
                            <?php if (isset($_GET['error'])) { ?>
                                <p  class="error"   ><?php echo $_GET['error']; ?></p>
                                <?php } ?>
                                <?php if (isset($_GET['success'])) { ?>
                               <p class="success"><?php echo $_GET['success']; ?></p>
                            <?php } ?>
                                
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <form action="includes/upload.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label >Title</label>
                            <input type="text" class="form-control"  placeholder="Enter Title" name="title">
                        </div>
                        <div class="form-group">
                            <label >Description</label><br><br>
                            <textarea  name="description" cols="30" rows="10" ></textarea>
                                
                            
                        </div>
                        <div class="form-group">
                            <label >link</label>
                            <input type="text" class="form-control"  placeholder="Enter link" name="link">
                        </div>
                        <div class="form-group">
                            <label >Date</label>
                            <input type="date" class="form-control"   name="dateA">
                        </div>
                        <div class="form-group">
                                <label >Add Image</label><br><br>
                                <input type="file" name="file" id="">
                                    
                                
                        </div>

                        
                        <div  class="form-group">
                            <input type="submit" name="Envoyer" value="Envoyer" class="btn btn-primary">
                        </div>
                    </form>
                        
                                
                                
                                
                        
                    </div>
                    
                </div>
            </div>
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