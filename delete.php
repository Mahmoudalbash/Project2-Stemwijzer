<?php
include 'config.php';

$stemwijzer = new Stemwijzer();

$id = $_GET['id'];
$stemwijzer->deletePartij($id);

header("Location: crud.php");
exit();
?>



