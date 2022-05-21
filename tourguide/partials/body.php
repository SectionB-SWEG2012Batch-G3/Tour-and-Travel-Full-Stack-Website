<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>4HF Tour and Travel|Create Trip Form</title>
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../fontawesome-free-5.15.4-web/css/all.css">
    <script defer src="http://localhost/Tour-and-Travel-Full-Stack-Website/tourguide/js/createTrip.js"></script>
    <script defer src="http://localhost/Tour-and-Travel-Full-Stack-Website/tourguide/js/tripDataValidation.js"></script>
    <link rel="stylesheet" href="http://localhost/Tour-and-Travel-Full-Stack-Website/tourguide/css/tripCSS.css">
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

<body style="background-image: url('http://localhost/Tour-and-Travel-Full-Stack-Website/tourguide/bahirdar.jpg');">
    <section class="trip-form-container">
        <?php if ($errors && $scheduleErr) : ?>
            <script>
                const Myalert = function() {
                    alert('<?php echo $scheduleErr ?>');
                }
                Myalert();
            </script>
        <?php endif ?>
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
                    <input type="text" name="Fname" class="no-outline" id="name" value="<?php echo $name ?? '' ?>" placeholder="Full Name" maxlength="20" required>
                    <i class="fas fa-check-circle"></i>
                    <i class="fas fa-exclamation-circle"></i>
                    <small><?php echo $nameErr[0] ?? ''; ?></small>
                </div>
                <div class="input-container <?php if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                                                echo $placeErr ? 'error' : 'success';
                                            } ?>">
                    <label for="place">Where you are going to go?</label>
                    <input type="Search" value="<?php echo $place ?? '' ?>" placeholder="Lalibella" class="no-outline" id="place" name="place" required>
                    <i class="fas fa-check-circle"></i>
                    <i class="fas fa-exclamation-circle"></i>
                    <small><?php echo $placeErr[0] ?? ''; ?></small>
                </div>
                <div class="input-container <?php if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                                                echo $teleErr ? 'error' : 'success';
                                            } ?>">
                    <label for="tele">Phone </label>
                    <input type="tel" id="tele" name="mobile" value="<?php echo $tele ?? '' ?>" required>
                    <i class="fas fa-check-circle"></i>
                    <i class="fas fa-exclamation-circle"></i>
                    <small> <?php echo $teleErr[0] ?? ''; ?>
                    </small>
                </div>
                <div class="input-container <?php if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                                                echo $emailErr ? 'error' : 'success';
                                            } ?>">
                    <label for="mail">Email</label><br>
                    <input type="email" id="mail" name="E-mail" value="<?php echo $email ?? '' ?>" placeholder="Username@gmail.com" required>
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
                                <option value="<?php echo $tourguide['name'] ?>" <?php
                                                                                    if ($nameof === $tourguide['name']) {
                                                                                        echo 'selected';
                                                                                    } else {
                                                                                        echo  $guideName == $tourguide['name'] ? 'selected' : '';
                                                                                    }
                                                                                    ?>>
                                    <?php echo  $tourguide['name']; ?>
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
                    <input type="password" name="credit-card" id="credit-card" value="<?php echo $cardNum ?? null ?>" placeholder="Credit card num" required>
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
    <?php include_once '/xampp/htdocs/Tour-and-Travel-Full-Stack-Website/transport/partials/totalprice.php' ?>
    <?php include_once '/xampp/htdocs/Tour-and-Travel-Full-Stack-Website/transport/partials/DOM.php'; ?>
</body>

</html>