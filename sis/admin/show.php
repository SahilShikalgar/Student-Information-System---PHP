<?php 
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
		header("location:../login.php");
	}
 ?>
<!DOCTYPE html>
<html>
<head>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
	<title></title>
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
              <li class="nav-item">
                <a class="nav-link" href="insert.php">Add</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="update.php">Update</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="delete.php">Delete</a>
              </li>
              <li class="nav-item active">
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
			<div class="card card-head mt-5 bg-light">
				<h3 class="mx-auto"> Students Information </h3>
			</div>
			<div class="card card-body mb-5">
				<table class="table">
					<thead>
						<tr>
							<th>Roll Number</th>
							<th>Name</th>
							<th>Standard</th>
							<th>City</th>
							<th>Image</th>
						</tr>
					</thead>
					<tbody>

						<?php

							$server = "localhost";
							$username = "root";
							$password = "";
							$db = "sis";
							$con = mysqli_connect($server,$username,$password,$db);
							$sql = "select * from user_final";
							$res = mysqli_query($con,$sql);

								while($row = mysqli_fetch_array($res))
								{
								echo "<tr>";	
									echo "<td>".$row['roll_no']."</td>";
									echo "<td>".$row['name']."</td>";
									echo "<td>".$row['standard']."</td>";
									echo "<td>".$row['city']."</td>";

									echo '<td><img src="data:image/jpeg;base64,'.base64_encode( $row['image'] ).'" height="100px" width="100"/></td>';
									//echo "<td>". $imagedata ."</td>";
								echo "</tr>";
								}

								mysqli_close($con);

						?>

					</tbody>
				</table>
			</div>

			<img id="myBtnTop" src="top3.png" height="50px" width="50px" onclick="topFunction()" >
		</div>
</body>
</html>