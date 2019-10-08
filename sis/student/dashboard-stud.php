
<?php 

	session_start();
	
	if(isset($_SESSION['admin']))
	{
		if($_SESSION['who']=='admin')
		{
			header('location: ../admin/dashboard.php');
		}
	}
	else
	{
		header("Location: ../login.php");
	}

 ?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>

</head>
<body>
		 <nav class="navbar navbar-expand-lg navbar-light bg-light ml-auto">
  
      <div class="navbar-brand" href="../login.php">
      <img src="../icon/sis.jpg" height="50" width="70">
      <div class="ml-3 d-inline" >Student Information System</div>
      </div>

     <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarid" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

      <div class="collapse navbar-collapse" id="navbarid">
        <ul class="navbar-nav text-center ml-auto mr-5">
              <li class="nav-item">
                <a class="nav-link active" href="dashboard-stud.php">Dashboard</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="edit_stud.php">Edit Profile</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="changep_stud.php">Change Password</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="logout-stud.php">Logout</a>
              </li>
           </ul>
        </div>
  </nav>

		<div class="container">
			<div class="row mt-5">
				<div class="col">
					<div class="jumbotron mt-5">
						<h3>Click Here to Edit Profile </h3>
						<form action="edit_stud.php" method="post">
						<input class="btn btn-primary form-control mt-4" type="submit" name="insert" value="Edit Profile">
						</form>
					</div>
				</div>
				<div class="col">
					<div class="jumbotron mt-5">
						<h3>Click Here to Change Password</h3>
						<form action="changep_stud.php" method="post">
						<input class="btn btn-primary form-control mt-4" type="submit" name="delete" value="Change Password">
						</form>
					</div>
				</div>
				<div class="col">
					<div class="jumbotron mt-5">
						<h3>Click Here to Logout Account</h3>
						<form action="logout-stud.php" method="post">
						<input class="btn btn-primary form-control mt-4" type="submit" name="update" value="Logout Student">
						</form>
					</div>
				</div>
		</div>

</body>
</html>


