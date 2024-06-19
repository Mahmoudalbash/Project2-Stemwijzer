<?php
include 'data.php';

$stemwijzer = new Stemwijzer($pdo);

if (!isset($_GET['id'])) {
    header("Location: read.php");
    exit();
}

$id = $_GET['id'];
$stemwijzer->delete($id);
header("Location: read.php");
exit();
?>


