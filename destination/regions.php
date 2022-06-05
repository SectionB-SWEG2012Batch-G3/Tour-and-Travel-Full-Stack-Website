<!DOCTYPE html>
<html>

<head>
	<title>4HF Tour & Travels|Destinations</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" href="../css/footerCSS.css">
	<link rel="stylesheet" href="../css/navStyle.css">
	<link rel="stylesheet" href="../css/HomepageCss.css">
	<link rel="stylesheet" href="../fontawesome-free-5.15.4-web/css/all.min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../css/scrollCSS.css">
	<link rel="stylesheet" href="../Admin/styles/css.css">
	<script defer src="../JS/search-boxScript.js"></script>
</head>

<body id="body">
	<?php include_once '../partials/navbar.php' ?>
	<?php
	try {
		include_once '../dbconfig/connection.php';
	} catch (PDOException $e) {
		echo 'connection exception ' . $e->getMessage();
	}

	$stmt = $pdo->prepare("SELECT * FROM destination");
	$stmt->execute();
	$destinations = $stmt->fetchAll();
	?>
	<main>

		<h1>Amazing places to visit</h1>


		<div class="slideContainer">


			<div class="slider">


				<?php if (!empty($destinations)) : ?>
					<?php foreach ($destinations as $i => $destination) : ?>
						<div class="slide <?php if ($i === 0) echo 'active' ?>">
							<img src="../Admin/<?php echo $destination['image'] ?>" alt="<?php echo $destination['RegionName'] ?>">
							<div class="info">
								<h2><?php echo $destination['RegionName'] ?></h2>
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

				<?php if (!empty($destinations)) : ?>
					<div class="navigation-visibility">
						<?php foreach ($destinations as $i => $destination) : ?>
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

		<?php if (!empty($destinations)) : ?>
			<div class="alone-grid">
				<?php foreach ($destinations as $i => $destination) : ?>
					<div class="alone-grid-item scroll">
						<div class="alone-card">
							<div class="imc">
								<img class="alone-card-img" src="../Admin/<?php echo $destination['image'] ?>" alt="<?php echo $destination['RegionName'] ?>">
							</div>
							<div class="alone-card-content">
								<h2 class="alone-card-header"><?php echo $destination['RegionName'] ?></h2>
								<p class="alone-card-text">
									<?php echo explode('.', $destination['description'])[0] ?>
								</p>
								<button class="alone-card-btn"><a href="destinations.php?id=<?php echo $destination['id'] ?>&name=<?php echo $destination['RegionName'] ?>">See More</a></button>
							</div>
						</div>
					</div>
				<?php endforeach ?>
			</div>
		<?php endif ?>
		<?php if (empty($destinations)) : ?>
			<div class="alert alert-primary" role="alert">
				No Destination place
			</div>
		<?php endif ?>
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
</body>

</html>