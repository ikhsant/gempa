<?php 
$title = 'Data Gempa'; 
include '../include/header.php';
?>

<?php
$xcrud->table('gempa');
$xcrud->order_by('id_gempa');
echo $xcrud->render();
?>

<?php  
include '../include/footer.php';
?>