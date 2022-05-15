<?php
    include_once '../dbconfig/connection.php';
    include_once 'partials/test_input.php';
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $stmt = $pdo->prepare("SELECT title FROM places_to_visit");
        $stmt->execute();
        $places_to_visit = $stmt->fetchAll();
        $stmt = $pdo->prepare("SELECT name FROM tourguide");
        $stmt->execute();
        $guides = $stmt->fetchAll();
        $name = test_input($_POST['Fname'] ?? '');
        $place = test_input($_POST['place'] ?? '');
        $tele = test_input($_POST['mobile'] ?? '');
        $email = test_input($_POST['E-mail'] ?? '');
        $guideName = test_input($_POST['guides'] ?? '');
        $stDate = test_input($_POST['Date-st'] ?? '');
        $enDate = test_input($_POST['Date-en'] ??'');
        $pricePerH = test_input($_POST['perHour'] ?? '');
        $price = test_input($_POST['price'] ?? '');
        $cardNum = test_input($_POST['credit-card'] ?? '');
        $nameErr = '';
        $placeErr = '';
        $teleErr = '';
        $emailErr = '';
        $guideNameErr = '';
        $stDateErr = '';
        $enDateErr = '';
        $perHourErr = '';
        $priceErr = '';
        $cardNumErr = '';
        $errors = false;
        #validating name of traveller
        filter_var($name, FILTER_SANITIZE_SPECIAL_CHARS);
        filter_var($name, FILTER_SANITIZE_STRING);
        if (empty($name)) {
            $nameErr[] = 'Name field can\'t be empty';
        }
        if (!filter_var($name, FILTER_VALIDATE_EMAIL)) {
            $nameErr[] = 'Email is  not valid';
        }
        # validarting place
        filter_var($place, FILTER_SANITIZE_SPECIAL_CHARS);
        filter_var($place, FILTER_SANITIZE_STRING);
        if (!in_array($place, $places_to_visit)) {
            $placeErr[] = 'Place name doesn\'t exist';
        }
        if (empty($place)) {
            $placeErr[] = 'Name field can\'t be empty';
        }

        if (strlen($place) > 30) {
            $placeErr[] = 'Place name is too long';
        }

        # validating phone number
        if (empty($tele)) {
            $teleErr[] = 'Name field can\'t be empty';
        }

        if (!preg_match('/^(\+251|0)([\s-]?9\d{1}|(9\d{1}))[\s-]?\d{3}[\s-]?\d{4}$/', $tele)) {
            $teleErr[] = 'phone number doesn\'t match the pattern';
        }

        #validating guidename
        filter_var($guideName, FILTER_SANITIZE_SPECIAL_CHARS);
        if (empty($guideName)) {
            $guideNameErr[] = 'Please select tourguide name';
        }
    
        if (!in_array($guideName, $guides)) {
            $guideNameErr[] = 'The tour guide is doesn\'t  exist';
        }
        if (strlen($guideName) > 30) {
            $guideNameErr[] = 'Tourguide name  is too long';
        }

        #validating email
        filter_id($email, FILTER_SANITIZE_EMAIL);
        if (empty($email)) {
            $emailErr[] = 'Email is requied';
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr[] = 'Email is not valid';
        }
        if (strlen($email) > 30) {
            $emailErr[] = 'Email is too long';
        }
        #validating price
        filter_id($pricePerH, FILTER_SANITIZE_NUMBER_FLOAT);
        if (empty($pricePerH)) {
            $perHourErr[] = 'price per hour empty please select tourguide';
        }
        filter_id($price, FILTER_SANITIZE_NUMBER_FLOAT);
        filter_id($cardNum, FILTER_SANITIZE_NUMBER_INT);
        if (empty($cardNum)) {
            $cardNumErr[] = 'Please inset your creadit card number';
        }
        if ($cardNum <= 100000) {
            $cardNumErr[] = 'Credit card number should have at least 6 chars';
        }

        echo '<br/>'.$name.'<br/>'.$place.'<br/>'.$tele.'<br/>'.$email.'<br/>'.$guideName.'<br/>'.$pricePerH.'<br/>'.$price.'<br/>'.$cardNum.'<br/>'.$tele.'<br/>';

        // if (!$errors) {
        //     $stmt = $pdo->prepare("INSERT INTO assigned_tourguide(traveller, place, tele, email, start_date, end_date, guide_name, price, credit_card_num) VALUES (:traveller, :place, :tele, :email, :start_date, :end_date, :guide_name, :price, :credit_card_num)");
        //     $stmt->execute([
        //         ':traveller' => $name,
        //         ':place' => $place,
        //         ':tele' => $tele,
        //         ':email' => $email,
        //         ':start_date' => $stDate,
        //         ':end_date' => $enDate,
        //         ':guide_name' => $guideName,
        //         ':price' => $price,
        //         ':credit_card_num' => $cardNum
        //     ]);
        // }
    }
