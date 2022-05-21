<?php
$id = '';
$nameof = '';
if (isset($_GET['name'])) {
    $nameof = $_GET['name'];
}
$stmt = $pdo->prepare("SELECT * FROM tourguide");
$stmt->execute();
$tourguides = $stmt->fetchAll();
$name = '';
$place = '';
$tele = '';
$email = '';
$guideName = '';
$stDate = '';
$enDate = '';
$pricePerH = '';
$price = '';
$cardNum = '';

$startDate = '';
$endDate = '';

$nameErr = [];
$placeErr = [];
$teleErr = [];
$emailErr = [];
$guideNameErr = [];
$stDateErr = [];
$enDateErr = [];
$perHourErr = [];
$priceErr = [];
$cardNumErr = [];
$errors = false;
