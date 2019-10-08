<?php 
	session_start();

	if(isset($_SESSION['admin']))
	{
		if($_SESSION['who']=='admin')
		{
			header('location: ../admin/dashboard.php');
		}
		
		if($_SESSION['who']=='user')
		{
			if(isset($_REQUEST['change']))
			{
				$server = "localhost";
				$username="root";
				$password="";
				$db="sis";
				
				$rn=$_SESSION['admin'];
				$con = mysqli_connect($server,$username,$password,$db);
				

				if($con)
				{
					$sql = "SELECT password FROM user_final where roll_no='$rn' ";
					$result = mysqli_query($con,$sql);

					$row=mysqli_fetch_array($result);
					$pass = $_REQUEST['password_new'];


					if($row['password'] == $_REQUEST['password_old'])
					{
						$sql1  = "update user_final set password='$pass' where roll_no='$rn'";
						$res1 = mysqli_query($con,$sql1);
						if($res1>0)
						{
							//header('location:dashboard-stud.php');
							echo "<script type='text/javascript'> alert('Password Changed Successfully'); window.location='dashboard-stud.php'; </script>";
						}
						else
							echo "Not updated";
					}
					else
					{
						echo "<script>alert('Given old password is incorrect');</script>";
					}
				}
				else
				{
					echo "not Established";
				}
			}	
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

	<script type="text/javascript">

		var check = function() 
		{
			if(document.getElementById('cp1').value!=""  && document.getElementById('cp2').value!="" && document.getElementById('ps').value!="")
			{
				  if (document.getElementById('cp1').value == document.getElementById('cp2').value) 
				  {
				    document.getElementById('msg').style.color = 'green';
				    document.getElementById('msg').innerHTML = 'matching';
				    document.getElementById('btn').disabled=false;
				  } 
				  else
				  {
				    document.getElementById('msg').style.color = 'red';
				    document.getElementById('msg').innerHTML = 'not matching';
				    document.getElementById('btn').disabled=true;
				  }

				  if(document.getElementById('cp1').value == document.getElementById('ps').value)
				  {
				  	document.getElementById('msg2').style.color = 'red';
				    document.getElementById('msg2').innerHTML = 'old and new password is same';
				    document.getElementById('btn').disabled=true;
				  }
				  else
				  {
				  	document.getElementById('msg2').style.color = 'green';
				    document.getElementById('msg2').innerHTML = '';
				    document.getElementById('btn').disabled=false;
				  }
			 }
		}

	</script>
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
                <a class="nav-link" href="dashboard-stud.php">Dashboard</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="edit_stud.php">Edit Profile</a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="changep_stud.php">Change Password</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="logout-stud.php">Logout</a>
              </li>
           </ul>
        </div>
  </nav>

		 <div class="container mt-5">
				 	<div class="row">
				 		<div class="col-md-6 offset-3">
				 			<form action="changep_stud.php" method="post">
				 			<div class="card">
				 				<div class="card-header">
				 					<h3>Change Student Password</h3>
				 				</div>
				 				<div class="card-body mb-5">
				 					<div class="form-group mt-2">
										<label for="ps">Enter Old Password : </label>
										<input
										 type="password" name="password_old" id="ps" placeholder="Enter Old Password" class="form-control" required="true" onkeyup='check();'> 
										 <span id="msg2"></span>
									</div>
									<div class="form-group">
										<label for="cp1">Enter New Password : </label>
										<input type="password" name="password_new" id="cp1" placeholder="Confirm Password" class="form-control" required="true" onkeyup="check();"> 
									</div>
									<div class="form-group">
										<label for="cp2">Enter New Password : </label>
										<input id="cp2" type="password" name="cpassword_new" placeholder="Re-Confirm Password" class="form-control" onkeyup="check();" required=""> 
										<span id='msg'></span>
									</div>

									<input id="btn" type="submit" name="change" class="btn btn-primary form-control mt-3" value="Login" disabled="">
				 				</div>
				 			</div>
				 			</form>
				 		</div>
				 	</div>
				 </div>
</body>
</html>