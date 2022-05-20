<?php
#validating email
filter_var($email, FILTER_SANITIZE_EMAIL);
if (empty($email)) {
    $emailErr[] = 'Email is requied';
    $errors = true;
}
if (!filter_var($email)) {
    $emailErr[] = 'Email is not valid';
    $errors = true;
}
if (strlen($email) > 30) {
    $emailErr[] = 'Email is too long';
    $errors = true;
}
#validating card number
filter_var($cardNum, FILTER_SANITIZE_NUMBER_INT);
if (empty($cardNum)) {
    $cardNumErr[] = 'Please inset your creadit card number';
    $errors = true;
}
if (!(filter_var($cardNum, FILTER_VALIDATE_INT))) {
    $cardNumErr[] = 'Credit card number must type of number';
}
if ($cardNum <= 100000) {
    $cardNumErr[] = 'Credit card number should have at least 6 chars';
    $errors = true;
}

#validating the dates
if ($stDate > $enDate) {
    $stDateErr[] = 'Start date must be earlier than the end date';
    $enDateErr[] = 'End date must be earlier than the end date';
}

if ($stDate < time()) {
    $stDateErr[] = 'This time has been passed';
}

if ($enDate < time()) {
    $enDateErr[] = 'This time has been passed';
}

//calculating the total price
if (empty($stDateErr) && empty($enDateErr) && empty($carNameErr)) {
    $totalDays = $enDate - $stDate;
    // echo '<br/>' . 'secs ' . $totalDays . '<br/>';
    $totalDays = (int)($totalDays / 86400) - 1;
    //  echo '<br/>' . 'days ' . $totalDays . '<br/>';
    $price = $totalDays * $pricePerH;
}
#fetching all tourguides schedules data from asigned_tourguide DB
$stmt = $pdo->prepare("SELECT * FROM assigned_tourguide");
$stmt->execute();
$schedules = $stmt->fetchAll();
$scheduleErr = '';
$startDate = date('Y-m-d H:i:s', $stDate);
$endDate = date('Y-m-d H:i:s', $enDate);

foreach ($schedules as $i => $schedule) {
    if ($carName == $schedule['guide_name']) {
        if (($startDate >= $schedule['start_date'] && $endDate <= $schedule['end_date']) ||
            ($startDate <= $schedule['start_date'] && $endDate >= $schedule['end_date']) ||
            ($startDate >= $schedule['start_date'] && $startDate <= $schedule['end_date']) ||
            ($endDate <= $schedule['end_date'] && $endDate >= $schedule['start_date'])
        ) {
            $scheduleErr = "$carName has a schedule between " . $schedule['start_date'] . " and " . $schedule['end_date'] . ", please selece another days.";
            $stDateErr[] = 'Scheduled Date please chenge it';
            $enDateErr[] = 'Scheduled Date please chenge it';
            $errors = true;
        }
    }
}
