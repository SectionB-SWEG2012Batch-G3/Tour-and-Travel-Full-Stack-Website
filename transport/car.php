<?php
try {
    include_once '../dbconfig/connection.php';
    $id = '';
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    }
    $stmt = $pdo->prepare("SELECT * FROM transport WHERE id = :id");
    $stmt->execute([':id' => $id]);
    $car = $stmt->fetch();

    $stmt = $pdo->prepare("SELECT * FROM image WHERE imageFor = :id && description = :desc");
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':desc', $car['modelName']);
    $stmt->execute();
    $images = $stmt->fetchAll();
} catch (PDOException $e) {
}
?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="css/acar77.css">
    <link rel="stylesheet" href="../css//footerCSS.css">
    <link rel="stylesheet" href="../css/navStyle.css">
    <meta charset="UTF-8">
    <title>Honda City</title>
    <script defer src="../JS/search-boxScript.js"></script>
    <link rel="stylesheet" href="css/search.css">
    <link rel="stylesheet" href="../fontawesome-free-5.15.4-web/css/all.min.css">
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
                    <a href="../Hotel Reservation/hotel reservation.html">Hotel Reservation</a>
                    <input type="checkbox" id="hotel-label">
                    <ul>
                        <li><a href="../Hotel Reservation/Sheraton Addis/Sheraton Addis.html">Sheraton</a></li>
                        <li><a href="../Hotel Reservation/Skylight/Skylight.html">Skylight</a></li>
                        <li><a href="../Hotel Reservation/Golden Tulip/Golden Tulip.html">Golden Tulip</a></li>
                        <li><a href="../Hotel Reservation/Hyatt/Hyatt.html">Hyatt</a></li>
                        <li><a href="../Hotel Reservation/Marriott/Marriott.html">Mariott</a></li>
                        <li><a href="../Hotel Reservation/Emerald/Emerald Lodge.html">Emerald</a></li>
                    </ul>
                </li>
                <li>
                    <label for="transport-label" class="show">Transport+</label>
                    <a href="transport.html">Transport</a>
                    <input type="checkbox" id="transport-label">
                    <ul>
                        <li><a href="transport.html#forfamily">For family</a></li>
                        <li><a href="transport.html#foralone">For Alone</a></li>
                        <li><a href="transport.html#forgroup">For Group</a></li>
                    </ul>
                </li>
                <li class="tour-guide"><a href="../tour guide/tour guide.html">Tour Guide</a></li>
                <li class="Experience"><a href="../homepage.html#ex">Experience</a></li>
                <li class="About-us"><a href="../About us/About us.html">About us</a></li>
            </ul>
        </nav>
    </header>
    <main>


        <h1><?php echo $car['modelName'] ?></h1>


        <div class="slideContainer">

            <div class="slider">
                <div class="slide active">
                    <img src="images/car/alone/honda city/1.webp" alt="Honda City">
                    <div class="info">
                        <h2></h2>
                        <p></p>
                    </div>
                </div>

                <div class="slide">
                    <img src="images/car/alone/honda city/2.webp" alt="Honda City">
                    <div class="info">
                        <h2></h2>
                        <p></p>
                    </div>
                </div>

                <div class="slide">
                    <img src="images/car/alone/honda city/3.webp" alt="Honda City">
                    <div class="info">
                        <h2></h2>
                        <p></p>
                    </div>
                </div>

                <div class="slide">
                    <img src="images/car/alone/honda city/4.webp" alt="Honda City">
                    <div class="info">
                        <h2></h2>
                        <p></p>
                    </div>
                </div>

                <div class="slide">
                    <img src="images/car/alone/honda city/5.webp" alt="Honda City">
                    <div class="info">
                        <h2></h2>
                        <p></p>
                    </div>
                </div>

                <div class="slide">
                    <img src="images/car/alone/honda city/6.webp" alt="Honda City">
                    <div class="info">
                        <h2></h2>
                        <p></p>
                    </div>
                </div>

                <div class="navigation">

                    <!-- <img src="../../star3.png" alt="star" class="prev-btn" height="50px"> -->
                    <svg height="50" width="50" class="prev-btn">


                        <polygon points="10,25 40,5 40,15 25,25 40,35 40,45 " style="stroke: rgb(255, 255, 255); fill: rgb(0, 0, 0);" />

                    </svg>
                    <svg height="50" width="50" class="next-btn">


                        <polygon points="10,5 40,25 10,45 10,35 25,25 10,15 " style="stroke: rgb(255, 255, 255); fill: rgb(0, 0, 0);" />

                    </svg>
                    <!-- <img src="../../star3.png" alt="star" class="next-btn" height="50px"> -->
                </div>
                <div class="navigation-visibility">
                    <div class="slide-icon active">
                        <svg height="20" width="30">


                            <polygon class="slideSvg" points="1,1 29,1 29,15 1,15" style="stroke: rgb(255, 255, 255); " />

                        </svg>
                    </div>
                    <div class="slide-icon">
                        <svg height="20" width="30">


                            <polygon class="slideSvg" points="1,1 29,1 29,15 1,15" style="stroke: rgb(255, 255, 255); " />

                        </svg>
                    </div>
                    <div class="slide-icon">
                        <svg height="20" width="30">


                            <polygon class="slideSvg" points="1,1 29,1 29,15 1,15" style="stroke: rgb(255, 255, 255); " />

                        </svg>
                    </div>
                    <div class="slide-icon">
                        <svg height="20" width="30">


                            <polygon class="slideSvg" points="1,1 29,1 29,15 1,15" style="stroke: rgb(255, 255, 255); " />

                        </svg>
                    </div>
                    <div class="slide-icon">
                        <svg height="20" width="30">


                            <polygon class="slideSvg" points="1,1 29,1 29,15 1,15" style="stroke: rgb(255, 255, 255); " />

                        </svg>
                    </div>
                    <div class="slide-icon">
                        <svg height="20" width="30">


                            <polygon class="slideSvg" points="1,1 29,1 29,15 1,15" style="stroke: rgb(255, 255, 255);" />

                        </svg>
                    </div>
                </div>
            </div>



        </div>

        <div class="mainBord">
            <div class="bord scroll">
                <h2 class="bord-head">Honda City Review</h2>




                <p class="bord-text"><span style="margin-right: 20px;"><b>Price:</b></span><b><span id="price" style="display: inline;">100$ per day</span></b></p>

                <!-- <h3 style="display: inline;">The rate is</h3> -->

                <div class="displayRateAll" style="display: inline;">
                    <p style="display: inline; margin-right: 1rem;" class="bord-text">Rating : <span id="rates">0</span>
                        out of 5</p>
                    <span class="displayRate" id="span1">★</span>
                    <span class="displayRate" id="span2">★</span>
                    <span class="displayRate" id="span3">★</span>
                    <span class="displayRate" id="span4">★</span>
                    <span class="displayRate" id="span5">★</span>
                </div>

                <div class="displayVotes">
                    <p class="bord-text"><span id="votes">0</span> Votes</p><br>
                    <!-- <p>Rating : <span id="rates">0</span> out of 5</p> -->
                </div>
                <!-- <meter value="4.3" min="0" max="5">4.3 out of 5</meter> -->
                <div class="bord-text">
                    Body Type Sedan<br>
                    Total Seating 5<br>
                    Automatic Climate Control<br>
                    Fuel Type Diesel Engine<br>
                    Passenger Airbag<br>
                    No. of cylinder 4<br>
                    Air Conditioner<br>
                </div>

                <div class="rate-car" style="display: inline;">
                    <p style="display: inline; float: left; margin-left: 25%;" class="bord-text">Rate the car</p>
                    <div class="rate">
                        <input type="radio" id="star5" name="rate" value="5" onclick="countAndDisplay(this.value)" />
                        <label for="star5" title="text">5 stars</label>
                        <input type="radio" id="star4" value="4" name="rate" value="4" onclick="countAndDisplay(this.value)" />
                        <label for="star4" title="text">4 stars</label>
                        <input type="radio" id="star3" value="3" name="rate" value="3" onclick="countAndDisplay(this.value)" />
                        <label for="star3" title="text">3 stars</label>
                        <input type="radio" id="star2" value="2" name="rate" value="2" onclick="countAndDisplay(this.value)" />
                        <label for="star2" title="text">2 stars</label>
                        <input type="radio" id="star1" value="1" name="rate" value="1" onclick="countAndDisplay(this.value)" />
                        <label for="star1" title="text">1 star</label>
                    </div>

                </div>

                <div>
                    <button class="button"><a href="reserve.html" onclick="passValues()"> Reserve car </a></button>
                </div>

            </div>

            <div class="comment scroll">
                <h2>Comment about car</h2>
                <div class="commentInside">
                    <img src="css/person1.jpg" alt="person">
                    <p class="bord-text">I used this car and it is very wise choice to choose this car.
                        it have good comfort and height from ground. you should really
                        try it at least once.
                    </p>
                </div>
                <div class="leaveComment">
                    <h2>Leave Your comment</h2>
                    <form>
                        <textarea name="message" rows="10" placeholder="Leave your comment about the car." id="textArea"></textarea>
                    </form>
                </div>
                <div>
                    <button class="button"><a href=""> Submit </a></button>
                </div>
            </div>

        </div>




        <div class="grid">

            <div class="grid-content" style="margin-top: 30px" id="grid1">

                <aside>
                    <h3>Top rated cars</h3>
                    <div class="-grid scroll">
                        <div class="-grid-item">
                            <div class="alone-card">
                                <div class="imc">
                                    <img class="-card-img" src="images/car/alone/honda city/1.webp" alt="honda city">
                                </div>
                                <div class="-card-content">
                                    <h2 class="-card-header">Honda City</h2>
                                    <p class="-card-text">
                                        Price 100$
                                    </p>
                                    <button class="-card-btn"><a href="acar1.html">See More</a></button>
                                </div>
                            </div>
                        </div>

                        <div class="-grid-item">
                            <div class="-card">
                                <div class="imc">
                                    <img class="-card-img" src="images/car/family/v8/1.jpg" alt="toyota sedan">
                                </div>
                                <div class="-card-content">
                                    <h2 class="-card-header">V8</h2>
                                    <p class="-card-text">
                                        Price 200$
                                    </p>
                                    <button class="-card-btn"><a href="fcar1.html">See More</a></button>
                                </div>
                            </div>
                        </div>

                        <div class="-grid-item">
                            <div class="-card">
                                <div class="imc">
                                    <img class="-card-img" src="images/car/group/hyndai/1.webp" alt="vitz">
                                </div>
                                <div class="-card-content">
                                    <h2 class="-card-header">Hyundai</h2>
                                    <p class="-card-text">
                                        Price 125$
                                    </p>
                                    <button class="-card-btn"><a href="gcar1.html">See More</a></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </aside>
            </div>




            <div class="grid-content" id="grid3">

                <aside>
                    <h3>Top Visited places</h3>
                    <div class="-grid scroll">
                        <div class="-grid-item">
                            <div class="alone-card">
                                <div class="imc">
                                    <img class="-card-img" src="../destination/addisababa/images/unity3.jpg" alt="honda city">
                                </div>
                                <div class="-card-content">
                                    <h2 class="-card-header">Unity Park</h2>
                                    <p class="-card-text">
                                        Location Addis Ababa
                                    </p>
                                    <button class="-card-btn"><a href="../destination/addisababa/unitypark.html">See
                                            More</a></button>
                                </div>
                            </div>
                        </div>

                        <div class="-grid-item">
                            <div class="-card">
                                <div class="imc">
                                    <img class="-card-img" src="../destination/arbaminch/images/nechsar2.jpg" alt="toyota sedan">
                                </div>
                                <div class="-card-content">
                                    <h2 class="-card-header">Nechisar</h2>
                                    <p class="-card-text">
                                        Location Arbaminch
                                    </p>
                                    <button class="-card-btn"><a href="../destination/arbaminch/nechsar.html">See
                                            More</a></button>
                                </div>
                            </div>
                        </div>

                        <div class="-grid-item">
                            <div class="-card">
                                <div class="imc">
                                    <img class="-card-img" src="../destination/jinka/images/omonationalpark3.png" alt="vitz">
                                </div>
                                <div class="-card-content">
                                    <h2 class="-card-header">Omo National Park</h2>
                                    <p class="-card-text">
                                        Location Jinka
                                    </p>
                                    <button class="-card-btn"><a href="../destination/jinka/omonationalpark.html">See
                                            More</a></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </aside>
            </div>


        </div>

    </main>

    <footer class="scroll">
        <div class="container scroll">
            <div class="row">
                <div class="footer-items">
                    <h4>Terms and Privacy</h4>
                    <ul id="lists" style="color:#bbb;text-decoration: none;">
                        <li><a href="#">Faq</a></li>
                        <li><a href="../About us/About us.html">About us</a></li>
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


    <script src="js/hondaCity.js"></script>
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