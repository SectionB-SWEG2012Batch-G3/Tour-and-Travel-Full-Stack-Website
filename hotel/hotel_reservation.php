<?php
try {
    include_once '../dbconfig/connection.php';
} catch (PDOException $e) {
    echo 'connection exception ' . $e->getMessage();
}

$stmt = $pdo->prepare("SELECT * FROM hotel");
$stmt->execute();
$hotels = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="Viewport" content="width = device-width, initial-scale=1.0">
    <meta name="description" content="what to know about hotel reservation?">
    <meta name="keywords" content="hotel,rooms,bar and resturant">
    <meta name="author" content="Hamere Endale">
    <!-- <link rel="stylesheet" type="text/css" href="../css/style.css"> -->
    <link rel="stylesheet" href="css/hotelsCSS.css">
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
    <header>
        <div class="top2">
            <div class="logo" style="height: 100px;width: 125px;">
                <a href="../homepage.html">
                    <svg height="100" width="125">
                        <ellipse cx="62.5" cy="50" rx="55" ry="45" fill="url(#grad2)" />
                        <polygon points="62.5,5 85,50 62.5,95 40,50" style="stroke: rgb(255, 255, 255); fill: rgba(255, 255, 0, 1);" />
                        <text fill="#000000" font-size="25" font-family="Verdana" x="20" y="60">4</text>
                        <text fill="#000000" font-size="25" font-family="Verdana" x="52.5" y="60">H</text>
                        <text fill="#000000" font-size="25" font-family="Verdana" x="90" y="60">F</text>
                        <text fill="#000000" font-size="13" font-family="Verdana" x="20" y="80">Tour &amp; Travel</text>

                        <defs>
                            <linearGradient id="grad2" x1="0%" y1="0%" x2="50%" y2="0%" x3="51%" y3="0%" x4="100%" y4="100%">
                                <stop offset="0%" style="stop-color: rgb(0, 255, 0);stop-opacity: 1;" />
                                <stop offset="100%" style="stop-color: rgb(255, 255, 0);stop-opacity: 1;" />
                                <stop offset="100%" style="stop-color: rgb(255, 255, 0);stop-opacity: 1;" />
                                <stop offset="200%" style="stop-color: rgb(255, 0, 0); stop-opacity: 1;" />
                            </linearGradient>
                        </defs>

                    </svg>
                </a>
            </div>
            <div class="login-container">
                <button class="blogs"><a href="../Tips.html">Travel Blogs</a></button>
                <button class="login" style="width:100px;"><a href="../tour guide/Profiles/log in.html">Log
                        In</a></button>
            </div>
            <div class="search-bar-container">
                <div class="input-container">
                    <input class="searchBar" type="Search" name="searchBar" value="" placeholder="Where to go... " list="ethiopia">
                    <a href="#" class="search-icon">
                        <i class="fa fa-2x fa-search" aria-hidden="true"></i>
                    </a>
                </div>

                <div class="autocom-box" style="margin-left: 10px;">
                    <ul>
                        <li></li>
                    </ul>
                </div>
            </div>
        </div>
        <nav>
            <label for="fa-bars-label" class="fa-bars-label" onclick="changeFont()">
                <i class="fas fa-bars"></i>
            </label>
            <input type="checkbox" id="fa-bars-label">
            <ul>
                <li><a href="../homepage.html">Home</a></li>
                <li>
                    <label for="dest-label" class="show">Destinations+</label>
                    <a href="../destination/destinations.html">Destinations</a>
                    <input type="checkbox" id="dest-label">
                    <ul>
                        <li>
                            <label for="addis-label" style="margin-left: 50px;" class="show">Addis A.+</label>
                            <a href="../destination/addisababa/addisababa.html">Addis Ababa</a>
                            <input type="checkbox" id="addis-label">
                            <ul>
                                <li><a href="../destination/addisababa/mountentoto.html">Entoto</a></li>
                                <li><a href="../destination/addisababa/unitypark.html">Unity Park</a></li>
                                <li><a href="../destination/addisababa/friendshippark.html">Friendship Park</a></li>
                                <li><a href="../destination/addisababa/zomamuseum.html">Zoma Museum</a></li>
                            </ul>
                        </li>
                        <li>
                            <label for="Bahir-label" style="margin-left: 50px;" class="show">Bahirdar+</label>
                            <a href="../destination/bahirdar/bahirdar.html">Bahirdar</a>
                            <input type="checkbox" id="Bahir-label">
                            <ul>
                                <li><a href="../destination/bahirdar/laketana.html">Lake Tana</a></li>
                                <li><a href="../destination/bahirdar/azwamariam.html">Azwa Mariam</a></li>

                            </ul>
                        </li>


                        <li><a href="../destination/harar/harar.html">Harar</a> </li>
                        <li><a href="../destination/gonder/gonder.html">Gonder</a></li>
                        <li><a href="../destination/afar/afar.html">Afar</a></li>
                        <li><a href="../destination/jinka/jinka.html">Jinka</a></li>
                    </ul>
                </li>
                <li>
                    <label for="hotel-label" class="show">Hotel+</label>
                    <a href="hotel reservation.html">Hotel Reservation</a>
                    <input type="checkbox" id="hotel-label">
                    <ul>
                        <li><a href="Sheraton Addis/Sheraton Addis.html">Sheraton</a></li>
                        <li><a href="Skylight/Skylight.html">Skylight</a></li>
                        <li><a href="Golden Tulip/Golden Tulip.html">Golden Tulip</a></li>
                        <li><a href="Hyatt/Hyatt.html">Hyatt</a></li>
                        <li><a href="Marriott/Marriott.html">Mariott</a></li>
                        <li><a href="Emerald/Emerald Lodge.html">Emerald</a></li>
                    </ul>
                </li>
                <li>
                    <label for="transport-label" class="show">Transport+</label>
                    <a href="../transportation/transport.html">Transport</a>
                    <input type="checkbox" id="transport-label">
                    <ul>
                        <li><a href="../transportation/transport.html#forfamily">For family</a></li>
                        <li><a href="../transportation/transport.html#foralone">For Alone</a></li>
                        <li><a href="../transportation/transport.html#forgroup">For Group</a></li>
                    </ul>
                </li>
                <li class="tour-guide"><a href="../tour guide/tourguide.html">Tour Guide</a></li>
                <li class="Experience"><a href="#">Experience</a></li>
                <li class="About-us"><a href="../About us/About us.html">About us</a></li>
            </ul>
        </nav>
    </header>

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
        echo ($regions[1]['region_name']);
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