<?php
	
	$conn = mysqli_connect('localhost','root','', 'db_base');
	
	 if(isset($_GET['deleteid'])){
		$deleteid = $_GET['deleteid'];
		$sql = "DELETE FROM info WHERE id = $deleteid";
		
		if(mysqli_query($conn, $sql) ==TRUE){
			header('location:view.php');
		}
	}
	
?>

  <html>
	<head>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
		<script type="text/javascript">
		function chkalert(id){
			var sts = confirm('Are you sure want to delete this Information');
			if(sts){
				document.location.href='view.php?deleteid=' +id;
			}
		}
	</script>
	</head>
	
	<body>
		<div class="container">
			<div class="row">
				<div class="col-sm-1">
				</div>
				<div class="col-sm-10 pt-4 mt-4 ">
					<h3 class="text-center p-2 m-2 bg-success text-white">User's Information</h3>
					<?php
					$sql1 = "SELECT * FROM info";
					$query1 = mysqli_query($conn, $sql1);
					$num_rows = mysqli_num_rows($query1);
					
					$devided_num = ($num_rows/3)+1;
					
					// $offset = 0;
					if(isset($_GET['pageno'])){
						$get_pageno = $_GET['pageno'];
						$offset = ($get_pageno-1)*3;
						
						$get_pageno_decrement = $get_pageno - 1;
						$get_pageno_increment = $get_pageno + 1;
					}else{
						$offset = 0;
						$get_pageno = 0;
						
						$get_pageno_decrement = 0;
						$get_pageno_increment = 2;
					}
					
						$sql = "SELECT * FROM info LIMIT 3 OFFSET $offset";
						$query = mysqli_query($conn, $sql);
						
						echo "<table class='table table-success'>
								<tr>
									<th>ID</th>
									<th>First name</th>
									<th>Last Name</th>
									<th>E-mail</th>
									<th>Action</th>
								</tr>";
						while($data = mysqli_fetch_assoc($query)){
							$id 		= $data['id'];
							$firstname 	= $data['firstname'];
							$lastname 	= $data['lastname'];
							$email 		= $data['email'];
							echo "<tr>
									<td>$id</td>
									<td>$firstname</td>
									<td>$lastname</td>
									<td>$email</td>
									<td>
										<span class='btn btn-success'>
											<a href='edit.php?id=$id' class='text-white text-decoration-none'>Edit</a>
										</span> 
										<span class='btn btn-danger'>
								
											<a href='javascript:void()' onClick='chkalert($id)' class='text-white text-decoration-none'>Delete</a>
										<span>
									</td>
									
								</tr>";
						}
						echo "</table>";
					?>
						<?php
							if($get_pageno_decrement < 1){
								echo "<span class='bg-success text-white py-2 px-3 m-1'>Previous</span>";
							}else{
								echo "<a href='view.php?pageno=$get_pageno_decrement' class='text-white text-decoration-none'>
										<span class='bg-success text-white py-2 px-3 m-1'> Previous </span>
									</a>";
							}
								
							for($i =  1; $i <= $devided_num; $i++){
								if($i == $get_pageno){
									echo "<span class='bg-dark text-white py-2 px-3 m-1'>$i</span>";
								}else{
									echo "<span class='bg-success text-white py-2 px-3 m-1'>
											<a href='view.php?pageno=$i' class='text-white text-decoration-none'>$i</a>
										</span>";
								}
								
							}
							if($get_pageno_increment > $devided_num){
								echo "<span class='bg-success text-white py-2 px-3 m-1'>Next</span>";
							}else{
								echo "<a href='view.php?pageno=$get_pageno_increment' class='text-white text-decoration-none'>
										<span class='bg-success text-white py-2 px-3 m-1'>Next</span>
									</a>";
							}
							
						?>
				</div>
				<div class="col-sm-1">
				</div>
			</div>
		</div>
	</body>


</html>

 