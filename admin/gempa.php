<?php 
$title = 'Data Gempa'; 
include '../include/header.php';
?>

<?php
$xcrud->table('gempa');
echo $xcrud->render();
?>

<?php  
include '../include/footer.php';
?>