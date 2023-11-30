<?php 
include 'header.php'; 
include 'footer.php';
include 'dbcon.php';
?>

<div class="container">
	<div class="box1">
		<h2>ALL STUDENTS</h2>
		<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">ADD STUDENTS</button>
	</div>
	<table class="table table-hover table-bordered table-striped">
		<thead>
			<tr>
				<th>ID</th>
				<th>First name</th>
				<th>Last name</th>
				<th>Age</th>
				<th> </th>
				<th> </th>
			</tr>
		</thead>
		<tbody>
			<?php  
			$q = "SELECT * FROM students";
			$result = mysqli_query($connection, $q);
			if(!$result){
				die("query failed".mysqli_error());
			}
			else{
				while($row = mysqli_fetch_assoc($result)){
					?>
					<tr>
						<td><?php echo $row['id']; ?></td>
						<td><?php echo $row['first_name']; ?></td>
						<td><?php echo $row['last_name']; ?></td>
						<td><?php echo $row['age']; ?></td>
						<td><a href="update_page_1.php?id=<?php echo $row['id']?>" class = "btn btn-success">Update</td>
						<td><a href="delete_page_1.php?id=<?php echo $row['id']?>" class = "btn btn-danger">Delete</td>
					</tr>
					<?php
				}
			}
			?>

		</tbody>
	</table>
	
	<?php 
	if(isset($_GET['message'])){
		echo "<h6>".$_GET['message']."</h6>";
	}
	if(isset($_GET['insert_msg'])){
		echo "<div class=\"success_box\"><h6>".$_GET['insert_msg']."</h6></div>";
	}

	?>
	
	<!-- Modal -->
	<form action="insert_data.php" method="POST">
		<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">ADD STUDENTS</h5>
						<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">

						<div class="form-group">
							<label for="f_name">First Name</label>
							<input type="text" name="f_name" class="form-control">
						</div>
						<div class="form-group">
							<label for="l_name">Last Name</label>
							<input type="text" name="l_name" class="form-control">
						</div>
						<div class="form-group">
							<label for="age">Age</label>
							<input type="text" name="age" class="form-control">
						</div>	

					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
						<input type="submit" class="btn btn-success" name="add_students" value="Add">
					</div>
				</div>
			</div>
		</div>
	</form>
</div>




</body>