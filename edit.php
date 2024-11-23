<?php
	
	 $conn = mysqli_connect('localhost','root','', 'db_base');
	
	if($_GET['id']){
		$getid = $_GET['id'];
		
		$sql = "SELECT * FROM info WHERE id=$getid";
		
		$query = mysqli_query($conn, $sql);
		
		$data = mysqli_fetch_assoc($query);
		
		$id 		= $data['id'];
		$firstname  = $data['firstname'];
		$lastname	= $data['lastname'];
		$email 		= $data['email'];
	}
	
	if(isset($_POST['edit'])){
		$new_id 	   = $_POST['id'];
		$new_firstname = $_POST['firstname'];
		$new_lastname  = $_POST['lastname'];
		$new_email 	   = $_POST['email'];
		
		$sql1 = "UPDATE info SET firstname = '$new_firstname', 
				lastname = '$new_lastname', email ='$new_email' WHERE id ='$new_id' ";
		if(mysqli_query($conn, $sql1) == TRUE){
			header('location:view.php'); 
			echo "Data Updated!";
		}else{
			echo $sql1. "Data not Upadated!";
		}
	}
?>

<html>
	<head>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	</head>
	
	<body>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
				</div>
				<div class="col-sm-6 pt-4 mt-4">
					<h3>Registration Form</h3>
					<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
						Firstname : <br>
						<input type="text" name="firstname" value="<?php echo $firstname ?>"><br><br>
						Lastname :<br>
						<input type="text" name="lastname" value="<?php echo $lastname ?>"><br><br>
						E-mail :<br>
						<input type="email" name="email" value="<?php echo $email ?>"><br><br>
						<input type="text" name="id" value="<?php echo $id ?>" hidden>
						<input type="submit" value="Edit" name="edit" class="btn btn-success">
					</form>
				</div>
				<div class="col-sm-3">
				</div>
			</div>
		</div>
	</body>


</html>
