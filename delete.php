<?php
require_once './config/link_database.php';

$id = $_GET['id'];
$requet = $pdo->prepare("DELETE FROM employes where id=:id");
$requet ->execute(["id"=>$id]);
header("location:show.php");

