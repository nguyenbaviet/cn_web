<?php
require 'page-header.php';
require 'database.php';
$username = '';
if ( !empty($_GET['username'])) {
	$username = $_REQUEST['username'];
}
if ( !empty($_POST)) {
	// keep track post values
	$username = $_POST['username'];
	// delete data
	$conn = Database::connect();
	$sql = "DELETE FROM user WHERE username='$username'";
	$conn->query($sql);
	header("Location: user-control.php");
} 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">
		<div class="span10 offset1">
			<div class="row">
    			<h3>Delete an account</h3>
    		</div>
    		
			<form class="form-horizontal" action="user-delete.php" method="post">
			  <input type="hidden" name="username" value="<?php echo $username;?>"/>
			  <p class="alert alert-error">Are you sure to delete <?php echo $username;?>?</p>
			  <div class="form-actions">
				  <button type="submit" class="btn btn-danger">Yes</button>
				  <a class="btn" href="user-control.php">No</a>
				</div>
			</form>
		</div>
    </div> <!-- /container -->
  </body>
</html>