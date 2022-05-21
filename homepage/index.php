<?php
include_once '../dbconfig/connection.php';
$stmt = $pdo->prepare("SELECT * FROM destination LIMIT 6");
$stmt->execute();
$destinations = $stmt->fetchAll();

$stmt = $pdo->prepare("SELECT * FROM transport LIMIT 3");
$stmt->execute();
$cars = $stmt->fetchAll();

$stmt = $pdo->prepare("SELECT * FROM hotel LIMIT 6");
$stmt->execute();
$hotels = $stmt->fetchAll();


?>

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
    <!-- <link rel="stylesheet" href="homepage2.css"> -->
    <script defer src="../JS/search-boxScript.js"></script>
    <script defer src="../JS/home.js"></script>
    <script defer src="NavScript.js"></script>

</head>

<body id="body">
    <header>
        <div class="top2">
            <div class="logo" style="height: 100px;width: 125px;">
                <a href="http://localhost/Tour-and-Travel-Full-Stack-Website/homepage/homepage.php">
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
                <button class="blogs"><a href="Travel Blog/Tips.html">Travel Blogs</a></button>
                <button class="login" style="width:100px;"><a href="http://localhost/Tour-and-Travel-Full-Stack-Website/user/log%20in.php">Log
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
                <li><a href="homepage.html">Home</a></li>
                <li>
                    <label for="dest-label" class="show">Destinations+</label>
                    <a href="destination/destinations.html">Destinations</a>
                    <input type="checkbox" id="dest-label">
                    <ul>
                        <li>
                            <label for="addis-label" style="margin-left: 50px;" class="show">Addis A.+</label>
                            <a href="destination/addisababa/addisababa.html">Addis Ababa</a>
                            <input type="checkbox" id="addis-label">
                            <ul>
                                <li><a href="destination/addisababa/mountentoto.html">Entoto</a></li>
                                <li><a href="destination/addisababa/unitypark.html">Unity Park</a></li>
                                <li><a href="destination/addisababa/friendshippark.html">Friendship Park</a></li>
                                <li><a href="destination/addisababa/zomamuseum.html">Zoma Museum</a></li>
                            </ul>
                        </li>
                        <li>
                            <label for="Bahir-label" style="margin-left: 50px;" class="show">Bahirdar+</label>
                            <a href="destination/bahirdar/bahirdar.html">Bahirdar</a>
                            <input type="checkbox" id="Bahir-label">
                            <ul>
                                <li><a href="destination/bahirdar/laketana.html">Lake Tana</a></li>
                                <li><a href="destination/bahirdar/azwamariam.html">Azwa Mariam</a></li>

                            </ul>
                        </li>


                        <li><a href="destination/harar/harar.html">Harar</a> </li>
                        <li><a href="destination/gonder/gonder.html">Gonder</a></li>
                        <li><a href="destination/afar/afar.html">Afar</a></li>
                        <li><a href="destination/jinka/jinka.html">Jinka</a></li>
                    </ul>
                </li>
                <li>
                    <label for="hotel-label" class="show">Hotel+</label>
                    <a href="Hotel Reservation/hotel reservation.html">Hotel Reservation</a>
                    <input type="checkbox" id="hotel-label">
                    <ul>
                        <li><a href="Hotel Reservation/Sheraton Addis/Sheraton Addis.html">Sheraton</a></li>
                        <li><a href="Hotel Reservation/Skylight/Skylight.html">Skylight</a></li>
                        <li><a href="Hotel Reservation/Golden Tulip/Golden Tulip.html">Golden Tulip</a></li>
                        <li><a href="Hotel Reservation/Hyatt/Hyatt.html">Hyatt</a></li>
                        <li><a href="Hotel Reservation/Marriott/Marriott.html">Mariott</a></li>
                        <li><a href="Hotel Reservation/Emerald/Emerald Lodge.html">Emerald</a></li>
                    </ul>
                </li>
                <li>
                    <label for="transport-label" class="show">Transport+</label>
                    <a href="transportation/transport.html">Transport</a>
                    <input type="checkbox" id="transport-label">
                    <ul>
                        <li><a href="transportation/transport.html#forfamily">For family</a></li>
                        <li><a href="transportation/transport.html#foralone">For Alone</a></li>
                        <li><a href="transportation/transport.html#forgroup">For Group</a></li>
                    </ul>
                </li>
                <li class="tour-guide"><a href="tour guide/tourguide.html">Tour Guide</a></li>
                <li class="Experience"><a href="#">Experience</a></li>
                <li class="About-us"><a href="About us/About us.html">About us</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <div class="Background-video-container">
            <video id="auto" width="100%" ; height="min(900px,30%)" autoplay muted loop>
                <source src="A Tour of Ethiopia's Amazing Landscapes.mp4" type="video/mp4">Your browser doesn't support the video
            </video>
        </div>
        <h1>Recomended places to visit</h1>


        <div class="alone-grid">
            <?php if (!empty($destinations)) : ?>
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
            <?php endif ?>
        </div>


        <h1 class="scrolle">Recomended Hotels</h1>

        <div class="alone-grid">
            <?php if (!empty($hotels)) : ?>
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
            <?php endif ?>
        </div>

        <h1>Choose Car</h1>

        <div class="alone-grid">
            <?php if (!empty($cars)) : ?>
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
            <?php endif ?>
        </div>

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
            <i class="fas fa-chevron-up"></i>
        </a>
    </div>

    <script src="../JS/homepage2.js"></script>

</body>

</html>