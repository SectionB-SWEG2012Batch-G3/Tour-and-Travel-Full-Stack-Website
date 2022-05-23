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
  <header>
      <div class="top2">
          <div class="logo" style="height: 100px;width: 125px;">
              <a href="http://localhost/Tour-and-Travel-Full-Stack-Website/homepage/index.php">
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
              <?php include_once '../partials/search_bar.php' ?>
          </div>
      </div>
      <nav>
          <label for="fa-bars-label" class="fa-bars-label" onclick="changeFont()">
              <i class="fas fa-bars"></i>
          </label>
          <input type="checkbox" id="fa-bars-label">
          <ul>
              <li><a href="http://localhost/Tour-and-Travel-Full-Stack-Website/homepage/index.php">Home</a></li>
              <li>
                  <label for="dest-label" class="show">Destinations+</label>
                  <a href="../destination/regions.php">Destinations</a>
                  <input type="checkbox" id="dest-label">
                  <?php if (!empty($destinations)) : ?>
                      <ul>
                          <?php foreach ($destinations as $i => $destination) : ?>
                              <li>
                                  <label for="<?php echo explode(' ', $destination['RegionName'])[0] ?>-label" style="margin-left: 50px;" class="show"><?php echo $destination['RegionName'] ?></label>
                                  <a href="../destination/destinations.php?id=<?php echo $destination['id'] ?>&name=<?php echo $destination['RegionName'] ?>"><?php echo $destination['RegionName'] ?></a>
                                  <input type="checkbox" id="<?php echo explode(' ', $destination['RegionName'])[0] ?>-label">
                                  <?php $sql = "SELECT places_to_visit.id as id, places_to_visit.title,places_to_visit.description,places_to_visit.mapLink, destination.id as did, destination.RegionName, destination.description as region,destination.image,destination.wikiLink,destination.video FROM places_to_visit INNER JOIN destination ON places_to_visit.region_id = destination.id WHERE places_to_visit.regionName = :regionName && region_id = :region_id LIMIT 3";
                                    $id = $destination['id'];
                                    $regName = $destination['RegionName'];
                                    $stmt = $pdo->prepare($sql);
                                    $stmt->execute([':region_id' => $id, ':regionName' => $regName]);
                                    $places = $stmt->fetchAll(); ?>
                                  <?php if (!empty($places)) : ?>
                                      <ul>
                                          <?php foreach ($places as $i => $places) : ?>
                                              <li>
                                                  <a href="../destination/destination.php?id=<?php echo $places['id'] ?>&name=<?php echo $places['title'] ?>"><?php echo $places['title'] ?></a>
                                              </li>
                                          <?php endforeach ?>

                                      </ul>
                                  <?php endif ?>
                              </li>
                          <?php endforeach ?>
                      </ul>
                  <?php endif ?>
              </li>
              <li>
                  <label for="hotel-label" class="show">Hotel+</label>
                  <a href="../hotel/hotels.php">Hotel Reservation</a>
                  <input type="checkbox" id="hotel-label">
                  <?php if (!empty($hotels)) : ?>
                      <ul>
                          <?php foreach ($hotels as $i => $hotel) : ?>
                              <li><a href="../hotel/hotel.php?id=<?php echo $hotel['id'] ?>&name=<?php echo $hotel['hotel_name'] ?>"><?php echo $hotel['hotel_name'] ?></a></li>
                          <?php endforeach ?>
                      </ul>
                  <?php endif ?>
              </li>
              <li>
                  <label for="transport-label" class="show">Transport+</label>
                  <a href="../transport/index.php">Transport</a>
                  <input type="checkbox" id="transport-label">
                  <?php if (!empty($cars)) : ?>
                      <ul>
                          <?php foreach ($cars as $i => $car) : ?>
                              <li><a href="../transport/car.php?id=<?php echo $car['id'] ?>"><?php echo $car['modelName'] ?></a></li>
                          <?php endforeach ?>
                      </ul>
                  <?php endif ?>
              </li>
              <li class="tour-guide"><a href="../tourguide/index.php">Tour Guide</a></li>
              <li class="Experience"><a href="#">Experience</a></li>
              <li class="About-us"><a href="../About us/index.php">About us</a></li>
          </ul>
      </nav>
  </header>