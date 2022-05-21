<?php

$nameof = '';
if (isset($_GET['name'])) {
    $nameof = $_GET['name'];
}
$stmt = $pdo->prepare("SELECT * FROM transport");
$stmt->execute();
$cars = $stmt->fetchAll();

$name = '';
$place = '';
$tele = '';
$email = '';
$carName = '';
$stDate = '';
$enDate = '';
$pricePerH = '';
$price = '';
$cardNum = '';

$nameErr = [];
$placeErr = [];
$teleErr = [];
$emailErr = [];
$carNameErr = [];
$stDateErr = [];
$enDateErr = [];
$perHourErr = [];
$priceErr = [];
$cardNumErr = [];
$errors = false;
