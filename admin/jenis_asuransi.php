<?php 
$title = 'Data Jenis Asuransi'; 
include '../include/header.php';
?>

<?php
$xcrud->table('jenis_asuransi');
$xcrud->unset_remove();
echo $xcrud->render();
?>

<?php  
include '../include/footer.php';
?>