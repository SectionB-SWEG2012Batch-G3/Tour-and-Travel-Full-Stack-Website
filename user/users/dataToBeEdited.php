<?php
if (isset($_GET['id']) && ($_SERVER['REQUEST_METHOD'] === 'GET')) {
    $id = $_GET['id'];
    $stmt = $pdo->prepare("SELECT * FROM assigned_tourguide WHERE id = :id ORDER BY start_date");
    $stmt->bindValue(':id', $id);
    $stmt->execute();
    $schedule = $stmt->fetch();
    // var_dump($schedule);
    if ($schedule) {
        $name = $schedule['traveller'];
        $place = $schedule['place'];
        $tele = $schedule['tele'];
        $email = $schedule['email'];
        $guideName = $schedule['guide_name'];
        $stDate = strtotime($schedule['start_date']);
        $enDate = strtotime($schedule['end_date']);
        $pricePerH = $schedule['price_per_hour'];
        $price = $schedule['price'];
        $cardNum = $schedule['credit_card_num'];
    }
}
