<?php  
include '../include/header.php';
?>

<?php 
// notif pesan
if (!empty($_SESSION['pesan'])) { ?>
	<div class="alert alert-success">
		<i class="fa fa-check"></i> <?php echo $_SESSION['pesan']; ?>
	</div>
	<br>
	<?php 
	$_SESSION['pesan'] = '';
} 

// notif pesan ewrror
if (!empty($_SESSION['error'])) { ?>
	<div class="alert alert-danger">
		<i class="fa fa-check"></i> <?php echo $_SESSION['error']; ?>
	</div>
	<br>
	<?php 
	$_SESSION['error'] = '';
} 
?>

<?php 
if($_SESSION['akses_level'] == "admin"){
$gempa = mysqli_query($conn,"SELECT * FROM gempa ORDER BY id_gempa DESC");

?>

<script type="text/javascript" src="../assets/js/Chart.min.js"></script>

<div class="row">
<div class="col-lg-3 col-md-6">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <div class="row">
                <div class="col-xs-3">
                    <i class="fa fa-globe fa-5x"></i>
                </div>
                <div class="col-xs-9 text-right">
                    <span style="font-size: 40px"><?php echo mysqli_num_rows($gempa) ?></span>
                    <div>Gempa</div>
                </div>
            </div>
        </div>
        <a href="gempa.php">
            <div class="panel-footer">
                <span class="pull-left">View Details</span>
                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                <div class="clearfix"></div>
            </div>
        </a>
    </div>
</div>


<div class="col-lg-3 col-md-6">
    <div class="panel panel-success">
        <div class="panel-heading">
            <div class="row">
                <div class="col-xs-3">
                    <i class="fa fa-calendar fa-5x"></i>
                </div>
                <div class="col-xs-9 text-right">
                    <span style="font-size: 20px"><b>
                        <?php 
                        $row = mysqli_fetch_assoc($gempa);
                        $s = strtotime($row['waktu']);
                        echo date('d M Y', $s);;
                        ?>
                          </b>  
                        </span>
                    <div>Gempa Terakhir</div>
                </div>
            </div>
        </div>
        <a href="gempa.php">
            <div class="panel-footer">
                <span class="pull-left">View Details</span>
                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                <div class="clearfix"></div>
            </div>
        </a>
    </div>
</div>


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
        <a href="asuransi.php">
            <div class="panel-footer">
                <span class="pull-left">View Details</span>
                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                <div class="clearfix"></div>
            </div>
        </a>
    </div>
</div>
</div>

<div class="row">
<div class="col-md-6">

    <div class="panel panel-default">
        <div class="panel-heading">
            Gempa berdasarkan Tahun
        </div>
        <div class="panel-body">
            <canvas id="myChart" height="100px"></canvas>
        </div>
    </div>
</div>

<?php  
$thn2008 = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM gempa WHERE YEAR(waktu) = '2008' "));
$thn2009 = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM gempa WHERE YEAR(waktu) = '2009' "));
$thn2010 = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM gempa WHERE YEAR(waktu) = '2010' "));
$thn2011 = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM gempa WHERE YEAR(waktu) = '2011' "));
$thn2012 = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM gempa WHERE YEAR(waktu) = '2012' "));
$thn2013 = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM gempa WHERE YEAR(waktu) = '2013' "));
$thn2014 = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM gempa WHERE YEAR(waktu) = '2014' "));
$thn2015 = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM gempa WHERE YEAR(waktu) = '2015' "));
$thn2016 = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM gempa WHERE YEAR(waktu) = '2016' "));
$thn2017 = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM gempa WHERE YEAR(waktu) = '2017' "));
?>

<script>
    var ctx = document.getElementById("myChart").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ["2008", "2009", "2010","2011","2012","2013","2014","2015","2016","2017"],
            datasets: [{
                label: '# Gempa',
                data: [<?php echo $thn2008 ?>, <?php echo $thn2009 ?>, <?php echo $thn2010 ?>, <?php echo $thn2011 ?>,<?php echo $thn2012 ?>, <?php echo $thn2013 ?>, <?php echo $thn2014 ?>, <?php echo $thn2015 ?>, <?php echo $thn2016 ?>, <?php echo $thn2017 ?>],
                backgroundColor: [
                'rgba(0, 50, 0)',
                'rgba(0, 50, 0)',
                'rgba(0, 50, 0)',
                'rgba(0, 50, 0)',
                'rgba(0, 50, 0)',
                'rgba(0, 50, 0)',
                'rgba(0, 50, 0)',
                'rgba(0, 50, 0)',
                'rgba(0, 50, 0)',
                'rgba(0, 50, 0)'

                ]
            }]
        },

    });
</script>
</div>

<hr>
<div class="row">
    <div class="text-center">
    <h1>Asuransi</h1>
        
    </div>
    <hr>
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
            <canvas id="myChart2" height="200px"></canvas>
        </div>
    </div>
</div>

<div class="col-md-6">

    <div class="panel panel-default">
        <div class="panel-heading">
            Grafik Pie
        </div>
        <div class="panel-body">
            <canvas id="myChart3" height="200px"></canvas>
        </div>
    </div>
</div>

</div>

<script>
    var ctx = document.getElementById("myChart2").getContext('2d');
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
    var ctx = document.getElementById("myChart3").getContext('2d');
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

<?php  } ?>



<?php  
include '../include/footer.php';
?>