<?php 
$title = 'Data Asuransi'; 
include '../include/header.php';
?>

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

<script type="text/javascript" src="../assets/js/Chart.min.js"></script>

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
$xcrud->table('asuransi');
$xcrud->relation('gempa','gempa','id_gempa',array('wilayah','keterangan'),'','id_gempa');
$xcrud->relation('jenis_asuransi','jenis_asuransi','id_jenis_asuransi','nama_jenis');
$xcrud->sum('jumlah');
echo $xcrud->render();
?>

<?php  
include '../include/footer.php';
?>