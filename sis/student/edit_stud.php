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
				$server = "localhost";
				$username = "root";
				$password = "";
				$db = "sis";

				$rollno = $_SESSION['admin'];

				$con = mysqli_connect($server,$username,$password,$db);
				$sql = "select * from user_final where roll_no='$rollno' ";
				$res = mysqli_query($con,$sql);
									

				$row = mysqli_fetch_array($res);
				$name =	$row['name'];
				$standard = $row['standard'];
				$city =	$row['city'];
				$pass = $row['password'];
				$image =$row['image'];

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
	<title>
	</title>
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
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

		var check = function() 
		{
			if(document.getElementById('password').value!=""  && document.getElementById('cpassword').value!="")
			{
				  if (document.getElementById('password').value == document.getElementById('cpassword').value) 
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
			 }
		}

		var File = function()
 		{
 			document.getElementById('image_label').innerHTML = document.getElementById('image').value.split("\\").pop();
 		}

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
              <li class="nav-item active">
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

		<div class="container mt-5">
			<div class="row mt-5 mb-5">
				<div class="col-6 offset-3">
					<div class="card">
						<div class="card-header">
							<h3>Edit Student Profile</h3>
						</div>
						<div class="card-body mb-3">
						<form action="edit_stud.php" method="post"  enctype="multipart/form-data">

						<?php 
						echo '<center> <img src="data:image/jpeg;base64,'.base64_encode( $row['image'] ).'" height="100px" width="100" class="img-rounded img-responsive" /> </center>';
						 ?>

						<div class="form-group mt-3">
							<label for="rn">Enter Name :</label>
							<input type="text" name="name" class="form-control" value='<?php echo $name ?>'>
						</div>
						<div class="form-group">
							<label for="rn">Enter Password :</label>
							<input id="password" type="password" name="password" onkeyup="check();" class="form-control" value='<?php echo $pass ?>'>
						</div>
						<div class="form-group">
							<label for="rn">Enter Confirm Password :</label>
							<input id="cpassword" onkeyup="check();" type="password" name="cpassword" class="form-control" value='<?php echo $pass ?>'>
							<span id="msg"></span>
						</div>
						<div class="form-group">
							<label for="rn">Enter City :</label>
							<input type="text" name="city" class="form-control" value='<?php echo $city ?>'>
						</div>

						<div class="form-group">
							<label>Choose Year :</label>
							<select class="form-control" name="standard" id="standard">
								<option value="First Year" <?php if($standard=="First Year") echo 'selected' ?>>First Year</option>
								<option value="Second Year" <?php if($standard=="Second Year") echo 'selected' ?>>Second Year</option>
								<option value="Third Year" <?php if($standard=="Third Year") echo 'selected' ?>>Third Year</option>
								<option value="Last Year" <?php if($standard=="Last Year") echo 'selected' ?>>Last Year</option>
							</select>
						</div>

						<div class="custom-file mt-3">
							<label id="image_label" name="label" class="custom-file-label">Upload Image</label>
							<input type="file"  name="image" id="image" class="custom-file-input" onchange="File();" accept="image/jpeg, image/png">
						</div>
						
						<div class="mb-5 mt-5">
							<input id="btn" type="submit" name="btn" class="btn btn-primary form-control" value="Update Profile">
						</div>
						</form>
						</div>
					</div>
				</div>
			</div>
			<img id="myBtnTop" src="top3.png" height="50px" width="50px" onclick="topFunction();">
		</div>

</body>
</html>

<?php 
				if(isset($_REQUEST['btn']))
				{
					$rollno = $_SESSION['admin'];
					$name = $_REQUEST['name'];
					$pass = $_REQUEST['password'];
					$city = $_REQUEST['city'];
					$standard = $_REQUEST['standard'];

					$server = "localhost";
					$username="root";
					$password="";
					$db="sis";

					$check  = getimagesize($_FILES['image']['tmp_name']);
					if($check!=false)
					{
						$image = $_FILES['image']['tmp_name'];
						$imgcontent = addslashes(file_get_contents($image));
					}

					$con = mysqli_connect($server,$username,$password,$db);
					if($con)
					{
						if($_FILES['image']['name']!="")
						{
							$sql = "update user_final set name='$name',password='$pass',standard='$standard',image='$imgcontent',city='$city' where roll_no='$rollno'";
						}
						else
						{
							$sql = "update user_final set name='$name',password='$pass',standard='$standard',city='$city' where roll_no='$rollno'";
						}

						$res = mysqli_query($con,$sql);
						if($res>0)
						{
							echo "<script type='text/javascript'> alert('Profile Updated'); window.location='dashboard-stud.php'; </script>";		
						}
					}
				}
 ?>