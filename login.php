<?php
	
	$conn = mysqli_connect('localhost','root','', 'db_base');
		
		$firstname_error='';
		$lastname_error='';
		$email_error='';
		$error='';

		if(isset($_POST['submit'])){
			$firstname = $_POST['firstname'];
			if($firstname == ''){
				$firstname_error ="Enter your Frist Name";
				$error='yes';
			}
			$lastname  = $_POST['lastname'];
			if($lastname == ''){
				$lastname_error ="Enter your Last Name";
				$error='yes';
			}
			$email = $_POST['email'];
			if($email == ''){
				$email_error ="Enter your Email";
				$error='yes';
			}
		
			if($error == ''){
				$sql = "INSERT INTO info(firstname,lastname,email)
					VALUES('$firstname','$lastname','$email')";
					
				if(mysqli_query($conn, $sql) == TRUE){
					echo "Data inserted!";
					header('location:login.php');
				}else{
					echo "Data not inserted";
				}
			}
		}
?>

<html>
	<head>
		<title>Registration Form </title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	</head>
	
	<body>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
				</div>
				<div class="col-sm-6 pt-4 mt-4">
					<h3>Registration Form</h3>
					<form action="login.php" method="POST">
						Firstname : <br>
						<input type="text" name="firstname"><br>
						<span style='color:red'><?php echo $firstname_error ?></span><br>
						Lastname :<br>
						<input type="text" name="lastname"><br>
						<span style='color:red'><?php echo $lastname_error ?></span><br>
						E-mail :<br>
						<input type="email" name="email"><br>
						<span style='color:red'><?php echo $email_error ?></span><br>
						<input type="submit" value="submit" name="submit" class="btn btn-success">
					</form>
				</div>
				<div class="col-sm-3">
				</div>
			</div>
		</div>
	</body>


</html>
