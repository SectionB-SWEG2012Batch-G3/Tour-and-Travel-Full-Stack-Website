<!DOCTYPE html>
<html>

<head>
	<title>4HF Tour & Travels| <?php echo $_GET['name'] ?? '' ?></title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="What to know about Frienship(sheger) park?">
	<meta name="keywords" content="friendship, sheger,Addis ababa, park">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="css/style2.css">
	<link rel="stylesheet" href="../css/footerCSS.css">
	<link rel="stylesheet" href="../css/navStyle.css">
	<link rel="stylesheet" href="../css/HomepageCss.css">
	<link rel="stylesheet" href="../Admin/styles/css.css">
	<script defer src="../JS/NavScript.js"></script>
	<script defer src="../JS/search-boxScript.js"></script>
	<link rel="stylesheet" href="../fontawesome-free-5.15.4-web/css/all.min.css">
</head>

<body id="body">
	<a href="http://hello world">hello Website</a>
	<?php include_once '../partials/navbar.php' ?>
	<?php include_once 'partials/DB_for_place.php' ?>
	<main>
		<h1><?php echo $place['title'] ?></h1>
		<div class="slideContainer">
			<div class="slider">
				<?php if (!empty($images)) : ?>
					<?php foreach ($images as $i => $image) : ?>
						<div class="slide <?php if ($i === 0) echo 'active' ?>">
							<img src="../Admin/<?php echo $image['path'] ?? '' ?>" alt="<?php echo $place['title'] ?>">
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

				<?php if (!empty($image)) : ?>
					<div class="navigation-visibility">
						<?php foreach ($images as $i => $image) : ?>
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
				<?php echo $place['description'] ?>
			</p>
		</div>

		<div class="mapouter scroll">
			<div class="gmap_canvas">
				<iframe id="gmap_canvas" src="<?php echo $place['mapLink'] ?>" frameborder="0" scrolling="no" marginheight="0" marginwidth="0">
				</iframe>
			</div>
		</div>


		<?php if (!empty($hotels)) : ?>
			<h3 class="scroll">Recommended Hotels</h3>
			<div class="alone-grid">
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
								<button class="alone-card-btn"><a href="destination.php?id=<?php echo $hotel['id'] ?>&name=<?php echo $hotel['hotel_name'] ?>">See More</a></button>
							</div>
						</div>
					</div>
				<?php endforeach ?>
			</div>
		<?php endif ?>

		<?php if (empty($hotels)) : ?>
			<div class="alert alert-primary" role="alert">
				No Recomended Hotel is available
			</div>
		<?php endif ?>

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
		<a href="#body">
			<i class="fas fa-chevron-up"></i>
		</a>
	</div>
	<script defer src="js/destinations.js"></script>
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

	<script src="../js/friendship.js"></script>
</body>

</html>