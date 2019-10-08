<?php 
	ob_start();
	session_start();
	if(isset($_SESSION['admin']))
	{
		if($_SESSION['who']=='user')
		{
			header('location: ../student/dashboard-stud.php ');
		}
	}
	else
	{
		header("location: ../login.php");
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
			//alert('click');
					document.getElementById('file_nm').innerHTML = document.getElementById("image").value.split("\\").pop();
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
                <a class="nav-link" href="dashboard.php">Dashboard</a>
              </li>
              <li class="nav-item active">
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
              <li class="nav-item">
                <a class="nav-link" href="changep.php">Change Password</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="logout.php">Logout</a>
              </li>
           </ul>
        </div>
  </nav>

	<div class="container">
		<div class="row">
			<div class="col-md-6 offset-3">
				<div class="card card-header mt-5">
					<h3>Enter Student's Information</h3>
				</div>
				<div class="card card-body mb-5">
					<form action="insert.php" method="post" enctype="multipart/form-data">
						
						<div class="form-group">
							<label for="rn">Enter Roll Number :</label>
							<input type="number" name="rollno" class="form-control" required="">
						</div>
						<div class="form-group">
							<label for="rn">Enter Name :</label>
							<input type="text" name="name" class="form-control" required="">
						</div>
						<div class="form-group">
							<label for="password">Enter Password :</label>
							<input id="password" type="password" name="password" class="form-control" required="" onkeyup='check()'>
						</div>
						<div class="form-group">
							<label for="cpassword">Enter Confirm Password :</label>
							<input id="cpassword" type="password" name="cpassword" class="form-control" required="" onkeyup='check()'>
							<span id="msg"></span>
						</div>
						<div class="form-group">
							<label for="rn">Enter City :</label>
							<input type="text" name="city" class="form-control" required="">
						</div>

						<div class="form-group">
							<label>Choose Year :</label>
							<select class="form-control" name="standard">
								<option>First Year</option>
								<option>Second Year</option>
								<option>Third Year</option>
								<option>Last Year</option>
							</select>
						</div>

						<div class="custom-file mt-3">
							<label class="custom-file-label" id="file_nm">Upload File</label>
							<input id="image" type="file" name="image" class="custom-file-input" required=""  accept="image/jpeg, image/png" onchange="File();">
						</div>

						<div class="mb-5 mt-5">
							<input id="btn" type="submit" name="insert_btn" class="btn btn-info form-control" value="Add Record" disabled="">
						</div>
					</form>
				</div>
			</div>
		</div>
		<img id="myBtnTop" src="top3.png" height="50px" width="50px" onclick="topFunction()" >
	</div>
</body>
</html>

<?php  
	if(isset($_REQUEST['insert_btn']))
	{
		$server = "localhost";
		$username = "root";
		$password = "";
		$db = "sis";

		$check  = getimagesize($_FILES['image']['tmp_name']);
		if($check!=false)
		{
			$image = $_FILES['image']['tmp_name'];
			$imgcontent = addslashes(file_get_contents($image));
		}                                             

		$con = mysqli_connect($server,$username,$password,$db);

		$rollno = $_POST['rollno'];
		$name =  $_POST['name'];
		$pass = $_POST['password'];
		$standard = $_POST['standard'];
		$city = $_POST['city'];
		$sql = "insert into user_final values('$rollno','$name','$pass','$standard','$imgcontent','$city')";
		
		$res = mysqli_query($con,$sql);
		//mysqli_close($con);
		if($res>0)
		{
			echo "<script type='text/javascript'> alert('Record Inserted'); window.location='dashboard.php'; </script>";
			//header("location: dashboard.php");
		}
		else
		{
			echo "<script type='text/javascript'> alert('Record with same roll no already exists'); window.location='insert.php'; </script>";
		}
		//else
		//	echo "not inserted";
	}
?>