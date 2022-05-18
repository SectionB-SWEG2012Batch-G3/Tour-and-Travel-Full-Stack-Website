<?php
try {
  include_once '../dbconfig/connection.php';
} catch (PDOException $e) {
  echo 'connection exception ' . $e->getMessage();
}
$id = '';
$hotelName = '';

if (isset($_GET['id'])) {
  $id = $_GET['id'];
}

if (isset($_GET['name'])) {
  $hotelName = $_GET['name'];
}

$stmt = $pdo->prepare("SELECT * FROM hotel WHERE id = :id");
$stmt->bindValue(':id', $id);
$stmt->execute();
$hotel = $stmt->fetch();

$stmt = $pdo->prepare("SELECT * FROM image WHERE imageFor = :id && description = :desc");
$stmt->bindValue(':id', $id);
$stmt->bindValue(':desc', $hotelName);
$stmt->execute();
$images = $stmt->fetchAll();


?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="Viewport" content="width = device-width, initial-scale=1.0">
  <meta name="description" content="what to know about hotel reservation?">
  <meta name="keywords" content="hotel,rooms,bar and resturant">
  <meta name="author" content="Hamere Endale">
  <title>Tourist</title>
  <link rel="stylesheet" href="../css/footerCSS.css">
  <link rel="stylesheet" href="../css/navStyle.css">
  <link rel="stylesheet" href="../fontawesome-free-5.15.4-web/css/all.css">
  <link rel="stylesheet" type="text/css" href="css/style 1.css">
  <link rel="stylesheet" href="css/search.css">
  <script defer src="../JS/NavScript.js"></script>
  <script defer src="../JS/search-boxScript.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
  <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
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
        <button class="login" style="width:100px;"><a href="../../tour guide/Profiles/log in.html">Log
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
        <li><a href="../../homepage.html">Home</a></li>
        <li>
          <label for="dest-label" class="show">Destinations+</label>
          <a href="../../destination/destinations.html">Destinations</a>
          <input type="checkbox" id="dest-label">
          <ul>
            <li>
              <label for="addis-label" style="margin-left: 50px;" class="show">Addis A.+</label>
              <a href="../../destination/addisababa/addisababa.html">Addis Ababa</a>
              <input type="checkbox" id="addis-label">
              <ul>
                <li><a href="../../destination/addisababa/mountentoto.html">Entoto</a></li>
                <li><a href="../../destination/addisababa/unitypark.html">Unity Park</a></li>
                <li><a href="../../destination/addisababa/friendshippark.html">Friendship Park</a></li>
                <li><a href="../../destination/addisababa/zomamuseum.html">Zoma Museum</a></li>
              </ul>
            </li>
            <li>
              <label for="Bahir-label" style="margin-left: 50px;" class="show">Bahirdar+</label>
              <a href="../../destination/bahirdar/bahirdar.html">Bahirdar</a>
              <input type="checkbox" id="Bahir-label">
              <ul>
                <li><a href="../../destination/bahirdar/laketana.html">Lake Tana</a></li>
                <li><a href="../../destination/bahirdar/azwamariam.html">Azwa Mariam</a></li>

              </ul>
            </li>


            <li><a href="../../destination/harar/harar.html">Harar</a> </li>
            <li><a href="../../destination/gonder/gonder.html">Gonder</a></li>
            <li><a href="../../destination/afar/afar.html">Afar</a></li>
            <li><a href="../../destination/jinka/jinka.html">Jinka</a></li>
          </ul>
        </li>
        <li>
          <label for="hotel-label" class="show">Hotel+</label>
          <a href="../hotel reservation.html">Hotel Reservation</a>
          <input type="checkbox" id="hotel-label">
          <ul>
            <li><a href="../Sheraton Addis/Sheraton Addis.html">Sheraton</a></li>
            <li><a href="../Skylight/Skylight.html">Skylight</a></li>
            <li><a href="../Golden Tulip/Golden Tulip.html">Golden Tulip</a></li>
            <li><a href="../Hyatt/Hyatt.html">Hyatt</a></li>
            <li><a href="../Marriott/Marriott.html">Mariott</a></li>
            <li><a href="../Emerald/Emerald Lodge.html">Emerald</a></li>
          </ul>
        </li>
        <li>
          <label for="transport-label" class="show">Transport+</label>
          <a href="../../transport.html">Transport</a>
          <input type="checkbox" id="transport-label">
          <ul>
            <li><a href="../../transport.html#forfamily">For family</a></li>
            <li><a href="../../transport.html#foralone">For Alone</a></li>
            <li><a href="../../transport.html#forgroup">For Group</a></li>
          </ul>
        </li>
        <li class="tour-guide"><a href="../../tour guide/tour guide.html">Tour Guide</a></li>
        <li class="Experience"><a href="../../homepage.html#ex">Experience</a></li>
        <li class="About-us"><a href="../../About us/About us.html">About us</a></li>
      </ul>
    </nav>
  </header>

  <main>
    <h1>Arbaminch Tourist Hotel</h1>

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
      <button class="button"><a href="#A1"> Compound </a></button>

      <button class="button"><a href="#A2"> Rooms </a></button>

      <button class="button"><a href="#A3"> Bar and Restaurant </a></button>

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
                  <p class="card-text" style="display:inline-block">Some quick example text to build</p>
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


    <button class="button">
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