<?php 

	session_start();
	if(isset($_SESSION['admin']))
	{
		if($_SESSION['who']=='user')
		{
			header('location: ../student/dashboard-stud.php ');
		}
		if($_SESSION['who']=='admin')
		{
			if(isset($_REQUEST['change']))
			{
				$server = "localhost";
				$username="root";
				$password="";
				$db="sis";
				
				$rn=$_SESSION['admin'];
				$pass = $_REQUEST['password_new'];

				$con = mysqli_connect($server,$username,$password,$db);
				

				if($con)
				{
					$sql = "SELECT password FROM admin where name='$rn' ";
					$result = mysqli_query($con,$sql);

					$row=mysqli_fetch_array($result);


					if($row['password'] == $_REQUEST['password_old'])
					{
						$sql1  = "update admin set password='$pass' where name='$rn'";
						$res1 = mysqli_query($con,$sql1);
						if($res1>0)
						{
							//header('location:dashboard.php');
							echo "<script type='text/javascript'> alert('Password Changed Successfully'); window.location='dashboard.php'; </script>";
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
		header("location:../login.php");
	}

 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>

	<style type="text/css">
		#myBtnTop
		{
			display: none;
		    position: fixed;
		    right: 20px;
		    bottom: 20px;
		    width: 50px;
		    height: 50px;
		    line-height: 40px;
		    color: #fff;
		    font-size: 18px;
		    cursor: pointer;
		    -webkit-border-radius: 2px;
		    -moz-border-radius: 2px;
		    -ms-border-radius: 2px;
		    border-radius: 2px;
		    text-align: center;
		    z-index: 100;
		    -webkit-box-sizing: content-box;
		    -moz-box-sizing: content-box;
		    box-sizing: content-box;

		}
	</style>
	<script type="text/javascript">
		window.onscroll = function() { scrollFunction() };

		function scrollFunction()
		{
			if(document.body.scrollTop > 20 || document.documentElement.scrollTop > 20)
			{
				document.getElementById('myBtnTop').style.display = "block";
			}
			else
			{
				document.getElementById('myBtnTop').style.display = "none";
			}
		}

		function topFunction()
		{
			document.body.scrollTop = 0;
			document.documentElement.scrollTop = 0;
		}
	</script>


	<script type="text/javascript">

		var check = function() 
		{
			if(document.getElementById('cp1').value!=""  && document.getElementById('cp2').value!="" && document.getElementById('ps').value!="")
			{

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
				    document.getElementById('btn').disabled=true;
				  }

				  if (document.getElementById('cp1').value == document.getElementById('cp2').value) 
				  {
				  	if(document.getElementById('cp1').value != document.getElementById('ps').value)
				  	{
				    	document.getElementById('btn').disabled=false;
					}
				    document.getElementById('msg').style.color = 'green';
				    document.getElementById('msg').innerHTML = 'matching';
				  } 
				  else
				  {
				    document.getElementById('msg').style.color = 'red';
				    document.getElementById('msg').innerHTML = 'not matching';
				    document.getElementById('btn').disabled=true;
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
                <a class="nav-link " href="dashboard.php">Dashboard</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="insert.php">Add</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="update.php">Update</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="delete.php">Delete</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="show.php">Show</a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="changep.php">Change Password</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="logout.php">Logout</a>
              </li>
           </ul>
        </div>
  </nav>

		 <div class="container mt-5">
				 	<div class="row">
				 		<div class="col-md-6 offset-3">
				 			<form action="changep.php" method="post">
				 			<div class="card">
				 				<div class="card-header">
				 					<h3>Change Admin Password</h3>
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

									<input id="btn" type="submit" name="change" class="btn btn-info form-control mt-3" value="Login" disabled="">
				 				</div>
				 			</div>
				 			</form>
				 		</div>
				 	</div>
				 	<img id="myBtnTop" src="top3.png" height="50px" width="50px" onclick="topFunction()" >
				 </div>
</body>
</html>