<?php 
require 'page-header.php';
require 'database.php';
$username=null;
if ( !empty($_GET['username'])) {
	$username = $_REQUEST['username'];
}
if ( null==$username  ) {
	header("Location: user-control.php");
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	// keep track post values
	if ($_POST['type']=='admin') $type =0;
	else if ($_POST['type']=='customer')$type=1;
	else $type=2;
	// update data
	$conn = Database::connect();
	$sql = "UPDATE user SET type= $type WHERE username='$username'";
	var_dump($sql);
	$conn->query($sql);
	header("Location: user-control.php");
} else {
	$conn = Database::connect();
   	$sql = "SELECT * FROM user WHERE username='$username' ";
	$results = mysqli_query($conn, $sql);
	if ($results->num_rows > 0) {
		$data = $results->fetch_array();
	}
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
	<!-- Left Panel -->
    <?php include 'page-panel.php'; ?>
    <!-- Right Panel -->
    <!-- Scripts -->
   
	<div class="container">
		<div class="span10 offset1">
			<div class="row">
    			<h3>THÔNG TIN CHI TIẾT</h3>
    		</div>
			<form method="POST">
				  <div class="form-group">
				    <label for="exampleInputEmail1">Tên</label>
				    <input type="text" disabled="disabled" class="form-control" id="exampleInputEmail1" name="name" value="<?php echo $data['name'];?>">
				  </div>
				  <div class="form-group">
				    <label for="exampleInputEmail1">Giới tính</label>
				    <input type="text" disabled="disabled" class="form-control" id="exampleInputEmail1"  name="gender"  value="<?php echo $data['gender'];?>">
				  </div>
				  <div class="form-group">
				    <label for="exampleInputEmail1">Ngày sinh</label>
				    <input type="text" disabled="disabled" class="form-control" id="exampleInputEmail1"  name="DOB"  value="<?php echo $data['DOB'];?>">
				  </div>
				  <div class="form-group">
				    <label for="exampleInputEmail1">Địa chỉ</label>
				    <input type="text" disabled="disabled" class="form-control" id="exampleInputEmail1"  name="address"  value="<?php echo $data['address'];?>">
				  </div>
				  <div class="form-group">
				    <label for="exampleInputEmail1">Email</label>
				    <input type="email" disabled="disabled" class="form-control" id="exampleInputEmail1"  name="email"  value="<?php echo $data['mail'];?>">
				  </div>
				  <div class="form-group">
				    <label for="exampleInputEmail1">Số dư tài khoản</label>
				    <input type="text" disabled="disabled" class="form-control" id="exampleInputEmail1"  name="money"  value="<?php echo $data['money'];?>">
				  </div>
				  <!--<div>
				  	<label>Giới tính</label>
				  	<select  class="btn btn-default" name="gender">
		        		<option value="other" <?php if ($data['gender']=='other') echo "selected"; ?>> other </option>
		        		<option value="male" <?php if ($data['gender']=='male') echo "selected"; ?>> male </option>
		        		<option value="female" <?php if ($data['gender']=='female') echo "selected"; ?>> female </option>
		          	</select>
				  </div>-->
				  <div class="form-group">
				    <label for="exampleInputEmail1">Điện thoại</label>
				    <input type="text" disabled="disabled" class="form-control" id="exampleInputEmail1"  name="phone"  value="<?php echo $data['phone'];?>">
				  </div>
				  <div class="form-group">
				    <label for="exampleInputEmail1">Website</label>
				    <input type="text" disabled="disabled" class="form-control" id="exampleInputEmail1"  name="web"  value="<?php echo $data['website'];?>">
				  </div>
				  <div class="form-group">
				    <label for="exampleInputEmail1">Loại tài khoản</label>
				    <select  class="btn btn-default" name="type">
		        		<option value="admin" <?php if ($data['type']==0) echo "selected"; ?>> Admin </option>
		        		<option value="company" <?php if ($data['type']=='1') echo "selected"; ?>> Company </option>
		        		<option value="customer" <?php if ($data['type']=='2') echo "selected"; ?>> Customer </option>
		          	</select>
				  </div>
				  <div>
					  <button type="submit" class="btn btn-primary"> Cập nhập  </button>
					  <a class="btn" href="user-control.php">Trở lại </a>
				  </div>
			</form>
		</div>
	</div>
	 <script src="assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="assets/js/lib/chosen/chosen.jquery.min.js"></script>

    <script>
        jQuery(document).ready(function() {
            jQuery(".standardSelect").chosen({
                disable_search_threshold: 10,
                no_results_text: "Oops, nothing found!",
                width: "100%"
            });
        });
    </script>
	
</body>
</html>