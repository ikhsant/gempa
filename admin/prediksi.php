<?php 
$title = 'Prediksi Gempa'; 
include '../include/header.php';
?>

<div class="alert alert-info">
	<p>Prediksi Gempa dengan distribusi Exponensial</p>
	<!-- <p><b>Rumus:</b></p> -->
</div>

<div class="panel panel-default">
	<div class="panel-heading">
		Distribusi Exponensial
	</div>
	<div class="panel-body">
		<?php 
		$n = 1430.95614;
		$x = 1719;
		$b = 0.78195;
		$e = 2.71828;
		$t = 430;

		$hasil = ($b/$n) * (($t / $n)^($b-1)) * ($e ^ -(($t/n)^$b) ) ;
		echo $hasil;

		 ?>
	</div>
</div>

<?php  
include '../include/footer.php';
?>