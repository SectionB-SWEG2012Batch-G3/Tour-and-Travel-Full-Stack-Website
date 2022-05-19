<?php
$id = $_GET['id'];
$stant = $pdo->prepare("SELECT regionName FROM destination WHERE id = :id");
$stant->execute([':id' => $id]);
$region_name = $stant->fetch();
