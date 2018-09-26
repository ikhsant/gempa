<?php 
$title = 'Data Jenis Asuransi'; 
include '../include/header.php';
?>

<?php
$xcrud->table('jenis_asuransi');
echo $xcrud->render();
?>

<?php  
include '../include/footer.php';
?>