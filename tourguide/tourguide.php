<?php
    include_once '../dbconfig/connection.php';

    $sql = 'SELECT * FROM tourguide';
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $res = $stmt->fetchAll();
?>

<DOCTYPE html>
    <html>
     <head> 
        <meta charset = "UTF-8">
        <meta  name = "keywords" content = "tour guides, interpreter">
        <meta name = "author" content = "4HF tour and travel agency">
        <meta name = "viewport" content = "width = device-width,initial-scale = 1.0">
        <link rel="stylesheet" href="../fontawesome-free-5.15.4-web/css/all.min.css">
        <link rel="stylesheet" href="css/profileCSS.css">
        <link rel="stylesheet" href="../css/footerCSS.css">
        <link rel="stylesheet" href="../css/navStyle.css">
        <link rel="stylesheet" href="../css/HomepageCss.css">
        <script defer src="../JS/NavScript.js"></script>
        <script defer src = "js/js.js"></script>
        <script defer src = "../JS/search-boxScript.js" ></script>
        <link rel="stylesheet" href="css/style.css">
        <title>Haymnaot Demis</title>
        <style>
        a{
            cursor: pointer;
        }
            div.visibles{
                visibility: visible;
                position: static;
                display: block;
            }

            div.hiddens{
                visibility: hidden;
                position: absolute;
            }

            nav ul li a{
                text-decoration: none;
                line-height: 80px;
                font-size: 20px;
                padding: 8px 20px;
            }
            @media only screen and (max-width:760px){
                nav{
                    line-height: 80px;
                }
                nav ul li{
                    line-height: 80px;
                }
            }
            @media only screen and (max-width:600px) {
                .address-container{
                    flex-direction: column;
                    justify-content: center;
                }
                .logo{
                    display: block;
                }
                
                
                /*
                .search-bar-container{
                    display: block;
                    width: 100%;
                    position: static;
                    clear: both;
                }*/
                .address-container label{
                    text-align: center;
                }
                .input-container , .autocom-box{
                    width: 100%;
                }
                .top{
                    margin-bottom: 10px;
                }
                .search-bar-container{
                    position: static;
                    width: 95%;
                }
                .search-bar-container:hover .input-container input, .autocom-box{
                    min-width: 100%;
                }
                h1{
                    width: 100%;
                    padding: 0;
                    margin: 0;
                    font-size: 20px;
                    text-align: center;
                }
                
                .input-container{
                    position: relative;
                }
                .input-container input{
                    width: 100%;
                    margin-left: 5px;
                    padding-left: 20px;
                }
                .search-icon{
                    position: absolute;
                    top: 3px;
                    right: 3px;
                    text-align: center;
                }
            }
            @media only screen and (max-width:450px) {
                .login-container{
                    position: static;
                    float: right;
                }
                .login-container > *{
                    float: right;
                }
                
            }

            
        </style>
     </head>
     
     <body>
        <header id = "top">
            <div class="top2">
                <div class="logo" style="height: 100px;width: 125px;">
                    <a href="../Homepage.html">
                        <svg height="100" width="125">
                            <ellipse cx="62.5" cy="50" rx="55" ry="45" fill="url(#grad2)"/>
                            <polygon points="62.5,5 85,50 62.5,95 40,50" style="stroke: rgb(255, 255, 255); fill: rgba(255, 255, 0, 1);"/>
                            <text fill ="#000000" font-size="25" font-family="Verdana"
                                x="20" y="60">4</text>
                                <text fill ="#000000" font-size="25" font-family="Verdana"
                                x="52.5" y="60">H</text>
                                <text fill ="#000000" font-size="25" font-family="Verdana"
                                x="90" y="60">F</text>
                                <text fill ="#000000" font-size="13" font-family="Verdana"
                                x="20" y="80">Tour &amp; Travel</text>
                                
                            <defs>
                                <linearGradient id="grad2" x1="0%" y1="0%" x2="50%" y2="0%" x3="51%" y3="0%" x4="100%" y4="100%">
                                    <stop offset="0%" style="stop-color: rgb(0, 255, 0);stop-opacity: 1;"/>
                                    <stop offset="100%" style="stop-color: rgb(255, 255, 0);stop-opacity: 1;"/>
                                    <stop offset="100%" style="stop-color: rgb(255, 255, 0);stop-opacity: 1;"/>
                                    <stop offset="200%" style="stop-color: rgb(255, 0, 0); stop-opacity: 1;"/>
                                </linearGradient>
                            </defs>
                            
                        </svg>
                    </a>
                </div>
                <div class = "login-container">
                    <button class = "blogs" ><a href = "Tips.html" >Travel Blogs</a></button>
                    <button class = "login" style = "width:100px;"><a href = "Profiles/log in.html">Log In</a></button>    
                </div>
                <div  class = "search-bar-container">
                    <div class="input-container">
                        <input class = "searchBar" type = "Search" name = "searchBar" value = "" placeholder = "Where to go... " list = "ethiopia">
                        <a href = "#" class = "search-icon">
                            <i class="fa fa-2x fa-search" aria-hidden="true"></i>
                        </a>
                    </div>
                    
                    <div class = "autocom-box" style="margin-left: 10px;">
                        <ul>
                            <li></li>
                        </ul>
                    </div>
                </div>
            </div>
            <nav>
                <label for="fa-bars-label" class = "fa-bars-label" onclick="changeFont()">
                    <i class="fas fa-bars"></i>
                </label>
                <input type="checkbox" id = "fa-bars-label">
                <ul>
                    <li><a href="../Homepage.html">Home</a></li>
                    <li>
                        <label for="dest-label" class="show">Destinations+</label>
                        <a href="../destination/destinations.html">Destinations</a>
                        <input type="checkbox" id = "dest-label">
                        <ul>
                            <li>
                                <label for="addis-label" style = "margin-left: 50px;" class="show">Addis A.+</label>
                                <a href = "../destination/addisababa/addisababa.html">Addis Ababa</a>
                                <input type="checkbox" id = "addis-label">
                                <ul>
                                    <li><a href="../destination/addisababa/mountentoto.html">Entoto</a></li>
                                    <li><a href="../destination/addisababa/friendshippark.html">Friendshippark</a></li>
                                    <li><a href="../destination/addisababa/unitypark.html">Unity park</a></li>
                                    <li><a href="../destination/addisababa/zomamuseum.html">ZomaMuseum</a></li>
                                </ul>
                            </li>
                            <li><a href = "../destination/bahirdar/bahirdar.html">Bahdar</a></li>
                            <li><a href = "../destination/harar/harar.html">Harar</a></li>
                            <li><a href = "../destination/gonder/gonder.html">Gonder</a></li>
                            <li><a href = "../destination/afar/afar.html">Afar</a></li>
                            <li><a href = "../destination/jinka/jinka.html">Jinka</a></li>
                        </ul>
                    </li>
                    <li>
                        <label for="hotel-label" class="show">Hotel+</label>
                        <a href="../Hotel Reservation/hotel reservation.html">Hotel Reservation</a>
                        <input type="checkbox" id = "hotel-label">
                        <ul >
                            <li><a href = "../Hotel Reservation/Sheraton Addis/Sheraton Addis.html">Sharaton</a></li>
                            <li><a href = "../Hotel Reservation/Skylight/Skylight.html">Skilight</a></li>
                            <li><a href = "../Hotel Reservation/Golden Tulip/Golden Tulip.html">Golden Tulip</a></li>
                            <li><a title="Arbaminch" href = "../Hotel Reservation/Haile Resort Arba Minch/Haile Resort Arba Minch.html">Haile resort AM</a></li>
                            <li><a title="Kuriftu Bahirdar" href = "../Hotel Reservation/Kuriftu Resort Bahir Dar/Kuriftu Resort Bahir Dar.html">Kuriftu</a></li>
                            <li><a href = "../Hotel Reservation/Emerald/Emerald Lodge.html">Emerald</a></li>
                        </ul>
                    </li>
                    <li>
                        <label for="transport-label" class="show">Transport+</label> 
                        <a href="../transportation/transport.html">Transport</a>
                        <input type="checkbox" id = "transport-label">
                        <ul>
                            <li><a href = "../transportation/transport.html#forfamily">For family</a></li>
                            <li><a href = "../transportation/transport.html#foralone">For Alone</a></li>
                            <li><a href = "../transportation/transport.html#forgroup">For Group</a></li>
                        </ul>
                    </li>
                    <li class="tour-guide"><a href="#">Tour Guide</a></li>
                    <li class="Experience"><a href="#" >Experience</a></li> 
                    <li class="About-us"><a href="../About us/About us.html">About us</a></li>
                </ul>
            </nav>
           </header>
    <main>
        <?php if(!(is_null($res))):?>
            <?php foreach($res as $i => $tourguide):?>
                <div class="guy<?php echo $i + 1; ?> hiddens">
            <caption><h3>Some tour experiences view</h3></caption>
            <article>
                    <div class="vidcontain"><video width = "100%" controls><source src = "Profiles/videos/BRIDGE to ETHIOPIA Tourism 2015 - Lalibela.mp4" type  = "video/mp4"></video></div>
                    <div class="profile">
                        <h3><?php echo $tourguide['name'].' '.$tourguide['lname']; ?></h3>
                        <table class = "">
                            <tr>
                                <th >Qualification
                                </th>
                                <td>
                                <?php echo $tourguide['qualification']; ?>
                                </td>
                            </tr>
                            <tr>
                            <th>
                                Experience
                            </th>
                            <td>
                                
                                <?php echo $tourguide['experience']; ?>
                            </td>
                            </tr>
                            <tr>
                            <th>
                                Language skills
                            </th>
                            <td>
                               
                                <?php echo $tourguide['lang']; ?>
                            </td>
                            </tr>
                            <tr>
                            <th>
                                Services
                            </th>
                            <td>
                           
                             <?php echo $tourguide['services']; ?>
                
                            </td>
                            </tr>
                            <tr>
                            <th>
                                Price
                            </th>
                            <td>
                                <?php echo $tourguide['salaryPerHour']; ?>             
                            </td>
                            </tr>
                        </table>
                        <div>
                    
                            <?php echo $tourguide['resume']; ?>
                
                        </div>	
                    </div>
                    <div class="imag"><img src = "../Admin/<?php echo $tourguide['photo'] ?>" alt = "Guideing tour" width = "100%">
                        <figcaption>Semien Mountain</figcaption>
                    </div>
            </article>
            <div class = "resrv-btn">
                <div class="reserve" id="<?php echo $tourguide['name'].' '.$tourguide['lname']; ?>" title = "60">
                    <a href="tripForm.php">Assign My Tour Guide</a>
                </div>
            </div>
        </div> 
            <?php endforeach; ?>
        <?php endif; ?>

        <section class = "guide-container">
        <?php if(!(is_null($res))):?>
            <?php foreach($res as $i => $tourguide):?>
                <div class="guide">
                    <a href = "../Admin/<?php echo $tourguide['photo'] ?>"><img src = "../Admin/<?php echo $tourguide['photo'] ?>" alt = "Haymanot Demis(tour guide)"></a>
                    <a class = "guideDesc" id = "<?php echo $tourguide['name'];?>" href="#"><?php echo $tourguide['name'].' '.$tourguide['lname'];?>(Tour Guide)</a>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
        </section>
    </main>
        <footer>
            <div class="container">
                <div class="row">
                    <div class="footer-items">
                        <h4>Terms and Privacy</h4>
                        <ul id = "lists" style="color:#bbb;text-decoration: none;" >
                            <li><a href="#">Faq</a></li>
                            <li><a href="#">About us</a></li>
                            <li><a href="#">Privacy policy</a></li>
                            <li>Travel informations</li>
                        </ul>
                    </div>
                    <div class="footer-items">
                        <h4>Contacts</h4>
                        <ul id = "lists">
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
                    <div class = "copyright" style = "width:100%; text-align: center;color: white;">
                        <i>Copyright 2022 by Refsnes Data. All Rights Reserved.</i>
                     </div>
                </div>
            </div>
        </footer>
        <div class="to-top">
            <a href="#">
                <i class="fas fa-chevron-up"></i>
            </a>
        </div>
        <script>
            const toTop = document.querySelector(".to-top");
            window.addEventListener("scroll" ,() => {
                if(window.scrollY > 200){
                    toTop.classList.add("visible");
                }else{
                    toTop.classList.remove("visible");
                }
            });
        </script>
     </body>
    </html>