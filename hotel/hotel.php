<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="Viewport" content="width = device-width, initial-scale=1.0">
  <meta name="description" content="what to know about hotel reservation?">
  <meta name="keywords" content="hotel,rooms,bar and resturant">
  <meta name="author" content="Hamere Endale">
  <title>4HF_tour_and_travel | <?php echo $hotel['hotel_name'] ?? '' ?></title>
  <link rel="stylesheet" href="../css/footerCSS.css">
  <link rel="stylesheet" href="../css/navStyle.css">
  <link rel="stylesheet" href="../fontawesome-free-5.15.4-web/css/all.css">
  <link rel="stylesheet" type="text/css" href="css/style 1.css">
  <link rel="stylesheet" href="css/search.css">
  <link rel="stylesheet" href="../Admin/styles/css.css">
  <script defer src="../JS/NavScript.js"></script>
  <script defer src="../JS/search-boxScript.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
  <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <style>
    a {
      text-decoration: none;
      color: #bbb;
    }
  </style>
</head>

<body id="body">
  <?php include_once '../partials/navbar.php' ?>
  <?php include_once 'partials/DB_for_hotel.php' ?>
  <main>
    <h1><?php echo $hotel['region_name'] . " " . $hotel['hotel_name'] ?> Hotel</h1>

    <div class="slideContainer">

      <div class="slider">
        <?php if (!empty($images)) : ?>
          <?php foreach ($images as $i => $image) : ?>
            <div class="slide <?php if ($i == 0) echo 'active' ?>">
              <img src="../Admin/<?php echo $image['path'] ?>" alt="<?php echo $image['description'] ?>">
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

          <?php if (!empty($images)) : ?>
            <?php foreach ($images as $i => $image) : ?>
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


    <div class="tap">
      <button class="btn btn-lg btn-success"><a href="#A1"> Compound </a></button>

      <button class="btn btn-lg btn-success"><a href="#A2"> Rooms </a></button>

      <button class="btn btn-lg btn-success"><a href="#A3"> Bar and Restaurant </a></button>

    </div>
    <div class="area">
      <div class="card-group">
        <div class="col scroll">
          <?php if (!empty($images)) : ?>
            <?php foreach ($images as $i => $image) : ?>
              <div class="card m-3" style="width: 20rem;display:inline-block">
                <img height="200" width="220" src="../Admin/<?php echo $image['path'] ?>" class="card-img-top" alt="<?php echo $image['description'] ?>">
                <div class="card-body" style="display:inline-block">
                  <h5 class="card-title"><?php echo $image['description'] ?></h5>
                  <p class="card-text" style="display:inline-block"></p>
                </div>
              </div>
            <?php endforeach ?>
          <?php endif ?>
        </div>
      </div>
      <?php if (empty($images)) : ?>
        <div class="alert alert-primary m-4" role="alert">
          Empty Gallary
        </div>
      <?php endif ?>
    </div>


    <button class="btn btn-lg btn-success">
      <a href="">
        Book Now
      </a>
    </button>
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