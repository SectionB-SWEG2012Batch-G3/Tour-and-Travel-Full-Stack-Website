<?php
include_once '../dbconfig/connection.php';
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="css/transports.css">
    <link rel="stylesheet" href="../css/footerCSS.css">
    <link rel="stylesheet" href="../css/navStyle.css">
    <link rel="stylesheet" href="../fontawesome-free-5.15.4-web/css/all.min.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>transport</title>
    <script defer src="../JS/search-boxScript.js"></script>
    <link rel="stylesheet" href="../css/HomepageCss.css">
    <link rel="stylesheet" href="../Admin/styles/css.css">
    <!-- <link rel="stylesheet" href="css/scrollCSS.css"> -->

</head>

<body id="body">
    <?php include_once '../partials/navbar.php' ?>
    <main>

        <h1 style="text-align: center; margin-top: 30px; margin-bottom: 30px;">Transportation Choices</h1>

        <h2 id="flight" style="text-align: center; margin-bottom: 30px;">Ethiopian arlines</h2>

        <div class="airlines alone-grids">
            <div class="flex">
                <div class="flex-img">

                    <img src="images/a4.jpg" alt="Ethiopian airlines" class="airline-img" style="width: 20vw;">
                </div>

                <div class="flex-text">
                    <p>
                        Ethiopian airline is one of the most trusted airlines in the world. that&apos;s why many
                        customers choose it and awarded best airlines of Africa
                        many years including this year. If you want to book click
                        <a href="ethiopianairlines.com">here</a>.

                    </p>
                </div>
            </div>
        </div>


        <?php
        $stmt = $pdo->prepare("SELECT * FROM transport WHERE category = 'alone'");
        $stmt->execute();
        $cars = $stmt->fetchAll();

        ?> <h2 style="text-align: center; margin-top: 30px; margin-bottom: 30px;" id="car">Choose your favourite car</h2>


        <h3 style="text-align: center; margin-bottom: 10px;" class="scroll" id="foralone">For alone or couple</h3>
        <?php if (!empty($cars)) : ?>
            <div class="alone-grid scroll">
                <?php foreach ($cars as $i => $car) : ?>
                    <?php
                    $stmt = $pdo->prepare("SELECT * FROM image WHERE imageFor = :id && description = :desc");
                    $stmt->bindParam(':id', $car['id']);
                    $stmt->bindParam(':desc', $car['modelName']);
                    $stmt->execute();
                    $images = $stmt->fetchAll();
                    ?>
                    <div class="alone-grid-item">
                        <div class="alone-card">
                            <div class="imc">
                                <img class="alone-card-img" src="../Admin/<?php echo $images[0]['path'] ?>" alt="<?php echo $car['modelName'] ?>">
                            </div>
                            <div class="alone-card-content">
                                <h2 class="alone-card-header"><?php echo $car['modelName'] ?></h2>
                                <p class="alone-card-text">
                                    Price <?php echo $car['price'] ?>$ <br>
                                </p>
                                <button class="alone-card-btn"><a href="car.php?id=<?php echo $car['id'] ?>">See More</a></button>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif ?>

        <?php
        $stmt = $pdo->prepare("SELECT * FROM transport WHERE category = 'family'");
        $stmt->execute();
        $cars = $stmt->fetchAll();

        ?>


        <h3 style="text-align: center; margin-bottom: 10px;" class="scroll" id="foralone">For Family</h3>
        <?php if (!empty($cars)) : ?>
            <div class="alone-grid scroll">
                <?php foreach ($cars as $i => $car) : ?>
                    <?php
                    $stmt = $pdo->prepare("SELECT * FROM image WHERE id = :id && description = :desc");
                    $stmt->bindParam(':id', $car['id']);
                    $stmt->bindParam(':desc', $car['modelName']);
                    $stmt->execute();
                    $images = $stmt->fetchAll();
                    ?>
                    <div class="alone-grid-item">
                        <div class="alone-card">
                            <div class="imc">
                                <img class="alone-card-img" src="../Admin/<?php echo $images[0]['path'] ?>" alt="<?php echo $car['modelName'] ?>">
                            </div>
                            <div class="alone-card-content">
                                <h2 class="alone-card-header"><?php echo $car['modelName'] ?></h2>
                                <p class="alone-card-text">
                                    Price <?php echo $car['price'] ?>$ <br>
                                </p>
                                <button class="alone-card-btn"><a href="car.php?id=<?php echo $car['id'] ?>">See More</a></button>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif ?>
        <?php
        $stmt = $pdo->prepare("SELECT * FROM transport WHERE category = 'group'");
        $stmt->execute();
        $cars = $stmt->fetchAll();

        ?>


        <h3 style="text-align: center; margin-bottom: 10px;" class="scroll" id="foralone">For Group</h3>
        <?php if (!empty($cars)) : ?>
            <div class="alone-grid scroll">
                <?php foreach ($cars as $i => $car) : ?>
                    <?php
                    $stmt = $pdo->prepare("SELECT * FROM image WHERE id = :id && description = :desc");
                    $stmt->bindParam(':id', $car['id']);
                    $stmt->bindParam(':desc', $car['modelName']);
                    $stmt->execute();
                    $images = $stmt->fetchAll();

                    ?>
                    <div class="alone-grid-item">
                        <div class="alone-card">
                            <div class="imc">
                                <img class="alone-card-img" src="../Admin/<?php echo $images[0]['path'] ?>" alt="<?php echo $car['modelName'] ?>">
                            </div>
                            <div class="alone-card-content">
                                <h2 class="alone-card-header"><?php echo $car['modelName'] ?></h2>
                                <p class="alone-card-text">
                                    Price <?php echo $car['price'] ?>$ <br>
                                </p>
                                <button class="alone-card-btn"><a href="car.php?id=<?php echo $car['id'] ?>">See More</a></button>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif ?>


        <h3 style="text-align: center; margin-top: 30px; margin-bottom: 30px;" class="scroll" id="forfamily">For Family
        </h3>

        <div class="alone-grid scroll">
            <div class="alone-grid-item">
                <div class="alone-card">
                    <div class="imc">
                        <img class="alone-card-img" src="images/car/family/v8/1.jpg" alt="v8">
                    </div>
                    <div class="alone-card-content">
                        <h2 class="alone-card-header">V8</h2>
                        <p class="alone-card-text">
                            Price 200$ <br>
                        </p>
                        <button class="alone-card-btn"><a href="fcar1.html">See More</a></button>
                    </div>
                </div>
            </div>

            <div class="alone-grid-item">
                <div class="alone-card">
                    <div class="imc">
                        <img class="alone-card-img" src="images/car/family/hummer/1.png" alt="hummer">
                    </div>
                    <div class="alone-card-content">
                        <h2 class="alone-card-header">Hummer</h2>
                        <p class="alone-card-text">
                            Price 170$ <br>
                        </p>
                        <button class="alone-card-btn"><a href="fcar2.html">See More</a></button>
                    </div>
                </div>
            </div>

            <div class="alone-grid-item">
                <div class="alone-card">
                    <div class="imc">
                        <img class="alone-card-img" src="images/car/family/revo/1.jpg" alt="revo">
                    </div>
                    <div class="alone-card-content">
                        <h2 class="alone-card-header">Revo</h2>
                        <p class="alone-card-text">
                            Price 150$ <br>
                        </p>
                        <button class="alone-card-btn"><a href="fcar3.html">See More</a></button>
                    </div>
                </div>
            </div>

            <div class="alone-grid-item">
                <div class="alone-card">
                    <div class="imc">
                        <img class="alone-card-img" src="images/car/family/rav4/1.jpg" alt="rav4">
                    </div>
                    <div class="alone-card-content">
                        <h2 class="alone-card-header">RAV4</h2>
                        <p class="alone-card-text">
                            Price 165$ <br>
                        </p>
                        <button class="alone-card-btn"><a href="fcar4.html">See More</a></button>
                    </div>
                </div>
            </div>
        </div>



        <h3 style="text-align: center; margin-top: 30px; margin-bottom: 30px;" class="scroll" id="forgroup">For Group
        </h3>

        <div class="alone-grid scroll">
            <div class="alone-grid-item">
                <div class="alone-card">
                    <div class="imc">
                        <img class="alone-card-img" src="images/car/group/hyndai/1.webp" alt="hyndai">
                    </div>
                    <div class="alone-card-content">
                        <h2 class="alone-card-header">Hyundai</h2>
                        <p class="alone-card-text">
                            Price 125$ <br>
                        </p>
                        <button class="alone-card-btn"><a href="gcar1.html">See More</a></button>
                    </div>
                </div>
            </div>

            <div class="alone-grid-item">
                <div class="alone-card">
                    <div class="imc">
                        <img class="alone-card-img" src="images/car/group/toyota hiace/2.jpg" alt="toyota hiace">
                    </div>
                    <div class="alone-card-content">
                        <h2 class="alone-card-header">Hiace</h2>
                        <p class="alone-card-text">
                            Price 100$ <br>
                        </p>
                        <button class="alone-card-btn"><a href="gcar2.html">See More</a></button>
                    </div>
                </div>
            </div>

            <div class="alone-grid-item">
                <div class="alone-card">
                    <div class="imc">
                        <img class="alone-card-img" src="images/car/group/tata/1.jpg" alt="tata">
                    </div>
                    <div class="alone-card-content">
                        <h2 class="alone-card-header">Tata</h2>
                        <p class="alone-card-text">
                            Price 200$ <br>
                        </p>
                        <button class="alone-card-btn"><a href="gcar3.html">See More</a></button>
                    </div>
                </div>
            </div>

            <div class="alone-grid-item">
                <div class="alone-card">
                    <div class="imc">
                        <img class="alone-card-img" src="images/car/group/toyota coaster/2.jpg" alt="toyota coaster">
                    </div>
                    <div class="alone-card-content">
                        <h2 class="alone-card-header">Coaster</h2>
                        <p class="alone-card-text">
                            Price 180$ <br>
                        </p>
                        <button class="alone-card-btn"><a href="gcar4.html">See More</a></button>
                    </div>
                </div>
            </div>
        </div>




    </main>

    <footer class="scroll" style="margin-top: 2rem;">
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
    <script src="js/transport.js"></script>


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