<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="Viewport" content="width = device-width, initial-scale=1.0">
    <meta name="description" content="what to know about hotel reservation?">
    <meta name="keywords" content="hotel,rooms,bar and resturant">
    <meta name="author" content="Hamere Endale">
    <!-- <link rel="stylesheet" type="text/css" href="../css/style.css"> -->
    <link rel="stylesheet" href="css/hotels.css">
    <link rel="stylesheet" href="../css/footerCSS.css">
    <link rel="stylesheet" href="../css/navStyle.css">
    <link rel="stylesheet" href="../fontawesome-free-5.15.4-web/css/all.min.css">
    <!-- <link rel="stylesheet" href="css/scroll css.css"> -->
    <link rel="stylesheet" href="../css/HomepageCss.css">
    <script defer src="js/hotel.js"> </script>
    <script defer src="../JS/NavScript.js"> </script>
    <script defer src="../JS/search-boxScript.js"> </script>
    <style>
        .background {
            width: 100%;
        }
    </style>
</head>


<body id="body">
    <?php include_once '../partials/navbar.php';
    try {
        include_once '../dbconfig/connection.php';
    } catch (PDOException $e) {
        echo 'connection exception ' . $e->getMessage();
    }

    $stmt = $pdo->prepare("SELECT * FROM hotel");
    $stmt->execute();
    $hotels = $stmt->fetchAll();
    ?>
    <main>
        <h1>Hotel Reservation</h1>

        <div class="slideContainer">

            <div class="slider">
                <?php if (!empty($hotels)) : ?>
                    <?php foreach ($hotels as $i => $hotel) : ?>
                        <div class="slide <?php if ($i == 0) echo 'active' ?>">
                            <img src="../Admin/<?php echo $hotel['image'] ?>" alt="<?php echo $hotel['hotel_name'] ?>">
                            <div class="info">
                                <h2><?php echo $hotel['hotel_name'] ?></h2>
                                <p></p>
                            </div>
                        </div>
                    <?php endforeach ?>
                <?php endif ?>


                <div class="navigation">
                    <svg height="50" width="50" class="prev-btn">
                        <polygon points="10,25 40,5 40,15 25,25 40,35 40,45 " style="stroke: rgb(255, 255, 255); fill: rgb(0, 0, 0);" />
                    </svg>
                    <svg height="50" width="50" class="next-btn">
                        <polygon points="10,5 40,25 10,45 10,35 25,25 10,15 " style="stroke: rgb(255, 255, 255); fill: rgb(0, 0, 0);" />
                    </svg>
                </div>

                <div class="navigation-visibility">

                    <?php if (!empty($hotels)) : ?>
                        <?php foreach ($hotels as $i => $hotel) : ?>
                            <div class="slide-icon <?php if ($i == 0) echo 'active' ?>">
                                <svg height="20" width="30">
                                    <polygon class="slideSvg" points="1,1 29,1 29,15 1,15" style="stroke: rgb(255, 255, 255); " />
                                </svg>
                            </div>
                        <?php endforeach ?>
                    <?php endif ?>
                </div>
            </div>

        </div>





        <?php
        $stmt = $pdo->prepare("SELECT region_name FROM `hotel` GROUP BY region_name;");
        $stmt->execute();
        $regions = $stmt->fetchAll();

        ?>
        <div class="tap">
            <?php if (!empty($regions)) : ?>
                <?php foreach ($regions as $i => $region) : ?>
                    <button class="button"><a href="#<?php echo $region['region_name'] ?>"> <?php echo $region['region_name'] ?> </a></button>
                <?php endforeach ?>
            <?php endif ?>
        </div>
        <?php if (!empty($regions)) : ?>
            <?php foreach ($regions as $i => $region) : ?>
                <h2 class="area scroll" id="<?php echo $region['region_name'] ?>"><?php echo $region['region_name'] ?></h2>
                <?php
                $stmt = $pdo->prepare("SELECT * FROM `hotel` WHERE region_name = :region");
                $stmt->bindParam(':region', $region['region_name']);
                $stmt->execute();
                $hotels_in = $stmt->fetchAll();
                ?>
                <div class="alone-grid">
                    <?php if (!empty($hotels_in)) : ?>
                        <?php foreach ($hotels_in as $i => $hotel) : ?>
                            <div class="alone-grid-item scroll">
                                <div class="alone-card">
                                    <div class="imc">
                                        <img class="alone-card-img" src="../Admin/<?php echo $hotel['image'] ?>" alt="<?php echo $hotel['hotel_name'] ?>">
                                    </div>
                                    <div class="alone-card-content">
                                        <h2 class="alone-card-header"><?php echo $hotel['hotel_name'] ?></h2>
                                        <p class="alone-card-text">
                                            Price range:<?php echo '-$' . $hotel['min_price'] . '-$' . $hotel['max_price'] ?> <br>
                                            Rating:<span class="yellowStar">
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
                                        <button class="alone-card-btn"><a href="hotel.php?id=<?php echo $hotel['id'] ?>&name=<?php echo $hotel['hotel_name'] ?>">See More</a></button>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach ?>
                    <?php endif ?>
                </div>
            <?php endforeach ?>

        <?php endif ?>
    </main>
    <footer>
        <div class="container scroll">
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
            <i class="fas fa-chevron-up"></i>
        </a>
    </div>
    <script>
        const toTop = document.querySelector(".to-top");
        window.addEventListener("scroll", () => {
            if (window.scrollY > 200) {
                toTop.classList.add("visible");
            } else {
                toTop.classList.remove("visible");
            }
        });
    </script>


</body>

</html>