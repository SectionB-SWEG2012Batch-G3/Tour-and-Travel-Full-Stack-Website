<?php
include_once '../transport/partials/DBConfig.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include_once '../transport/partials/fome_data.php';
    #validating carname
    filter_var($carName, FILTER_SANITIZE_SPECIAL_CHARS);
    if (empty($carName)) {
        $carNameErr[] = 'Please select tourguide name';
        $errors = true;
    }
    $isExist = false;
    foreach ($cars as $car) {
        if (strtolower($car['modelName']) == strtolower($carName)) {
            $pricePerH = $car['price'];
            $isExist = true;
        }
    }

    if (!$isExist) {
        $carNameErr[] = 'The car model doesn\'t  exist';
        $errors = true;
    }
    if (strlen($carName) > 30) {
        $carNameErr[] = 'The car model name  is too long';
        $errors = true;
    }

    include_once 'partials/validation_calc.php';

    // echo '<br/>' . 'Year ' . date('Y') . '<br/>';
    // echo 'month ' . date('m') . '<br/>';
    // echo 'Day of the month ' . date('d') . '<br/>';
    // echo 'Day of the week ' . date('l') . '<br/>';
    // echo 'hour(24) ' . date('H') . '<br/>';
    // echo 'hour(12) ' . date('ha') . '<br/>';
    // echo 'minute ' . date('i') . '<br/>';
    // echo 'seconds ' . date('s') . '<br/>';
    // echo '<br/>' . $name . '<br/>' . $place . '<br/>' . $tele . '<br/>' . $email . '<br/>' . $carName . '<br/>' . $pricePerH . '<br/>' . $price . '<br/>' . $cardNum . '<br/>' . date('Y-m-d H:i:s', $stDate) . '<br/>' . date('Y-m-d H:i:s', $enDate) . '<br/>';

    // echo "errors<br/>";
    // // var_dump($errors);
    // echo '<br/>';
    // var_dump($nameErr);
    // echo '<br/>';
    // var_dump($placeErr) . '<br/>';
    // echo '<br/>';
    // var_dump($teleErr) . '<br/>';
    // echo '<br/>';
    // var_dump($emailErr) . '<br/>';
    // echo '<br/>';
    // var_dump($carNameErr) . '<br/>';
    // echo '<br/>';
    // var_dump($perHourErr) . '<br/>';
    // echo '<br/>';
    // var_dump($stDateErr) . '<br/>';
    // echo '<br/>';
    // var_dump($priceErr) . '<br/>' . var_dump($cardNumErr) . '<br/>';



    if (!$errors) {
        try {
            $stmt = $pdo->prepare("INSERT INTO assigned_tourguide(traveller, place, tele, email, start_date, end_date, guide_name, price_per_hour, price, credit_card_num) VALUES (:traveller, :place, :tele, :email, :start_date, :end_date, :guide_name, :price_per_hour ,:price, :credit_card_num)");
            $stmt->execute([
                ':traveller' => $name,
                ':place' => $place,
                ':tele' => $tele,
                ':email' => $email,
                ':start_date' => date('Y-m-d H:i:s', $stDate),
                ':end_date' => date('Y-m-d H:i:s', $enDate),
                ':guide_name' => $carName,
                ':price_per_hour' => $pricePerH,
                ':price' => $price,
                ':credit_card_num' => $cardNum
            ]);
            header("Location: tripForm.php?success=true");
        } catch (PDOException $e) {
            echo "PDO exception occurred " . $e->getMessage();
        }
    }
}

// include_once 'saveAssignedTourGuides.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>4HF Tour and Travel|Create Trip Form</title>
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../fontawesome-free-5.15.4-web/css/all.css">
    <script defer src="../tourguide/js/createTrip.js"></script>
    <script defer src="../tourguide/js/tripDataValidation.js"></script>
    <link rel="stylesheet" href="css/tripCSS.css">
</head>
<style>
    body {
        background-position: bottom;
        background-size: 80%;
    }

    .trip-form-container {
        display: grid;
        grid-template-columns: auto;
    }

    .trip-form-container fieldset {
        width: auto;
        background-color: rgba(0, 0, 0, 0.5);
    }

    .trip-form-container label {
        width: 100%;
        margin: 5px;
    }

    .trip-form-container input:focus {
        border: 1px solid blue;
        line-height: 25px;
        transform: scaleX(1.2);
    }

    #reset,
    #submit-btn {
        display: inline;
        margin-inline: 10px;
        transform: scaleX(1.4);
    }

    .alert-primary {
        background-color: #007e33;
        color: aliceblue;
        font-size: 1.5rem;
        margin: 5px 3px;
        padding: 3px;
        text-align: center;
        border-radius: 5px;
    }

    /* style="background-image: url('bahirdar.jpg');" */
</style>

<?php include_once 'partials/form1.php' ?>
<div class="input-container 
                    <?php
                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        echo $carNameErr ? 'error' : 'success';
                    }
                    ?>">
    <label for="guides">Model of Car</label><br>
    <select name="guides" id="guides">
        <?php if (!empty($cars)) : ?>
            <?php foreach ($cars as $i => $car) : ?>
                <option value="
                                <?php
                                echo $car['modelName']
                                ?>" <?php
                                    if ($nameof === $car['modelName']) {
                                        echo 'selected';
                                    } else {
                                        echo  $carName == $car['modelName'] ? 'selected' : '';
                                    }
                                    ?>>
                    <?php echo  $car['modelName']; ?>
                </option>
            <?php endforeach ?>
        <?php endif ?>
    </select>
    <i class="fas fa-check-circle"></i>
    <i class="fas fa-exclamation-circle"></i>
    <small><?php echo $carNameErr[0] ?? ''; ?></small>
</div>
<?php include_once 'partials/form2.php' ?>

<script>
    function setPrice() {
        <?php foreach ($cars as $i => $car) : ?>
            if (guides.value.trim() === "<?php echo $car['modelName'] ?>"
                .trim()) {
                perhour.value = <?php echo $car['price'] ?> + 'Birr per hour';
                selectedGuidePrice = <?php echo $car['price'] ?>;
                console.log('here ', perhour.value, selectedGuidePrice);
                totalPrice();
            }
        <?php endforeach ?>
    }
</script>
<?php include_once '../transport/partials/totalprice.php' ?>
<?php include_once '../transport/partials/DOM.php' ?>

</body>

</html>