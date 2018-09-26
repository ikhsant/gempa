<?php 
$title = 'Data Asuransi'; 
include '../include/header.php';
?>

<?php
$xcrud->table('asuransi');
$xcrud->relation('gempa','gempa','id_gempa','waktu','','id_gempa');
$xcrud->relation('jenis_asuransi','jenis_asuransi','id_jenis_asuransi','nama_jenis');
echo $xcrud->render();
?>

<?php  
include '../include/footer.php';
?>