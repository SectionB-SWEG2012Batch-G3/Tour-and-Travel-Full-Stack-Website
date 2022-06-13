<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="keywords" content="tou,travel,Amazing Places,Ethiopia,Lalibela,Visit Ethiopia">
    <meta name="description" content="A tour and travel home page">
    <meta name="author" content="4HF_tour_and_travel">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>4HF_tour_and_travel | homepage</title>
    <link rel="stylesheet" href="../fontawesome-free-5.15.4-web/css/all.css">
    <link rel="stylesheet" href="../fontawesome-free-5.15.4-web/css/all.min.css">
    <link rel="stylesheet" href="../css/navStyle.css">
    <link rel="stylesheet" href="../css/footerCSS.css">
    <link rel="stylesheet" href="../css/HomepageCss2.css">
    <link rel="stylesheet" href="../Admin/styles/css.css">
    <!-- <link rel="stylesheet" href="homepage2.css"> -->
    <!-- <script defer src="../JS/search-boxScript.js"></script> -->
    <script defer src="../JS/home.js"></script>
    <script defer src="NavScript.js"></script>
</head>

<body id="body">
    <?php include_once '../partials/navbar.php' ?>
    <main>
        <div class="Background-video-container">
            <video id="auto" width="100%" ; height="min(900px,30%)" autoplay muted loop>
                <source src="A Tour of Ethiopia's Amazing Landscapes.mp4" type="video/mp4">Your browser doesn't support the video
            </video>
        </div>
        <h1>Recomended places to visit
            <i class="fa-solid fa-house-chimney" style="color: black"></i>
        </h1>
        <?php if (!empty($destinations)) : ?>
            <div class="alone-grid">
                <?php foreach ($destinations as $i => $destination) : ?>
                    <div class="alone-grid-item scrolle">
                        <div class="alone-card">
                            <div class="imc">
                                <img class="alone-card-img" src="../Admin/<?php echo $destination['image'] ?>" alt="<?php echo $destination['RegionName'] ?>">
                            </div>
                            <div class="alone-card-content">
                                <h2 class="alone-card-header"><?php echo $destination['RegionName'] ?></h2>
                                <p class="alone-card-text">
                                    <?php echo explode('.', $destination['description'])[0] ?>
                                </p>
                                <button class="alone-card-btn"><a href="../destination/destinations.php?id=<?php echo $destination['id'] ?>&name=<?php echo $destination['RegionName'] ?>">See More</a></button>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        <?php endif ?>

        <?php if (!empty($hotels)) : ?>
            <h1 class="scrolle">Recomended Hotels</h1>
            <div class="alone-grid">
                <?php foreach ($hotels as $i => $hotel) : ?>
                    <div class="alone-grid-item scrolle">
                        <div class="alone-card">
                            <div class="imc">
                                <img class="alone-card-img" src="../Admin/<?php echo $hotel['image'] ?>" alt="<?php echo $hotel['hotel_name'] ?>">
                            </div>
                            <div class="alone-card-content">
                                <h2 class="alone-card-header"><?php echo $hotel['hotel_name'] ?></h2>
                                <p class="alone-card-text">
                                    Price range:<?php echo '-$' . $hotel['min_price'] . '-$' . $hotel['max_price'] ?> <br>
                                    Rating:
                                    <span class="yellowStar">
                                        <?php
                                        for ($i = 1; $i <= $hotel['rating']; $i++) {
                                            echo '★';
                                        }
                                        ?>
                                    </span>
                                    <span class="greyStar">
                                        <?php
                                        $greystar = $hotel['rating'];
                                        for ($i = $hotel['rating']; $i < 5; $i++) {
                                            echo '★';
                                        }
                                        ?>
                                    </span>
                                </p>
                                <button class="alone-card-btn"><a href="../hotel/hotel.php?id=<?php echo $hotel['id'] ?? '' ?>&name=<?php echo $hotel['hotel_name'] ?? '' ?>">See More</a></button>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        <?php endif ?>



        <?php if (!empty($cars)) : ?>
            <h1>Choose Car</h1>
            <div class="alone-grid">
                <?php foreach ($cars as $i => $car) : ?>
                    <?php
                    $stmt = $pdo->prepare("SELECT * FROM image WHERE imageFor = :id && description = :desc LIMIT 1");
                    $stmt->bindParam(':id', $car['id']);
                    $stmt->bindParam(':desc', $car['modelName']);
                    $stmt->execute();
                    $images = $stmt->fetch();
                    ?>
                    <div class="alone-grid-item scrolle">
                        <div class="alone-card">
                            <div class="imc">
                                <img class="alone-card-img" src="../Admin/<?php echo $images['path'] ?? '' ?>" alt="<?php echo $images['description'] ?? '' ?>">
                            </div>
                            <div class=" alone-card-content2">
                                <h2 class="alone-card-header"><?php echo $car['modelName'] ?? '' ?></h2>
                                <p class="alone-card-text1">
                                    Price <?php echo $car['price'] ?? 0 ?>"$
                                </p>
                                <button class="alone-card-btn"><a href="../transport/car.php?id=<?php echo $car['id'] ?>" ?>See More</a></button>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        <?php endif ?>

        <h1>Unforgotable Experiences</h1>

        <div>
            <video controls muted class="videoContain">
                <source src="Top 5 AMAZING Places to Visit in Ethiopia Africa Travel Guide.mp4" type="video/mp4">Your browser doesn't support the video
                </videos>
        </div>
    </main>
    <footer>
        <div class="container">
            <div class="row">
                <div class="footer-items">
                    <h4>Terms and Privacy</h4>
                    <ul id="lists" style="color:#bbb;text-decoration: none;">
                        <li><a href="#">Faq</a></li>
                        <li><a href="#">About us</a></li>
                        <li><a href="#">Privacy policy</a></li>
                        <li>Travel informations</li>
                    </ul>
                </div>
                <div class="footer-items">
                    <h4>Contacts</h4>
                    <ul id="lists">
                        <li>Tel : +251111234534</li>
                        <li><a style="color:#bbb;text-decoration: none;" href="mailto:email@gmail.com">E-mail</a></li>
                    </ul>
                </div>
                <div class="footer-items">
                    <h4>Follow us on</h4>
                    <div class="socials">
                        <a href="#"><i class="fab fa-youtube"></i></a>
                        <a href="#"><i class="fab fa-facebook"></i></a>
                        <a href="#"><i class="fab fa-telegram"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
                <div class="copyright" style="width:100%; text-align: center;color: white;">
                    <i>Copyright 2022 by Refsnes Data. All Rights Reserved.</i>
                </div>
            </div>
        </div>
    </footer>
    <div class="to-top">
        <a href="#body">
            <i class="fa-solid fa-chevron-up"></i>
            <!-- <i class="fas fa-chevron-up"></i> -->
        </a>
    </div>

    <script src="../JS/homepage2.js"></script>

</body>

</html>