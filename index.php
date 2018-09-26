<?php 	 
include "operator/xcrud.php";
require 'include/database.php';
// query setting
$setting = mysqli_fetch_assoc(mysqli_query($conn,'SELECT * FROM setting LIMIT 1'));
$xcrud = Xcrud::get_instance();
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo $setting['nama_website']; ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="icon" type="image/png" href="../logo.png">
	<link rel="stylesheet" href="assets/css/yeti-bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/font-awesome.css">
	<script type="text/javascript" src="assets/js/jquery.min.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap.js"></script>
	<style>
		/* Remove the jumbotron's default bottom margin */ 
     .navbar {
      margin-bottom: 0;
    }
	</style>
</head>
<body>
	<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#"><?php echo $setting['nama_website']; ?></a>
    </div>
   <ul class="nav navbar-nav navbar-right">
      <li><a href="admin/"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </ul>
  </div>
</nav>
	<div class="jumbotron text-center">
		<h1><?php echo $setting['nama_website']; ?></h1>
	</div>
	
	<div class="container">
		<?php
		$xcrud->table('gempa');
		$xcrud->limit('40');
		$xcrud->unset_add();
	    $xcrud->unset_edit();
	    $xcrud->unset_remove();
	    $xcrud->unset_view();
	    $xcrud->unset_csv();
	    $xcrud->unset_limitlist();
	    // $xcrud->unset_numbers();
	    // $xcrud->unset_pagination();
	    $xcrud->unset_print();
	    $xcrud->unset_search();
	    $xcrud->unset_title();
	    $xcrud->unset_sortable();
		echo $xcrud->render();
		?>
	</div>
</body>
</html>
