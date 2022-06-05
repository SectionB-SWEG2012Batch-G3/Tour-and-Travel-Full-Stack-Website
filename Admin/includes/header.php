<?php
session_start();
require_once '../partials/require_login.php';
require_once '../partials/require_previlage_of.php';
require_once '../partials/find_by_username.php';
require_once '../partials/current_user.php';
$role = require_loggedin();
require_previlage_of($role, 'admin');
$username = current_user();
$user = find_by_username($username);
// var_dump($user);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Boxicons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- My CSS -->
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="../fontawesome-free-5.15.4-web/css/all.min.css">
    <link rel="stylesheet" href="styles/css.css">
    <script defer src="scripts/setProfile.js"></script>
    <style>
        .modal-body {
            color: #dc3545;
        }

        form.form {
            max-width: 500px;
            margin: 25px 0 0 200px;
        }
    </style>
    <title>AdminHub</title>
</head>

<body>

    <!-- SIDEBAR -->
    <section id="sidebar">
        <a href="#" class="brand">
            <i class='bx bxs-smile'></i>
            <span class="text">Admin Dashboard</span>
        </a>
        <ul class="side-menu top">
            <li class="<?php echo isset($_GET['active']) && $_GET['active'] === 'index' ? 'active' : (isset($_GET['active']) ? '' : 'active'); ?>">
                <a href="index.php?active=index">
                    <i class='bx bxs-dashboard'></i>
                    <span class="text">Dashboard</span>
                </a>
            </li>
            <li class="">
                <a href="#">
                    <i class='bx bxs-shopping-bag-alt'></i>
                    <span class="text">Homepage</span>
                </a>
            </li>
            <li class="<?php echo isset($_GET['active']) && $_GET['active'] === 'destination' ? 'active' : ''; ?>">
                <a href="destinations.php?active=destination">
                    <i class='bx bxs-doughnut-chart'></i>
                    <span class="text">Destinations</span>
                </a>
            </li>
            <li class="<?php echo isset($_GET['active']) && $_GET['active'] === 'hotel' ? 'active' : ''; ?>">
                <a href="hotels.php?active=hotel">
                    <i class='bx bxs-message-dots'></i>
                    <span class="text">Hotels</span>
                </a>
            </li>
            <li class="<?php echo isset($_GET['active']) && $_GET['active'] === 'cars' ? 'active' : ''; ?>">
                <a href="cars.php?active=cars">
                    <i class='bx bxs-group'></i>
                    <span class="text">Cars</span>
                </a>
            </li>
            <li class="<?php echo isset($_GET['active']) && $_GET['active'] === 'tourguide' ? 'active' : ''; ?>">
                <a href="tourguides.php?active=tourguide">
                    <i class='bx bxs-group'></i>
                    <span class="text">Tour Guides</span>
                </a>
            </li>

            <li class="<?php echo isset($_GET['active']) && $_GET['active'] === 'MySchedule' ? 'active' : ''; ?>">
                <a href="TourguideSchedule.php?active=MySchedule">
                    <i class='bx bxs-group'></i>
                    <span class="text">Tour Guide Schedule</span>
                </a>
            </li>

            <li class="<?php echo isset($_GET['active']) && $_GET['active'] === 'reservedCars' ? 'active' : ''; ?>">
                <a href="reservedCars.php?active=reservedCars">
                    <i class='bx bxs-group'></i>
                    <span class="text">Reserced Cars</span>
                </a>
            </li>
        </ul>
        <ul class="side-menu">
            <li>
                <a href="#">
                    <i class='bx bxs-cog'></i>
                    <span class="text">Settings</span>
                </a>
            </li>
            <li>
                <a href="../partials/logout.php" class="logout">
                    <i class='bx bxs-log-out-circle'></i>
                    <span class="text">Logout</span>
                </a>
            </li>
        </ul>
    </section>
    <!-- SIDEBAR -->

    <!-- CONTENT -->
    <section id="content">
        <!-- NAVBAR -->
        <nav>
            <i class='bx bx-menu'></i>
            <a href="#" class="nav-link">Categories</a>
            <form action="<?php echo $_SERVER['PHP_SELF'] ?>?active=<?php echo $_GET['active'] ?? "" ?>">
                <div class="form-input">
                    <input type="search" id="search" name="search" placeholder="Search...">
                    <input type="hidden" id="search" name="active" placeholder="Search...">
                    <!-- value="<?php // echo $_GET['active'] 
                                ?>" -->
                    <button type="submit" class="search-btn"><i class='bx bx-search'></i></button>
                </div>
            </form>

            <input type="checkbox" id="switch-mode" hidden>
            <label for="switch-mode" class="switch-mode"></label>
            <!-- <a href="#" class="notification">
                <i class='bx bxs-bell'></i>
                <span class="num">8</span>
            </a> -->
            <?php if ($user['profile']) : ?>
                <a href="#" title="Profile" class="profile">
                    <img src=" <?php echo $user['profile'] ?? '' ?>" alt="">
                </a>
            <?php endif ?>
            <?php if (!$user['profile']) : ?>
                <a href="#" title="Profile" class="profile" style="border: 1px solid;line-height:28px; background-color:red;color:white; width:30px; height:30px; text-align:center; border-radius:50%; font-size:24px">
                    <?php echo $_SESSION['username'][0] ?>
                </a>
            <?php endif ?>


            <div class="upload-con hidden">
                <div class="upload">
                    <img src="<?php echo $user['profile'] ? $user['profile'] : '../image.jpg' ?>" width="100" height="100" alt="" />
                    <div class="round">
                        <form method="POST" action="profile.php" id="formP" enctype="multipart/form-data">
                            <input type="file" name="profile" />
                            <i class="fa fa-camera" style="color: #fff"></i>
                        </form>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mt-3 mx-3" form="formP">Save</button>
            </div>
        </nav>
        <!-- NAVBAR -->

        <!-- MAIN -->
        <main style="background-image: url('../')">
            <div class="head-title">
                <div class="left">
                    <h1>Dashboard</h1>
                    <ul class="breadcrumb">
                        <li>
                            <a href="#">Dashboard</a>
                        </li>
                        <li><i class='bx bx-chevron-right'></i></li>