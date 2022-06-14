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

    $stmt = $pdo->prepare("SELECT * FROM image WHERE imageFor = :id && description = :desc LIMIT 10");
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
    <link rel="stylesheet" href="../Admin/styles/css.css">
</head>

<body id="body">
    <?php include_once '../partials/navbar.php' ?>
    <main>
        <h1><?php echo $car['modelName'] ?></h1>
        <div class="slideContainer">

            <div class="slider">
                <?php if (!empty($images)) : ?>
                    <?php foreach ($images as $i => $image) : ?>
                        <div class="slide <?php if ($i === 0) echo 'active' ?>">
                            <img src="../Admin/<?php echo $image['path'] ?>" alt="<?php echo $image['description'] ?>">
                            <div class="info">
                                <h2><?php echo $image['description'] ?></h2>
                                <p></p>
                            </div>
                        </div>
                    <?php endforeach ?>
                <?php endif ?>
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
                    <?php if (!empty($images)) : ?>
                        <?php foreach ($images as $i => $image) : ?>
                            <div class="slide-icon <?php if ($i === 0) echo 'active' ?>">
                                <svg height="20" width="30">
                                    <polygon class="slideSvg" points="1,1 29,1 29,15 1,15" style="stroke: rgb(255, 255, 255); " />
                                </svg>
                            </div>
                        <?php endforeach ?>
                    <?php endif ?>
                </div>
            </div>

        </div>

        <div class="mainBord">
            <div class="bord scroll">
                <h2 class="bord-head"><?php echo $car['modelName'] ?></h2>

                <p class="bord-text"><span style="margin-right: 20px;"><b>Price:</b></span><b><span id="price" style="display: inline;"><?php echo $car['price'] ?>$ per day</span></b></p>

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
                    <?php echo $car['description'] ?>
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
                    <button class="button"><a href="reserve.php" onclick="passValues()"> Reserve car </a></button>
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
                <?php
                $stmt = $pdo->prepare("SELECT * FROM transport ORDER BY rating LIMIT 3");
                $stmt->execute();
                $cars = $stmt->fetchAll();
                ?>
                <aside>
                    <h3>Top rated cars</h3>
                    <div class="-grid scroll">
                        <?php if (!empty($cars)) : ?>
                            <?php foreach ($cars as $i => $car) : ?>
                                <?php
                                $stmt = $pdo->prepare("SELECT * FROM image WHERE imageFor = :id && description = :desc LIMIT 1");
                                $stmt->bindParam(':id', $car['id']);
                                $stmt->bindParam(':desc', $car['modelName']);
                                $stmt->execute();
                                $image = $stmt->fetch();
                                ?>
                                <div class="-grid-item">
                                    <div class="alone-card">
                                        <div class="imc">
                                            <img class="-card-img" src="../Admin/<?php echo $image['path'] ?>" alt="<?php echo $image['description'] ?>">
                                        </div>
                                        <div class="-card-content">
                                            <h2 class="-card-header"><?php echo $car['modelName'] ?></h2>
                                            <p class="-card-text">
                                                Price <?php echo $car['price'] ?>$
                                            </p>
                                            <button class="-card-btn"><a href="car.php?id=<?php echo $car['id'] ?>">See More</a></button>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach ?>
                        <?php endif ?>
                    </div>
                </aside>
            </div>




            <div class="grid-content" id="grid3">

                <aside>
                    <?php
                    $stmt = $pdo->prepare("SELECT * FROM places_to_visit LIMIT 3");
                    $stmt->execute();
                    $places = $stmt->fetchAll();
                    ?>
                    <h3>Top Visited places</h3>

                    <div class="-grid scroll">
                        <?php if (!empty($places)) : ?>
                            <?php foreach ($places as $i => $place) : ?>
                                <?php
                                $stmt = $pdo->prepare("SELECT * FROM image WHERE imageFor = :id && description = :desc LIMIT 1");
                                $stmt->bindParam(':id', $place['id']);
                                $stmt->bindParam(':desc', $place['title']);
                                $stmt->execute();
                                $image = $stmt->fetch();
                                ?>
                                <div class="-grid-item">
                                    <div class="alone-card">
                                        <div class="imc">
                                            <img class="-card-img" src="../Admin/<?php echo $image['path'] ?>" alt="honda city">
                                        </div>
                                        <div class="-card-content">
                                            <h2 class="-card-header"><?php echo $place['title'] ?></h2>
                                            <p class="-card-text">
                                                Location <?php echo $place['regionName'] ?>
                                            </p>
                                            <button class="-card-btn"><a href="../destination/destination.php?id=<?php echo $place['id'] ?>&name=<?php echo $place['regionName'] ?>">See
                                                    More</a></button>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach ?>
                        <?php endif ?>

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