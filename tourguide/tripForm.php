<?php
include_once '../dbconfig/connection.php';
include_once 'partials/test_input.php';

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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    #fetching places to visit from places_to_visit DB
    $stmt = $pdo->prepare("SELECT title FROM places_to_visit");
    $stmt->execute();
    $places_to_visit = $stmt->fetchAll();

    #fetching tourguide's data from tourguide DB
    $stmt = $pdo->prepare("SELECT * FROM tourguide");
    $stmt->execute();
    $guides = $stmt->fetchAll();
    #setting time zone
    date_default_timezone_set('Africa/Nairobi');

    #accepting data from the user form
    $name = test_input($_POST['Fname'] ?? '');
    $place = test_input($_POST['place'] ?? '');
    $tele = test_input($_POST['mobile'] ?? '');
    $email = test_input($_POST['E-mail'] ?? '');
    $guideName = test_input($_POST['guides'] ?? '');
    $stDate = strtotime(test_input($_POST['Date-st'] ?? ''));
    $enDate = strtotime(test_input($_POST['Date-en'] ?? ''));
    $pricePerH = test_input($_POST['perHour'] ?? '');
    $price = test_input($_POST['price'] ?? '');
    $cardNum = test_input($_POST['credit-card'] ?? '');

    #validating name of traveller
    filter_var($name, FILTER_SANITIZE_SPECIAL_CHARS);

    if (empty($name)) {
        $nameErr[] = 'Name field can\'t be empty';
        $errors = true;
    }
    # validarting place
    filter_var($place, FILTER_SANITIZE_SPECIAL_CHARS);

    $isexist = false;
    foreach ($places_to_visit as $tovisit) {
        if (strtolower($tovisit[0]) == strtolower($place)) {
            $isexist = true;
        }
    }

    if (!$isexist) {
        $placeErr[] = 'Place name doesn\'t exist';
        $errors = true;
    }

    if (empty($place)) {
        $placeErr[] = 'Name field can\'t be empty';
        $errors = true;
    }

    if (strlen($place) > 30) {
        $placeErr[] = 'Place name is too long';
        $errors = true;
    }

    # validating phone number
    if (empty($tele)) {
        $teleErr[] = 'Name field can\'t be empty';
        $errors = true;
    }

    if (!preg_match('/^(\+251|0)([\s-]?9\d{1}|(9\d{1}))[\s-]?\d{3}[\s-]?\d{4}$/', $tele)) {
        $teleErr[] = 'phone number doesn\'t match the pattern';
        $errors = true;
    }

    #validating guidename
    filter_var($guideName, FILTER_SANITIZE_SPECIAL_CHARS);
    if (empty($guideName)) {
        $guideNameErr[] = 'Please select tourguide name';
        $errors = true;
    }
    $isExist = false;
    foreach ($guides as $tourguide) {
        if (strtolower($tourguide['name']) == strtolower($guideName)) {
            $pricePerH = $tourguide['salaryPerHour'];
            $isExist = true;
        }
    }

    if (!$isExist) {
        $guideNameErr[] = 'The tour guide is doesn\'t  exist';
        $errors = true;
    }
    if (strlen($guideName) > 30) {
        $guideNameErr[] = 'Tourguide name  is too long';
        $errors = true;
    }

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
    if (empty($stDateErr) && empty($enDateErr) && empty($guideNameErr)) {
        $totalDays = $enDate - $stDate;
        echo '<br/>' . 'secs ' . $totalDays . '<br/>';
        $totalDays = (int)($totalDays / 86400);
        echo '<br/>' . 'days ' . $totalDays . '<br/>';
        $price = $totalDays * $pricePerH;
    }

    echo '<br/>' . 'Year ' . date('Y') . '<br/>';
    echo 'month ' . date('m') . '<br/>';
    echo 'Day of the month ' . date('d') . '<br/>';
    echo 'Day of the week ' . date('l') . '<br/>';
    echo 'hour(24) ' . date('H') . '<br/>';
    echo 'hour(12) ' . date('ha') . '<br/>';
    echo 'minute ' . date('i') . '<br/>';
    echo 'seconds ' . date('s') . '<br/>';
    echo '<br/>' . $name . '<br/>' . $place . '<br/>' . $tele . '<br/>' . $email . '<br/>' . $guideName . '<br/>' . $pricePerH . '<br/>' . $price . '<br/>' . $cardNum . '<br/>' . $stDate . '<br/>' . $enDate . '<br/>';

    echo "errors<br/>";
    // var_dump($errors);
    echo '<br/>';
    var_dump($nameErr);
    echo '<br/>';
    var_dump($placeErr) . '<br/>';
    echo '<br/>';
    var_dump($teleErr) . '<br/>';
    echo '<br/>';
    var_dump($emailErr) . '<br/>';
    echo '<br/>';
    var_dump($guideNameErr) . '<br/>';
    echo '<br/>';
    var_dump($perHourErr) . '<br/>';
    echo '<br/>';
    var_dump($stDateErr) . '<br/>';
    echo '<br/>';
    var_dump($priceErr) . '<br/>' . var_dump($cardNumErr) . '<br/>';

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
                ':guide_name' => $guideName,
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
    <script defer src="js/createTrip.js"></script>
    <script defer src="js/tripDataValidation.js"></script>
    <link rel="stylesheet" href="css/tripCSS.css">
</head>
<style>
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

<body style="background-image: url('bahirdar.jpg');">
    <section class="trip-form-container">
        <fieldset>
            <legend>Create trip form</legend>
            <?php if (!$errors && isset($_GET['success'])) : ?>
                <div class="alert alert-primary" role="alert">
                    Data Saved Succesfully
                </div>
            <?php endif ?>
            <form id="form1" method="POST">
                <div class="input-container <?php
                                            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                                                echo $nameErr ? 'error' : 'success';
                                            }
                                            ?>">
                    <label for="name">Full name</label>
                    <input type="text" name="Fname" class="no-outline" id="name" value="<?php
                                                                                        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                                                                                            echo $name ? $name : '';
                                                                                        }
                                                                                        ?>" placeholder="Full Name" maxlength="20" required>
                    <i class="fas fa-check-circle"></i>
                    <i class="fas fa-exclamation-circle"></i>
                    <small><?php echo $nameErr[0] ?? ''; ?></small>
                </div>
                <div class="input-container <?php if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                                                echo $placeErr ? 'error' : 'success';
                                            } ?>">
                    <label for="place">Where you are going to go?</label>
                    <input type="Search" value="<?php if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                                                    echo $place ? $place : "Addis Ababa, Ethiopia";
                                                } ?>" class="no-outline" id="place" name="place" required>
                    <i class="fas fa-check-circle"></i>
                    <i class="fas fa-exclamation-circle"></i>
                    <small><?php echo $placeErr[0] ?? ''; ?></small>
                </div>
                <div class="input-container <?php if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                                                echo $teleErr ? 'error' : 'success';
                                            } ?>">
                    <label for="tele">Phone </label>
                    <input type="tel" id="tele" name="mobile" value="<?php echo $tele ? $tele : '' ?>" required>
                    <i class="fas fa-check-circle"></i>
                    <i class="fas fa-exclamation-circle"></i>
                    <small> <?php echo $teleErr[0] ?? ''; ?>
                    </small>
                </div>
                <div class="input-container <?php if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                                                echo $emailErr ? 'error' : 'success';
                                            } ?>">
                    <label for="mail">Email</label><br>
                    <input type="email" id="mail" name="E-mail" value="<?php echo $email ? $email : '' ?>" placeholder="Username@gmail.com" required>
                    <i class="fas fa-check-circle"></i>
                    <i class="fas fa-exclamation-circle"></i>
                    <small><?php echo $emailErr[0] ?? ''; ?></small>
                </div>
                <div class="input-container <?php if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                                                echo $guideNameErr ? 'error' : 'success';
                                            } ?>">
                    <label for="guides">Tour Guide Name</label><br>
                    <select name="guides" id="guides">
                        <?php if (!empty($tourguides)) : ?>
                            <?php foreach ($tourguides as $i => $tourguide) : ?>
                                <option value="<?php echo $tourguide['name'] ?>" <?php if ($nameof === $tourguide['name']) echo 'selected'; ?>>
                                    <?php echo $guideName ? $guideName : $tourguide['name']; ?>
                                </option>
                            <?php endforeach ?>
                        <?php endif ?>
                    </select>
                    <i class="fas fa-check-circle"></i>
                    <i class="fas fa-exclamation-circle"></i>
                    <small><?php echo $guideNameErr[0] ?? ''; ?></small>
                </div>
                <div class="input-container <?php if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                                                echo $stDateErr ? 'error' : 'success';
                                            } ?>">
                    <label for="Date">From date</label>
                    <input type="datetime-local" id="St-Date" name="Date-st" value="<?php echo $stDate ? date('Y-m-d\TH:i', $stDate)  : null ?>" required>
                    <i style="position: absolute;right: 80px;top:38px" class="fas fa-check-circle"></i>
                    <i style="position: absolute;right: 80px;top:38px" class="fas fa-exclamation-circle"></i>
                    <small><?php echo $stDateErr[0] ?? ''; ?></small>
                </div>
                <div class="input-container <?php if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                                                echo $enDateErr ? 'error' : 'success';
                                            } ?>">
                    <label for="Date">To date</label>
                    <input type="datetime-local" id="En-Date" name="Date-en" value="<?php echo $enDate ? date('Y-m-d\TH:i', $enDate) : null ?>" required>
                    <i style="position: absolute;right: 80px;top:38px" class="fas fa-check-circle"></i>
                    <i style="position: absolute;right: 80px;top:38px" class="fas fa-exclamation-circle"></i>
                    <small><?php echo $enDateErr[0] ?? ''; ?></small>
                </div>
                <div class="input-container <?php if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                                                echo $cardNumErr ? 'error' : 'success';
                                            } ?>">
                    <label for="credit-card">Credit card number</label>
                    <input type="password" name="credit-card" id="credit-card" value="<?php echo $cardNum ? $cardNum : null ?>" required>
                    <i class="fas fa-eye" id="<?php echo $cardNum ? 'on' : 'off' ?>"></i>
                    <i class="fas fa-eye-slash" id="off"></i>
                    <i class="fas fa-check-circle"></i>
                    <i class="fas fa-exclamation-circle"></i>
                    <small><?php echo $cardNumErr[0] ?? ''; ?></small>
                </div>
                <div class="input-container">
                    <label for="perhour">Price/Hr.</label>
                    <input type="text" id="perhour" name="perHour" value="<?php echo $pricePerH ? $pricePerH : null ?>" disabled>
                    <i class="fas fa-check-circle"></i>
                    <i class="fas fa-exclamation-circle"></i>
                    <small></small>
                </div>
                <div class="input-container">
                    <label for="price">Total price</label>
                    <input type="text" name="price" id="price" value="<?php echo $price ? $price : null ?>" disabled>
                    <i class="fas fa-check-circle"></i>
                    <i class="fas fa-exclamation-circle"></i>
                    <small></small>
                </div>

                <input type="submit" id="submit-btn" name="submit" value="Create">
                <input style="transform: translateX(10px);" type="reset" id="reset" name="clear" value="clear">
            </form>
        </fieldset>
    </section>
    <script>
        function setPrice() {
            <?php foreach ($tourguides as $i => $tourguide) : ?>
                if (guides.value ==
                    "<?php echo $tourguide['name'] ?>") {
                    perhour
                        .value = <?php echo $tourguide['salaryPerHour'] ?> +
                        'Birr per hour';
                    selectedGuidePrice
                        = <?php echo $tourguide['salaryPerHour'] ?>;
                    console.log('here ', perhour.value, selectedGuidePrice);
                    totalPrice();
                }
            <?php endforeach ?>
        }
    </script>
    <?php include_once 'partials/frontEndValidation.php'; ?>
</body>


</html>