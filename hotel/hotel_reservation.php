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
                        <polygon points="62.5,5 85,50 62.5,95 40,50"
                            style="stroke: rgb(255, 255, 255); fill: rgba(255, 255, 0, 1);" />
                        <text fill="#000000" font-size="25" font-family="Verdana" x="20" y="60">4</text>
                        <text fill="#000000" font-size="25" font-family="Verdana" x="52.5" y="60">H</text>
                        <text fill="#000000" font-size="25" font-family="Verdana" x="90" y="60">F</text>
                        <text fill="#000000" font-size="13" font-family="Verdana" x="20" y="80">Tour &amp; Travel</text>

                        <defs>
                            <linearGradient id="grad2" x1="0%" y1="0%" x2="50%" y2="0%" x3="51%" y3="0%" x4="100%"
                                y4="100%">
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
                    <input class="searchBar" type="Search" name="searchBar" value="" placeholder="Where to go... "
                        list="ethiopia">
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
                <div class="slide active">
                    <img src="image/addisskylight1.jpg" alt="Skylight Hotel">
                    <div class="info">
                        <h2>Skylight Hotel</h2>
                        <p></p>
                    </div>
                </div>

                <div class="slide">
                    <img src="image/arbadorze.jpg" alt="Dorze Lodge">
                    <div class="info">
                        <h2>Dorze Lodge</h2>
                        <p></p>
                    </div>
                </div>

                <div class="slide">
                    <img src="image/axumremhai.jpg" alt="Remhai Hotel">
                    <div class="info">
                        <h2>Remhai Hotel</h2>
                        <p></p>
                    </div>
                </div>

                <div class="slide">
                    <img src="image/afardini.jpg" alt="Dini Hotel">
                    <div class="info">
                        <h2>Dini Hotel</h2>
                        <p></p>
                    </div>
                </div>

                <div class="slide">
                    <img src="image/bahirdarblue.jpg" alt="Blue Nile Hotel">
                    <div class="info">
                        <h2>Blue Nile Hotel</h2>
                        <p></p>
                    </div>
                </div>

                <div class="slide">
                    <img src="image/gonderhaile.jpg" alt="Haile Resort Gonder">
                    <div class="info">
                        <h2>Haile Resort Gonder</h2>
                        <p></p>
                    </div>
                </div>

                <div class="slide">
                    <img src="image/harargrand.jpg" alt="Grand Gato Hotel">
                    <div class="info">
                        <h2>Grand Gato Hotel</h2>
                        <p></p>
                    </div>
                </div>

                <div class="slide">
                    <img src="image/lalibelamount5.jpg" alt="Mountain View Hotel">
                    <div class="info">
                        <h2>Mountain View Hotel</h2>
                        <p></p>
                    </div>
                </div>

                <div class="slide">
                    <img src="image/jinkajinka.jpg" alt="Jinka Resort">
                    <div class="info">
                        <h2>Jinka Resort</h2>
                        <p></p>
                    </div>
                </div>

                <div class="navigation">

                    <svg height="50" width="50" class="prev-btn">
                        <polygon points="10,25 40,5 40,15 25,25 40,35 40,45 "
                            style="stroke: rgb(255, 255, 255); fill: rgb(0, 0, 0);" />
                    </svg>
                    <svg height="50" width="50" class="next-btn">
                        <polygon points="10,5 40,25 10,45 10,35 25,25 10,15 "
                            style="stroke: rgb(255, 255, 255); fill: rgb(0, 0, 0);" />
                    </svg>
                </div>
                <div class="navigation-visibility">
                    <div class="slide-icon active">
                        <svg height="20" width="30">
                            <polygon class="slideSvg" points="1,1 29,1 29,15 1,15"
                                style="stroke: rgb(255, 255, 255); " />
                        </svg>
                    </div>
                    <div class="slide-icon">
                        <svg height="20" width="30">
                            <polygon class="slideSvg" points="1,1 29,1 29,15 1,15"
                                style="stroke: rgb(255, 255, 255); " />
                        </svg>
                    </div>
                    <div class="slide-icon">
                        <svg height="20" width="30">
                            <polygon class="slideSvg" points="1,1 29,1 29,15 1,15"
                                style="stroke: rgb(255, 255, 255); " />
                        </svg>
                    </div>
                    <div class="slide-icon">
                        <svg height="20" width="30">
                            <polygon class="slideSvg" points="1,1 29,1 29,15 1,15"
                                style="stroke: rgb(255, 255, 255); " />
                        </svg>
                    </div>
                    <div class="slide-icon">
                        <svg height="20" width="30">
                            <polygon class="slideSvg" points="1,1 29,1 29,15 1,15"
                                style="stroke: rgb(255, 255, 255); " />
                        </svg>
                    </div>
                    <div class="slide-icon">
                        <svg height="20" width="30">
                            <polygon class="slideSvg" points="1,1 29,1 29,15 1,15"
                                style="stroke: rgb(255, 255, 255);" />
                        </svg>
                    </div>
                    <div class="slide-icon">
                        <svg height="20" width="30">
                            <polygon class="slideSvg" points="1,1 29,1 29,15 1,15"
                                style="stroke: rgb(255, 255, 255); " />
                        </svg>
                    </div>
                    <div class="slide-icon">
                        <svg height="20" width="30">
                            <polygon class="slideSvg" points="1,1 29,1 29,15 1,15"
                                style="stroke: rgb(255, 255, 255); " />
                        </svg>
                    </div>
                    <div class="slide-icon">
                        <svg height="20" width="30">
                            <polygon class="slideSvg" points="1,1 29,1 29,15 1,15"
                                style="stroke: rgb(255, 255, 255); " />
                        </svg>
                    </div>
                </div>
            </div>

        </div>


        <div class="tap">
            <button class="button"><a href="#addisAbeba"> Addis Ababa </a></button>

            <button class="button"><a href="#arbaMinch"> Arbaminch </a></button>

            <button class="button"><a href="#axum"> Axum </a></button>

            <button class="button"><a href="#afar"> Afar </a></button>

            <button class="button"><a href="#bahirdar"> Bahirdar </a></button>

            <button class="button"><a href="#gonder"> Gonder </a></button>

            <button class="button"><a href="#harer"> Harer </a></button>

            <button class="button"><a href="#lalibela"> Lalibela </a></button>

            <button class="button"><a href="#jinka"> Jinka </a></button>

        </div>


        <h2 class="area scroll" id="addisAbeba">Addis Ababa</h2>
        <div class="alone-grid">

            <div class="alone-grid-item scroll">
                <div class="alone-card">
                    <div class="imc">
                        <img class="alone-card-img" src="image/sheratonaddis.jpg" alt="Sheraton addis">
                    </div>
                    <div class="alone-card-content">
                        <h2 class="alone-card-header">Sheraton Addis</h2>
                        <p class="alone-card-text">
                            Price range:$314-$497 <br>
                            Rating:<span class="yellowStar">★★★★★</span><span class="greyStar"></span>
                        </p>
                        <button class="alone-card-btn"><a href="Sheraton Addis/Sheraton Addis.html">See
                                More</a></button>
                    </div>
                </div>
            </div>

            <div class="alone-grid-item scroll">
                <div class="alone-card">
                    <div class="imc">
                        <img class="alone-card-img" src="image/addisgold4.jpg" alt="Golden Tulip">
                    </div>
                    <div class="alone-card-content">
                        <h2 class="alone-card-header">Golden Tulip</h2>
                        <p class="alone-card-text">
                            Price range:$140-$349 <br>
                            Rating:<span class="yellowStar">★★★★★</span><span class="greyStar"></span>
                        </p>
                        <button class="alone-card-btn"><a href="Golden Tulip/Golden Tulip.html">See More</a></button>
                    </div>
                </div>
            </div>

            <div class="alone-grid-item scroll">
                <div class="alone-card">
                    <div class="imc">
                        <img class="alone-card-img" src="image/addismarriott.jpg" alt="Marriott Executive Apartments">
                    </div>
                    <div class="alone-card-content">
                        <h2 class="alone-card-header">Marriott Executive</h2>
                        <p class="alone-card-text">
                            Price range:$216-$400 <br>
                            Rating:<span class="yellowStar">★★★★★</span><span class="greyStar"></span>
                        </p>
                        <button class="alone-card-btn"><a href="Marriott/Marriott.html">See More</a></button>
                    </div>
                </div>
            </div>

            <div class="alone-grid-item scroll">
                <div class="alone-card">
                    <div class="imc">
                        <img class="alone-card-img" src="image/addisradisson5.jpg" alt="Radisson Blue Hotel">
                    </div>
                    <div class="alone-card-content">
                        <h2 class="alone-card-header">Radisson Blue Hotel</h2>
                        <p class="alone-card-text">
                            Price range:$185-$576 <br>
                            Rating:<span class="yellowStar">★★★★★</span><span class="greyStar"></span>
                        </p>
                        <button class="alone-card-btn"><a href="Radisson/Radisson Blue.html">See More</a></button>
                    </div>
                </div>
            </div>

            <div class="alone-grid-item scroll">
                <div class="alone-card">
                    <div class="imc">
                        <img class="alone-card-img" src="image/addisskylight1.jpg" alt="Skylight Hotel">
                    </div>
                    <div class="alone-card-content">
                        <h2 class="alone-card-header">Skylight Hotel</h2>
                        <p class="alone-card-text">
                            Price range:$214-$679 <br>
                            Rating:<span class="yellowStar">★★★★★</span><span class="greyStar"></span>
                        </p>
                        <button class="alone-card-btn"><a href="Skylight/Skylight.html">See More</a></button>
                    </div>
                </div>
            </div>

            <div class="alone-grid-item scroll">
                <div class="alone-card">
                    <div class="imc">
                        <img class="alone-card-img" src="image/addishyatt.jpg" alt="Hyatt Regency Hotel">
                    </div>
                    <div class="alone-card-content">
                        <h2 class="alone-card-header">Hyatt Regency Hotel</h2>
                        <p class="alone-card-text">
                            Price range:$200-$500 <br>
                            Rating:<span class="yellowStar">★★★★★</span><span class="greyStar"></span>
                        </p>
                        <button class="alone-card-btn"><a href="Hyatt/Hyatt.html">See More</a></button>
                    </div>
                </div>
            </div>

        </div>


        <h2 class="area scroll" id="arbaMinch">Arba Minch</h2>
        <div class="alone-grid">

            <div class="alone-grid-item scroll">
                <div class="alone-card">
                    <div class="imc">
                        <img class="alone-card-img" src="image/arbahaile.jpg" alt="Haile Resort Arba Minch">
                    </div>
                    <div class="alone-card-content">
                        <h2 class="alone-card-header">Haile Resort Arba Minch</h2>
                        <p class="alone-card-text">
                            price range:$300-$500
                            Rating:<span class="yellowStar">★★★★</span><span class="greyStar">★</span>
                        </p>
                        <button class="alone-card-btn"><a
                                href="Haile Resort Arba Minch/Haile Resort Arba Minch.html">See More</a></button>
                    </div>
                </div>
            </div>

            <div class="alone-grid-item scroll">
                <div class="alone-card">
                    <div class="imc">
                        <img class="alone-card-img" src="image/arbaparadise.jpg" alt="Paradise Lodge Arba Minch">
                    </div>
                    <div class="alone-card-content">
                        <h2 class="alone-card-header">Paradise Lodge Arbaminch</h2>
                        <p class="alone-card-text">
                            price range:$214-$679
                            Rating:<span class="yellowStar">★★★★</span><span class="greyStar">★</span>
                        </p>
                        <button class="alone-card-btn"><a href="Paradise/Paradise Lodge.html">See More</a></button>
                    </div>
                </div>
            </div>

            <div class="alone-grid-item scroll">
                <div class="alone-card">
                    <div class="imc">
                        <img class="alone-card-img" src="image/arbaemerald8.jpg" alt="Emerald Lodge">
                    </div>
                    <div class="alone-card-content">
                        <h2 class="alone-card-header">Emerald Lodge</h2>
                        <p class="alone-card-text">
                            price range:$214-$579
                            Rating:<span class="yellowStar">★★★★</span><span class="greyStar">★</span>
                        </p>
                        <button class="alone-card-btn"><a href="Emerald/Emerald Lodge.html">See More</a></button>
                    </div>
                </div>
            </div>

            <div class="alone-grid-item scroll">
                <div class="alone-card">
                    <div class="imc">
                        <img class="alone-card-img" src="image/arbatourist4.jpg" alt="Arba Minch Tourist Hotel">
                    </div>
                    <div class="alone-card-content">
                        <h2 class="alone-card-header">Arbaminch Tourist Hotel</h2>
                        <p class="alone-card-text">
                            price range:$314-$497
                            Rating:<span class="yellowStar">★★★★★</span><span class="greyStar"></span>
                        </p>
                        <button class="alone-card-btn"><a href="Arba Minch Tourist/Tourist.html">See More</a></button>
                    </div>
                </div>
            </div>

            <div class="alone-grid-item scroll">
                <div class="alone-card">
                    <div class="imc">
                        <img class="alone-card-img" src="image/arbaforty33.jpg" alt="Forty Spring Hotel">
                    </div>
                    <div class="alone-card-content">
                        <h2 class="alone-card-header">Forty Spring Hotel</h2>
                        <p class="alone-card-text">
                            price range:$114-$397
                            Rating:<span class="yellowStar">★★★</span><span class="greyStar">★★</span>
                        </p>
                        <button class="alone-card-btn"><a href="Forty Spring/Forty Spring.html">See More</a></button>
                    </div>
                </div>
            </div>

            <div class="alone-grid-item scroll">
                <div class="alone-card">
                    <div class="imc">
                        <img class="alone-card-img" src="image/arbadorze.jpg" alt="Dorze Lodge">
                    </div>
                    <div class="alone-card-content">
                        <h2 class="alone-card-header">Dorze Lodge</h2>
                        <p class="alone-card-text">
                            price range:$114-$297
                            Rating:<span class="yellowStar">★★</span><span class="greyStar">★★★</span>
                        </p>
                        <button class="alone-card-btn"><a href="Dorze/Dorze.html">See More</a></button>
                    </div>
                </div>
            </div>
        </div>

        <h2 class="scroll" id="axum">Axum</h2>
        <div class="alone-grid">

            <div class="alone-grid-item scroll">
                <div class="alone-card">
                    <div class="imc">
                        <img class="alone-card-img" src="image/axumyeha.jpg" alt="Yeha Hotel">
                    </div>
                    <div class="alone-card-content">
                        <h2 class="alone-card-header">Yeha Hotel</h2>
                        <p class="alone-card-text">
                            price range:$64-$297
                            Rating:<span class="yellowStar">★★</span><span class="greyStar">★★★</span>
                        </p>
                        <button class="alone-card-btn"><a href="Yeha/Yeha.html">See More</a></button>
                    </div>
                </div>
            </div>

            <div class="alone-grid-item scroll">
                <div class="alone-card">
                    <div class="imc">
                        <img class="alone-card-img" src="image/axumyered.jpg" alt="Yered Zema International Hotel">
                    </div>
                    <div class="alone-card-content">
                        <h2 class="alone-card-header">Yered Zema Hotel</h2>
                        <p class="alone-card-text">
                            price range:$44-$297
                            Rating:<span class="yellowStar">★★</span><span class="greyStar">★★★</span>
                        </p>
                        <button class="alone-card-btn"><a href="Yered Zema/Yered.html">See More</a></button>
                    </div>
                </div>
            </div>

            <div class="alone-grid-item scroll">
                <div class="alone-card">
                    <div class="imc">
                        <img class="alone-card-img" src="image/axumremhai.jpg" alt="Remhai Hotel">
                    </div>
                    <div class="alone-card-content">
                        <h2 class="alone-card-header">Remhai Hotel</h2>
                        <p class="alone-card-text">
                            price range:$84-$297
                            Rating:<span class="yellowStar">★★★</span><span class="greyStar">★★</span>
                        </p>
                        <button class="alone-card-btn"><a href="Remhai/remhai.html">See More</a></button>
                    </div>
                </div>
            </div>
        </div>

        <h2 class="area scroll" id="afar">Afar</h2>
        <div class="alone-grid">

            <div class="alone-grid-item scroll">
                <div class="alone-card">
                    <div class="imc">
                        <img class="alone-card-img" src="image/afarkuriftu.jpg" alt="Kuriftu Resort Afar">
                    </div>
                    <div class="alone-card-content">
                        <h2 class="alone-card-header">Kuriftu Resort Afar</h2>
                        <p class="alone-card-text">
                            price range:$194-$197
                            Rating:<span class="yellowStar">★★★</span><span class="greyStar">★★</span>
                        </p>
                        <button class="alone-card-btn"><a href="Kuriftu Resort Afar/Kuriftu Resort Afar.html">See
                                More</a></button>
                    </div>
                </div>
            </div>

            <div class="alone-grid-item scroll">
                <div class="alone-card">
                    <div class="imc">
                        <img class="alone-card-img" src="image/afardini.jpg" alt="Dini Hotel">
                    </div>
                    <div class="alone-card-content">
                        <h2 class="alone-card-header">Dini Hotel</h2>
                        <p class="alone-card-text">
                            price range:$64-$197
                            Rating:<span class="yellowStar">★★</span><span class="greyStar">★★★</span>
                        </p>
                        <button class="alone-card-btn"><a href="Dini/Dini.html">See More</a></button>
                    </div>
                </div>
            </div>

            <div class="alone-grid-item scroll">
                <div class="alone-card">
                    <div class="imc">
                        <img class="alone-card-img" src="image/afargenet3.jpg" alt="Genet Hotel">
                    </div>
                    <div class="alone-card-content">
                        <h2 class="alone-card-header">Genet Hotel</h2>
                        <p class="alone-card-text">
                            price range:$54-$197
                            Rating:<span class="yellowStar">★★</span><span class="greyStar">★★★</span>
                        </p>
                        <button class="alone-card-btn"><a href="Genet/Genet.html">See More</a></button>
                    </div>
                </div>
            </div>
        </div>

        <h2 class="area scroll" id="bahirdar">Bahirdar</h2>
        <div class="alone-grid" style="max-width: 70%; margin-left: 15%;">

            <div class="alone-grid-item scroll">
                <div class="alone-card">
                    <div class="imc">
                        <img class="alone-card-img" src="image/bahirdarkuriftu3.jpg" alt="Kuriftu Resort Bahir Dar">
                    </div>
                    <div class="alone-card-content">
                        <h2 class="alone-card-header">Kuriftu Resort Bahir Dar</h2>
                        <p class="alone-card-text">
                            price range:$114-$297
                            Rating:<span class="yellowStar">★★★★</span><span class="greyStar">★</span>
                        </p>
                        <button class="alone-card-btn"><a
                                href="Kuriftu Resort Bahir Dar/Kuriftu Resort Bahir Dar.html">See More</a></button>
                    </div>
                </div>
            </div>

            <div class="alone-grid-item scroll">
                <div class="alone-card">
                    <div class="imc">
                        <img class="alone-card-img" src="image/bahirdarblue.jpg" alt="Blue Nile Hotel">
                    </div>
                    <div class="alone-card-content">
                        <h2 class="alone-card-header">Blue Nile Hotel</h2>
                        <p class="alone-card-text">
                            price range:$84-$107
                            Rating:<span class="yellowStar">★★★</span><span class="greyStar">★★</span>
                        </p>
                        <button class="alone-card-btn"><a href="Blue Nile/Blue Nile.html">See More</a></button>
                    </div>
                </div>
            </div>
        </div>

        <h2 class="area scroll" id="gonder">Gonder</h2>
        <div class="alone-grid" style="max-width: 70%; margin-left: 15%;">

            <div class="alone-grid-item scroll">
                <div class="alone-card">
                    <div class="imc">
                        <img class="alone-card-img" src="image/gonderhaile.jpg" alt="Haile Resort Gonder">
                    </div>
                    <div class="alone-card-content">
                        <h2 class="alone-card-header">Haile Resort Gonder</h2>
                        <p class="alone-card-text">
                            price range:$214-$497
                            Rating:<span class="yellowStar">★★★★</span><span class="greyStar">★</span>
                        </p>
                        <button class="alone-card-btn"><a href="Haile Resort Gonder/Haile Resort Gonder.html">See
                                More</a></button>
                    </div>
                </div>
            </div>

            <div class="alone-grid-item scroll">
                <div class="alone-card">
                    <div class="imc">
                        <img class="alone-card-img" src="image/gonderzobel3.jpg" alt="Zobel Resort">
                    </div>
                    <div class="alone-card-content">
                        <h2 class="alone-card-header">Zobel Resort</h2>
                        <p class="alone-card-text">
                            price range:$94-$297
                            Rating:<span class="yellowStar">★★★</span><span class="greyStar">★★</span>
                        </p>
                        <button class="alone-card-btn"><a href="Zobel Resort/Zobel Resort.html">See More</a></button>
                    </div>
                </div>
            </div>
        </div>

        <h2 class="area scroll" id="harer">Harer</h2>
        <div class="alone-grid" style="max-width: 70%; margin-left: 15%;">

            <div class="alone-grid-item scroll">
                <div class="alone-card">
                    <div class="imc">
                        <img class="alone-card-img" src="image/hararsumeya.jpg" alt="Sumeya Hotel">
                    </div>
                    <div class="alone-card-content">
                        <h2 class="alone-card-header">Sumeya Hotel</h2>
                        <p class="alone-card-text">
                            price range:$64-$150
                            Rating:<span class="yellowStar">★★</span><span class="greyStar">★★★</span>
                        </p>
                        <button class="alone-card-btn"><a href="Sumeya/Sumeya.html">See More</a></button>
                    </div>
                </div>
            </div>

            <div class="alone-grid-item scroll">
                <div class="alone-card">
                    <div class="imc">
                        <img class="alone-card-img" src="image/harargrand.jpg" alt="Grand Gato Hotel">
                    </div>
                    <div class="alone-card-content">
                        <h2 class="alone-card-header">Grand Gato Hotel</h2>
                        <p class="alone-card-text">
                            price range:$44-$130
                            Rating:<span class="yellowStar">★★</span><span class="greyStar">★★★</span>
                        </p>
                        <button class="alone-card-btn"><a href="Grand Gato/Grand Gato.html">See More</a></button>
                    </div>
                </div>
            </div>
        </div>

        <h2 class="area scroll" id="lalibela">Lalibela</h2>
        <div class="alone-grid" style="max-width: 70%; margin-left: 15%;">

            <div class="alone-grid-item scroll">
                <div class="alone-card">
                    <div class="imc">
                        <img class="alone-card-img" src="image/lalibelamount5.jpg" alt="Mountain View Hotel">
                    </div>
                    <div class="alone-card-content">
                        <h2 class="alone-card-header">Mountain View Hotel</h2>
                        <p class="alone-card-text">
                            price range:$100-$250
                            Rating:<span class="yellowStar">★★★★</span><span class="greyStar">★</span>
                        </p>
                        <button class="alone-card-btn"><a href="Mountain View/Mountain View.html">See More</a></button>
                    </div>
                </div>
            </div>

            <div class="alone-grid-item scroll">
                <div class="alone-card">
                    <div class="imc">
                        <img class="alone-card-img" src="image/lalibelamaribela1.jpg" alt="Maribela Hotel">
                    </div>
                    <div class="alone-card-content">
                        <h2 class="alone-card-header">Maribela Hotel</h2>
                        <p class="alone-card-text">
                            price range:$89-$190
                            Rating:<span class="yellowStar">★★</span><span class="greyStar">★★★</span>
                        </p>
                        <button class="alone-card-btn"><a href="Maribela/Maribela.html">See More</a></button>
                    </div>
                </div>
            </div>
        </div>

        <h2 class="area scroll" id="jinka">Jinka</h2>
        <div class="alone-grid">

            <div class="alone-grid-item scroll" style="max-width: 35%; justify-self: center;">
                <div class="alone-card">
                    <div class="imc">
                        <img class="alone-card-img" src="image/jinkajinka.jpg" alt="Jinka Resort">
                    </div>
                    <div class="alone-card-content">
                        <h2 class="alone-card-header">Jinka Resort</h2>
                        <p class="alone-card-text">
                            price range:$50-$150
                            Rating:<span class="yellowStar">★</span><span class="greyStar">★★★★</span>
                        </p>
                        <button class="alone-card-btn"><a href="Jinka Resort/Jinka Resort.html">See More</a></button>
                    </div>
                </div>
            </div>
        </div>



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