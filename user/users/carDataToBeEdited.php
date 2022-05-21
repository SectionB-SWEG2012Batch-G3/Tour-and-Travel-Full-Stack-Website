<?php
if (isset($_GET['id']) && ($_SERVER['REQUEST_METHOD'] === 'GET')) {
    $id = $_GET['id'];
    $stmt = $pdo->prepare("SELECT * FROM reserved_cars WHERE id = :id ORDER BY start_date");
    $stmt->bindValue(':id', $id);
    $stmt->execute();
    $schedule = $stmt->fetch();
    // var_dump($schedule);
    if ($schedule) {
        $name = $schedule['traveller_name'];
        $place = $schedule['place'];
        $tele = $schedule['phone'];
        $email = $schedule['email'];
        $carName = $schedule['car_model'];
        $stDate = strtotime($schedule['start_date']);
        $enDate = strtotime($schedule['end_date']);
        $pricePerH = $schedule['price'];
        $price = $schedule['total_price'];
        $cardNum = $schedule['card_num'];
    }
}
