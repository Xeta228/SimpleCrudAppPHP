<?php 
	include 'dbcon.php';


	if(isset($_POST['add_students'])){
		$fname = $_POST['f_name'];
		$lname = $_POST['l_name'];
		$age = $_POST['age'];

		if($fname == "" || empty($fname)){
			header('location:home.php?message=You need to fill in the first name');
		}

		if($lname == "" || empty($lname)){
			header('location:home.php?message=You need to fill in the last name');
		}

		if($age == "" || empty($age)){
			header('location:home.php?message=You need to fill in the age');
		}

		if(!is_numeric($age)){
			header('location:home.php?message=Age can only be a number');
		}

		if(preg_match('~[0-9]+~', $fname) || preg_match('~[0-9]+~', $lname)){
			header('location:home.php?message=First name or last name cannot contain numbers');
		}

		else{
			$q = "INSERT INTO students (first_name, last_name, age) VALUES ('$fname','$lname', '$age')";
			$result = mysqli_query($connection, $q);

			if(!$result){
				die("query failed".mysqli_error());
			}

			header('location:home.php?insert_msg=Your data has been added successfully');
		}
	}
 ?>