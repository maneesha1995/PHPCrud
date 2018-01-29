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

	function viewusers (){
		require 'connect.php';
		// Attempt select query execution
                    $sql="SELECT * FROM user ";
                    if($result = mysqli_query($conn, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo "<table class='table table-bordered table-striped'>";
                                echo "<thead>";
                                    echo "<tr>";
                                        
                                        echo "<th></th>";
                                        echo "<th>User Name</th>";
                                        echo "<th>Age</th>";
                                        
                                        
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['ID'] . "</td>";
                                        echo "<td>" . $row['UserName'] . "</td>";
                                        echo "<td>" . $row['UserAge'] . "</td>";
                                    
                                        
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo "<p class='lead'><em>No records were found.</em></p>";
                        }
                    } else{
                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
                    }
	}
?>
