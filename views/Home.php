<?php

	require '../connect.php';
	require '../functions.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Crud Application</title>
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
<?php

        $errname="";
        $errage="";
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["name"])) {
                $errname = "Name is required";
            } else {
                $name = mysqli_real_escape_string($conn, $_POST["name"]);
                /*$err = validate_text_and_numbers($title);*/
            }

           if (empty($_POST["age"])) {
                $errage = "Age is required";
            } else {
                $age = mysqli_real_escape_string($conn, $_POST["age"]);
                /*$err = validate_text_and_numbers($title);*/
            }


            if($errname=="" and $errage==""){
                insertuser($name,$age);
            }
        }
?>
<!--Insert Form-->
<div class="row">
 
  <hr>
</div>
<div class="col-md-2"></div>
<div class="col-md-8">
<div class="panel panel-default">
  <div class="panel-body">
  <h2>Add New User</h2>
<form action="" method="POST">

  <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Name" name="name">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Age</label>
    <input type="number" class="form-control" id="exampleInputPassword1" placeholder="Age" name="age">
  </div>
  
  <button type="submit" class="btn btn-default" name="insert">Submit</button>
</form>
</div>
</div>
</div>
<div class="col-md-2"></div>
<!--View data-->
<div class="row">
 
  <hr>
</div>
<div class="col-md-2"></div>
<div class="col-md-8">
<div class="panel panel-default">
  <div class="panel-body">
  <h2>View All users</h2>
<?php
                    // Include config file
                    require_once '../connect.php';
                    
                    viewusers ();
 
                    // Close connection
                    mysqli_close($conn);
                    ?>
</div>
</div>
</div>
<div class="col-md-2"></div>
</body>
</html>