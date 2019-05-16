<?php 
include 'page-header.php';
require 'database.php';

if ( !empty($_POST)) {
	// keep track post values
	$name = $_POST['name'];
	$lastname = $_POST['lastname'];
	$email = $_POST['email'];
	$password = md5($_POST['password']);
	$gender = $_POST['gender'];
	// insert data
	
	$sql = "INSERT INTO users(name,lastname,email,password,gender) values('$name', '$lastname' ,'$email', '$password', '$gender')";
	$conn->query($sql);
	header("Location:user-control.php");
}
?>
<body>
    <!-- Left Panel -->
    <?php include 'page-panel.php'; ?>
    <!-- Right Panel -->
   <div class="container">
		<div class="span10 offset1">
			<div class="row">
    			<h3>Tạo danh mục</h3>
    		</div>
			<form method="POST" action="category-create.php">
				  <div class="form-group">
				    <label for="exampleInputEmail1">Tên</label>
				    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên " name="name" value=" <?php echo !empty($name)?$name:'';?>">
				  </div>
				  <div class="form-group">
				    <label for="exampleInputEmail1">Họ</label>
				    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nhập họ " name="lastname" value=" <?php echo !empty($lastname)?$lastname:'';?>">
				  </div>
				  <div class="form-group">
				    <label for="exampleInputEmail1">Họ</label>
				    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nhập họ " name="lastname" value=" <?php echo !empty($lastname)?$lastname:'';?>">
				  </div>
				  <div class="form-group">
				    <label for="exampleInputEmail1">Mật khẩu</label>
				    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nhập mật khẩu " name="password" value=" <?php echo !empty($password)?$password:'';?>">
				  </div>
				  <div class="form-group">
				    <label for="exampleInputEmail1">Email</label>
				    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Nhập Email " name="email" value=" <?php echo !empty($email)?$email:'';?>">
				  </div>
				  <div>
				  	<select  class="btn btn-default" name="gender">
		        		<option >-Lựa chọn-</option>
		        		<option value="male"> Nam </option>
		        		<option value="female"> Nữ </option>
		          	</select>
				  </div>
				  
				  <div>
					  <button type="submit" class="btn btn-primary"> Tạo danh mục </button>
					  <a class="btn" href="index.php">Trở lại bảng tin</a>
				  </div>
			</form>
		</div>
	</div>

    <!-- Scripts -->
   <?php include 'page-scripts.php'; ?>
</body>
</html>