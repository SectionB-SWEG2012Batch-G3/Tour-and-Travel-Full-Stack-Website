<?php
    include_once '../dbconfig/connection.php';
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = '';
        $place = '';
        $tele = '';
        $email = '';
        $guideName = '';
        $stDate = '';
        $enDate = '';
        $price = '';
        $cardNum = '';
        $nameErr = '';
        $placeErr = '';
        $teleErr = '';
        $emailErr = '';
        $guideNameErr = '';
        $stDateErr = '';
        $enDateErr = '';
        $priceErr = '';
        $cardNumErr = '';
        $errors = false;
        if (!$errors) {
            $stmt = $pdo->prepare("INSERT INTO assigned_tourguide(traveller, place, tele, email, start_date, end_date, guide_name, price, credit_card_num) VALUES (:traveller, :place, :tele, :email, :start_date, :end_date, :guide_name, :price, :credit_card_num)");
            $stmt->execute([
                ':traveller' => $name,
                ':place' => $place,
                ':tele' => $tele,
                ':email' => $email,
                ':start_date' => $stDate,
                ':end_date' => $enDate,
                ':guide_name' => $guideName,
                ':price' => $price,
                ':credit_card_num' => $cardNum
            ]);
        }
    }
