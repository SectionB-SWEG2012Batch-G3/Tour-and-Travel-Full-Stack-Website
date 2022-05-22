<!DOCTYPE html>
<html>

<head>
	<title>4HF Tour & Travels| <?php echo $regName ?></title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="places to visit in Addis ababa">
	<meta name="keywords" content="entoto, unity park,sheger park, zoma museum">
	<link rel="stylesheet" type="text/css" href="css/styles.css">
	<link rel="stylesheet" href="../css/footerCSS.css">
	<link rel="stylesheet" href="../css/navStyle.css">
	<link rel="stylesheet" href="../css/HomepageCss.css">
	<!-- <link rel="stylesheet" href="css/hotelsCSS.css"> -->
	<script defer src="../JS/NavScript.js"></script>
	<script defer src="../JS/search-boxScript.js"></script>
	<link rel="stylesheet" href="../fontawesome-free-5.15.4-web/css/all.min.css">
</head>

<body id="body">
	<?php include_once '../partials/navbar.php' ?>
	<?php include_once 'partials/DB_for_destinaions.php' ?>
	<main>

		<h1><?php echo $regName ?></h1>
		<div class="slideContainer">

			<div class="slider">


				<?php if (!empty($places)) : ?>
					<?php foreach ($places as $i => $place) : ?>
						<div class="slide <?php if ($i === 0) echo 'active' ?>">
							<?php
							$sql = "SELECT * FROM image WHERE imageFor = :for LIMIT 1";
							$stmt = $pdo->prepare($sql);
							$stmt->execute([':for' => $place['id']]);
							$image = $stmt->fetch();
							?>
							<img src="../Admin/<?php echo $image['path'] ?>" alt="<?php echo $image['description'] ?>">
							<div class="info">
								<h2><?php echo $place['title'] ?></h2>
								<p><?php echo $image['description'] ?></p>
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

				<?php if (!empty($places)) : ?>
					<div class="navigation-visibility">
						<?php foreach ($places as $i => $place) : ?>
							<div class="slide-icon <?php if ($i === 0) echo 'active' ?>">
								<svg height="20" width="30">
									<polygon class="slideSvg" points="1,1 29,1 29,15 1,15" style="stroke: rgb(255, 255, 255); " />
								</svg>
							</div>
						<?php endforeach ?>
					</div>
				<?php endif ?>

			</div>



		</div>

		<div class="mainParagraph scroll">
			<p>
				<?php
				echo $destination['description']
				?>
			<div class="tap">
				<button class="button"><a class="tap-here" href="<?php $places[0]['wikiLink'] ?? '' ?>" target="_blank"> Tap Here </a></button> to read More about Addis Ababa.
			</div>
			</p>
		</div>



		<h2 class="scroll">Places To Visit in <?php $places[0]['regionName'] ?? '' ?></h2>
		<div class="alone-grid">
			<?php if (!empty($places)) : ?>
				<?php foreach ($places as $i => $place) : ?>
					<div class="alone-grid-item scroll">
						<div class="alone-card">
							<div class="imc">
								<?php
								$sql = "SELECT * FROM image WHERE imageFor = :for LIMIT 1";
								$stmt = $pdo->prepare($sql);
								$stmt->execute([':for' => $place['id']]);
								$image = $stmt->fetch();
								?>
								<img class="alone-card-img" src="../Admin/<?php echo $image['path'] ?>" alt="<?php echo $image['description'] ?>">
							</div>
							<div class="alone-card-content">
								<h2 class="alone-card-header"><?php echo $place['title'] ?></h2>
								<p class="alone-card-text">
									<?php echo explode('.', $place['description'])[0] ?>
								</p>
								<button class="alone-card-btn"><a href="destination.php?id=<?php echo $place['id'] ?>&name=<?php echo $place['title'] ?>">See More</a></button>
							</div>
						</div>
					</div>
				<?php endforeach ?>
			<?php endif ?>
		</div>


		<div class="iframe scroll">
			<iframe src="<?php echo $places[0]['video'] ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
			</iframe>
		</div>
		<h3 class="scroll">Recommended Hotels</h3>
		<div class="alone-grid">
			<?php if (!empty($hotels)) : ?>
				<?php foreach ($hotels as $i => $hotel) : ?>
					<div class="alone-grid-item scroll">
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
								<button class="alone-card-btn"><a href="../hotel/hotel.php?id=<?php echo $hotel['id'] ?>&name=<?php echo $hotel['hotel_name'] ?>">See More</a></button>
							</div>
						</div>
					</div>
				<?php endforeach ?>
			<?php endif ?>
		</div>
	</main>
	<footer>
		<div class="container scroll">
			<div class="row">
				<div class="footer-items">
					<h4>Terms and Privacy</h4>
					<ul id="lists" style="color:#bbb;text-decoration: none;">
						<li><a href="#">Faq</a></li>
						<li><a href="../../About us/About us.html">About us</a></li>
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
		<a href="#top">
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

	<script src="../js/addis.js"></script>
</body>

</html>