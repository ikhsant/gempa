<?php 
$title = 'Prediksi Gempa'; 
include '../include/header.php';
?>

<div class="alert alert-info">
	<div class="row">
		<div class="col-md-2">
			<img src="../uploads/images/rumus.jpg" height="150px">
		</div>
		<div class="col-md-2">
			<img src="../uploads/images/rumus2.png" height="150px">
		</div>
		<div class="col-md-6">
			<p><b>Prediksi Gempa dengan distribusi Exponensial</b></p>
			<p>Fungsi eksponensial adalah salah satu fungsi yang paling penting dalam matematika. Biasanya, fungsi ini ditulis dengan notasi exp(x) atau ex, di mana e adalah basis logaritma natural yang kira-kira sama dengan 2.71828183.</p>
		</div>
		
	</div>
	<!-- <p><b>Rumus:</b></p> -->
</div>

<div class="row">
<div class="col-lg-3 col-md-6">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <div class="row">
                <div class="col-xs-3">
                    <i class="fa fa-calendar fa-5x"></i>
                </div>
                <div class="col-xs-9 text-right">
                    <span style="font-size: 20px"><b>
                        <?php 
		$query = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM gempa ORDER BY id_gempa"));
		$hasil = date('d F Y', strtotime($query['waktu'])) ;
		echo $hasil;

		 ?>
                          </b>  
                        </span>
                    <div>Gempa Terakhir</div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-lg-3 col-md-6">
    <div class="panel panel-success">
        <div class="panel-heading">
            <div class="row">
                <div class="col-xs-3">
                    <i class="fa fa-magic fa-5x"></i>
                </div>
                <div class="col-xs-9 text-right">
                    <span style="font-size: 20px"><b>
                        <?php 
		$query = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM gempa ORDER BY id_gempa"));
		$waktu = date('d F Y', strtotime($query['waktu']. '+ 2 days')) ;
		echo $waktu;

		 ?>
                          </b>  
                        </span>
                    <div>Prediksi Gempa</div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<?php  
include '../include/footer.php';
?>