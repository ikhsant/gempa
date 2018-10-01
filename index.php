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

		<div class="row">
<div class="col-lg-3 col-md-6">
    <div class="panel panel-info">
        <div class="panel-heading">
            <div class="row">
                <div class="col-xs-3">
                    <i class="fa fa-money fa-5x"></i>
                </div>
                <div class="col-xs-9 text-right">
                    <span style="font-size: 20px"><b>
                        <?php 
                        $asuransi = mysqli_fetch_assoc(mysqli_query($conn,"
                            SELECT asuransi.*, SUM(jenis_asuransi.biaya) as biaya
                            FROM asuransi
                            JOIN jenis_asuransi
                            ON asuransi.jenis_asuransi = jenis_asuransi.id_jenis_asuransi
                            "));
                        echo 'Rp. '.$asuransi['biaya'];
                        ?>
                          </b>  
                        </span>
                    <div>Total Asuransi</div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-lg-3 col-md-6">
    <div class="panel panel-danger">
        <div class="panel-heading">
            <div class="row">
                <div class="col-xs-3">
                    <i class="fa fa-users fa-5x"></i>
                </div>
                <div class="col-xs-9 text-right">
                    <span style="font-size: 20px"><b>
                        <?php 
                        $meninggal = mysqli_fetch_assoc(mysqli_query($conn,"
                            SELECT asuransi.*, SUM(asuransi.jumlah) as meninggal
                            FROM asuransi
                            JOIN jenis_asuransi
                            ON asuransi.jenis_asuransi = jenis_asuransi.id_jenis_asuransi
                            WHERE jenis_asuransi = '1'
                            "));
                        echo $meninggal['meninggal'].' Jiwa';
                        ?>
                          </b>  
                        </span>
                    <div>Meniggal</div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-lg-3 col-md-6">
    <div class="panel panel-warning">
        <div class="panel-heading">
            <div class="row">
                <div class="col-xs-3">
                    <i class="fa fa-users fa-5x"></i>
                </div>
                <div class="col-xs-9 text-right">
                    <span style="font-size: 20px"><b>
                        <?php 
                        $luka = mysqli_fetch_assoc(mysqli_query($conn,"
                            SELECT asuransi.*, SUM(asuransi.jumlah) as luka
                            FROM asuransi
                            JOIN jenis_asuransi
                            ON asuransi.jenis_asuransi = jenis_asuransi.id_jenis_asuransi
                            WHERE jenis_asuransi = '2'
                            "));
                        echo $luka['luka'].' Orang';
                        ?>
                          </b>  
                        </span>
                    <div>Luka-Luka</div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-lg-3 col-md-6">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <div class="row">
                <div class="col-xs-3">
                    <i class="fa fa-home fa-5x"></i>
                </div>
                <div class="col-xs-9 text-right">
                    <span style="font-size: 20px"><b>
                        <?php 
                        $hancur = mysqli_fetch_assoc(mysqli_query($conn,"
                            SELECT asuransi.*, SUM(asuransi.jumlah) as hancur
                            FROM asuransi
                            JOIN jenis_asuransi
                            ON asuransi.jenis_asuransi = jenis_asuransi.id_jenis_asuransi
                            WHERE jenis_asuransi = '3'
                            "));
                        echo $hancur['hancur'].' Rumah';
                        ?>
                          </b>  
                        </span>
                    <div>Hancur</div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-md-6">

    <div class="panel panel-default">
        <div class="panel-heading">
            Grafik Chart
        </div>
        <div class="panel-body">
            <canvas id="myChart" height="200px"></canvas>
        </div>
    </div>
</div>

<div class="col-md-6">

    <div class="panel panel-default">
        <div class="panel-heading">
            Grafik Pie
        </div>
        <div class="panel-body">
            <canvas id="myChart2" height="200px"></canvas>
        </div>
    </div>
</div>

</div>

<script type="text/javascript" src="assets/js/Chart.min.js"></script>

<script>
    var ctx = document.getElementById("myChart").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ["Rumah Hancur", "Meniggal", "Luka-Luka"],
            datasets: [{
                label: '# Akibat Gempa',
                data: [<?php echo $hancur['hancur'] ?>,<?php echo $meninggal['meninggal'] ?>,<?php echo $luka['luka'] ?>],
                backgroundColor: [
                'rgb(120, 202, 211)',
                'rgb(255, 102, 204)',
                'rgb(0, 255, 153)'
                ]
            }]
        },

    });
</script>

<script>
    var ctx = document.getElementById("myChart2").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ["Rumah Hancur", "Meniggal", "Luka-Luka"],
            datasets: [{
                label: '# Akibat Gempa',
                data: [<?php echo $hancur['hancur'] ?>,<?php echo $meninggal['meninggal'] ?>,<?php echo $luka['luka'] ?>],
                backgroundColor: [
                'rgb(120, 202, 211)',
                'rgb(255, 102, 204)',
                'rgb(0, 255, 153)'
                ]
            }]
        },

    });
</script>
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
