<?php 
	include 'dbcon.php';

	if(isset($_GET['id'])){
		$id = $_GET['id'];
		$q = "DELETE FROM students WHERE id = $id";
		$result = mysqli_query($connection, $q);
		if(!$result){
			die("query failed".mysqli_error());
		}
		else{
			header('location:home.php?insert_msg=You successfully removed user');
		}
	}

	
?>