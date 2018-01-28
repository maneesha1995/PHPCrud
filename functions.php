<?php

	require 'connect.php';

	function insertuser(){
		require 'connect.php';
		if(isset($_POST['insert']))
		{
			$name = mysqli_real_escape_string($conn, $_REQUEST['name']);
			$age = mysqli_real_escape_string($conn, $_REQUEST['age']);
			
			// attempt insert query execution
			$sql="INSERT INTO `user`(`UserName`, `UserAge`) VALUES ('$name','$age')";
			
			if(mysqli_query($conn, $sql)){
			    echo'<script language ="javascript">';
                echo'alert("User Added succesfully")';
                echo'</script>';
			} else{
			    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
			}
		}
	}
?>
