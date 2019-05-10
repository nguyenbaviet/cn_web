<?php 
include 'page-header.php';
require 'database.php';

if ( !empty($_POST)) {
	// keep track post values
	$name = $_POST['name'];
	// insert data
	$conn = Database::connect();
	$sql = "INSERT INTO category (name) values('$name')";
	$conn->query($sql);
	header("Location:category-read.php");
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
				    <label for="exampleInputEmail1">Tên ngành nghề</label>
				    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên danh mục" name="name" value=" <?php echo !empty($name)?$name:'';?>">
				  </div>
				  <div>
					  <button type="submit" class="btn btn-primary"> Tạo danh mục </button>
					  <a class="btn" href="index.php">Trở lại bảng tin</a>
				  </div>
			</form>
		</div>
	</div>

    <!-- Scripts -->
   

</body>
</html>