<?php 
require 'page-header.php';
require 'database.php';
$id=null;
if ( !empty($_GET['id'])) {
	$id = $_REQUEST['id'];
}
if ( null==$id || !(is_numeric($id)) ) {
	header("Location: category-read.php");
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	// keep track post values
	$name = $_POST['name'];
	// update data
	$conn = Database::connect();
	$sql = "UPDATE category SET name='$name'WHERE id=$id";
	var_dump($sql);
	$conn->query($sql);
	header("Location: category-read.php");
} else {
	$conn = Database::connect();
   	$sql = "SELECT * FROM category WHERE id=$id ";
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
    			<h3>Chỉnh sửa danh mục</h3>
    		</div>
			<form method="POST">
				  <div class="form-group">
				    <label for="exampleInputEmail1">Tên danh mục</label>
				    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên danh mục" name="name" value="<?php echo $data['Name'];?>">
				  </div>
				  <div>
					  <button type="submit" class="btn btn-primary"> Cập nhập danh mục </button>
					  <a class="btn" href="category-read.php">Trở lại </a>
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