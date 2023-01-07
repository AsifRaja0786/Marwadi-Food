<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Marwadi Food</title>

	<meta http-equiv="X-UA-Compatible" content="IE=Edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="keywords" content="">
	<meta name="description" content="">

	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/animate.min.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/nivo-lightbox.css">
	<link rel="stylesheet" href="css/nivo_themes/default/default.css">
	<link rel="stylesheet" href="css/style.css">
	<link href='https://fonts.googleapis.com/css?family=Roboto:400,500' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
</head>

<body>

	<!-- preloader section -->
	<section class="preloader">
		<div class="sk-spinner sk-spinner-pulse"></div>
	</section>

	<!-- navigation section -->
	<section class="navbar navbar-default navbar-fixed-top" role="navigation">
		<div class="container">
			<div class="navbar-header">
				<button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="icon icon-bar"></span>
					<span class="icon icon-bar"></span>
					<span class="icon icon-bar"></span>
				</button>
				<a href="#" class="navbar-brand">Marwadi Food</a>
			</div>
			<div class="collapse navbar-collapse">
				<ul class="nav navbar-nav navbar-right">
					<li><a href="main-index.php#home">HOME</a></li>
					<li><a href="main-index.php#gallery">FOOD GALLERY</a></li>
					<li><a href="main-index.php#menu">SPECIAL MENU</a></li>
					<li><a href="main-index.php#team">CHEFS</a></li>
					<li><a href="main-index.php#contact">FOOD REQUEST</a></li>
					<li><a href="php/logout.php">VERIFY ANOTHER EMAIL</a></li>
				</ul>
			</div>
		</div>
	</section>


	<!-- home section -->
	<section id="home" class="parallax-section">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-sm-12">
					<h1>Marwadi Food</h1>
					<h2>Delicious &amp; Deliquete</h2>
					<a href="#gallery" class="smoothScroll btn btn-default">LEARN MORE</a>
				</div>
			</div>
		</div>
	</section>


	<!-- gallery section -->
	<section id="gallery" class="parallax-section">
		<div class="container">
			<div class="row">



				<div class="col-md-offset-2 col-md-8 col-sm-12 text-center">
					<h1 class="heading">Food Gallery</h1>
					<hr>

					<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
						data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" onclick="sunday()" >
						Sunday
					</button>

					<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
						data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" onclick="monday()">
						Monday
					</button>

					<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
						data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" onclick="tuesday()">
						Tuesday
					</button>

					<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
						data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Wednesday
					</button>

					<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
						data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Thursday
					</button>

					<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
						data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Friday
					</button>

					<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
						data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Saturday
					</button>					
				</div>


			<div id="sunday">
				<div class="col-md-6 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
					<a href="images/gallery-img1.jpg" data-lightbox-gallery="zenda-gallery"><img
							src="images/gallery-img1.jpg" alt="gallery img"></a>
					<div>
						<h3>Breakfast</h3>
						<span>Brown Bread / Salad / Non-Veg</span>
						<br><br><br><br>
					</div>
					<a href="images/gallery-img2.jpg" data-lightbox-gallery="zenda-gallery"><img
							src="images/gallery-img2.jpg" alt="gallery img"></a>
					<div>
						<h3>Snacks</h3>
						<span>Tomato / Spices / Lemon</span>
					</div>
				</div>
				
				<div class="col-md-6 col-sm-6 wow fadeInUp" data-wow-delay="0.9s">
					<a href="images/gallery-img4.jpg" data-lightbox-gallery="zenda-gallery"><img
							src="images/gallery-img4.jpg" alt="gallery img"></a>
					<div>
						<h3>Lunch</h3>
						<span>Turnip / Cucumber / Green</span>
						<br><br><br><br>
					</div>
					<a href="images/gallery-img5.jpg" data-lightbox-gallery="zenda-gallery"><img
							src="images/gallery-img5.jpg" alt="gallery img"></a>
					<div>
						<h3>Dinner</h3>
						<span>Pasta / cheese / Paneer</span>
					</div>
				</div>
				</div>
			</div>


			<div id="monday" hidden= True>
				<div class="col-md-6 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
					<a href="images/gallery-img1.jpg" data-lightbox-gallery="zenda-gallery"><img
							src="images/gallery-img88.jpg" alt="gallery img"></a>
					<div>
						<h3>Breakfast</h3>
						<span>Brown Bread / Salad / Non-Veg</span>
						<br><br><br><br>
					</div>
					<a href="images/gallery-img2.jpg" data-lightbox-gallery="zenda-gallery"><img
							src="images/gallery-img2.jpg" alt="gallery img"></a>
					<div>
						<h3>Snacks</h3>
						<span>Tomato / Spices / Lemon</span>
					</div>
				</div>
				
				<div class="col-md-6 col-sm-6 wow fadeInUp" data-wow-delay="0.9s">
					<a href="images/gallery-img4.jpg" data-lightbox-gallery="zenda-gallery"><img
							src="images/gallery-img4.jpg" alt="gallery img"></a>
					<div>
						<h3>Lunch</h3>
						<span>Turnip / Cucumber / Green</span>
						<br><br><br><br>
					</div>
					<a href="images/gallery-img5.jpg" data-lightbox-gallery="zenda-gallery"><img
							src="images/gallery-img5.jpg" alt="gallery img"></a>
					<div>
						<h3>Dinner</h3>
						<span>Pasta / cheese / Paneer</span>
					</div>
				</div>
				</div>
			</div>



			<div id="tuesday" hidden=True>
				<div class="col-md-6 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
					<a href="images/gallery-img1.jpg" data-lightbox-gallery="zenda-gallery"><img
							src="images/gallery-img1.jpg" alt="gallery img"></a>
					<div>
						<h3>Breakfast</h3>
						<span>Brown Bread / Salad / Non-Veg</span>
						<br><br><br><br>
					</div>
					<a href="images/gallery-img2.jpg" data-lightbox-gallery="zenda-gallery"><img
							src="images/gallery-img2.jpg" alt="gallery img"></a>
					<div>
						<h3>Snacks</h3>
						<span>Tomato / Spices / Lemon</span>
					</div>
				</div>
				
				<div class="col-md-6 col-sm-6 wow fadeInUp" data-wow-delay="0.9s">
					<a href="images/gallery-img4.jpg" data-lightbox-gallery="zenda-gallery"><img
							src="images/gallery-img4.jpg" alt="gallery img"></a>
					<div>
						<h3>Lunch</h3>
						<span>Turnip / Cucumber / Green</span>
						<br><br><br><br>
					</div>
					<a href="images/gallery-img5.jpg" data-lightbox-gallery="zenda-gallery"><img
							src="images/gallery-img5.jpg" alt="gallery img"></a>
					<div>
						<h3>Dinner</h3>
						<span>Pasta / cheese / Paneer</span>
					</div>
				</div>
				</div>
			</div>

		</div>
	</section>


	<!-- menu section -->
	<section id="menu" class="parallax-section">
		<div class="container">
			<div class="row">
				<div class="col-md-offset-2 col-md-8 col-sm-12 text-center">
					<h1 class="heading">Special Menu</h1>
					<hr>
				</div>
				<div class="col-md-6 col-sm-6">
					<h4>Gulab Jamun ................ <span></span></h4>
					<h5>White / Dark / Dairy Product</h5>
				</div>
				<div class="col-md-6 col-sm-6">
					<h4>Dairy Sweets ........................... <span></span></h4>
					<h5>Mithai / Milk Sweets / Butter</h5>
				</div>
				<div class="col-md-6 col-sm-6">
					<h4>Chicken ........................ <span></span></h4>
					<h5>Gravy / Fried / Biryani</h5>
				</div>
				<div class="col-md-6 col-sm-6">
					<h4> Salad .......................... <span></span></h4>
					<h5>Salad / Buck Wheat / Carrots</h5>
				</div>
				<div class="col-md-6 col-sm-6">
					<h4>Ice Cream ...................... <span></span></h4>
					<h5>Vanilla / Butter Scotch / Chocolate</h5>
				</div>
				<div class="col-md-6 col-sm-6">
					<h4>Pizza ........................ <span></span></h4>
					<h5>Cheesy / Butter / Normal</h5>
				</div>
				<div class="col-md-6 col-sm-6">
					<h4>Omlets ................... <span></span></h4>
					<h5>Spicy / Non-Spicy / Normal</h5>
				</div>
				<div class="col-md-6 col-sm-6">
					<h4>Bread ..................... <span></span></h4>
					<h5>Brown Bread / Jmas / Honey</h5>
				</div>
			</div>
		</div>
	</section>


	<!-- team section -->
	<section id="team" class="parallax-section">
		<div class="container">
			<div class="row">
				<div class="col-md-offset-2 col-md-8 col-sm-12 text-center">
					<h1 class="heading">Marwadi's Chefs</h1>
					<hr>
				</div>
				<div class="col-md-4 col-sm-4 wow fadeInUp" data-wow-delay="0.3s">
					<img src="images/" class="img-responsive center-block" alt="">
					<h4>MAMU</h4>
					<h3>Main Chef</h3>
				</div>
				<div class="col-md-4 col-sm-4 wow fadeInUp" data-wow-delay="0.6s">
					<img src="images/" class="img-responsive center-block" alt="">
					<h4>Santosh</h4>
					<h3>Pizza Specialist</h3>
				</div>
				<div class="col-md-4 col-sm-4 wow fadeInUp" data-wow-delay="0.9s">
					<img src="images/" class="img-responsive center-block" alt="">
					<h4>Bikash</h4>
					<h3>New Baker</h3>
				</div>
			</div>
		</div>
	</section>


	<!-- request section -->
	<section id="contact" class="parallax-section">
		<div class="container">
			<div class="row">
				<div class="col-md-offset-1 col-md-10 col-sm-12 text-center">
					<h1 class="heading">Manual Food Request</h1>
					<hr>
				</div>
				<div class="col-md-offset-1 col-md-10 col-sm-12 wow fadeIn" data-wow-delay="0.9s">
					<form  action="php/request.php" method="post" autocomplete="off" enctype="multipart/form-data">
						<div class="col-md-6 col-sm-6">
							<input name="name" type="text" class="form-control" id="name" placeholder="Name" required>
						</div>

						<div class="col-md-6 col-sm-6" disabled="True">
							<input disabled name="email" type="email" class="form-control" id="email" value="<?= $_SESSION['email'] ?>" required>
						</div>

						<div class="col-md-6 col-sm-6">
							<input name="mealtime" type="text" class="form-control" id="mealtime" placeholder="Meal Time" required>
						</div>

						<div class="col-md-6 col-sm-6">
							<input name="file" type="file" accept="" class="form-control" id="file" required>
						</div>

						<div class="col-md-12 col-sm-12">
							<textarea name="reason" rows="8" class="form-control" id="reason"
								placeholder="Reason" required>
							</textarea>
						</div>
						<h5 style="margin-left: 1em;">Note : On completion of manual request mail will be sent to
							warden and food department. False request can lead to consequences!!!</h5>
						<div class="col-md-offset-3 col-md-6 col-sm-offset-3 col-sm-6">
							<input name="submit" type="submit" class="form-control" id="submit" value="Make a Request">
						</div>
					</form>
				</div>
				<div class="col-md-2 col-sm-1"></div>
			</div>
		</div>
	</section>


	<!-- footer section -->
	<footer class="parallax-section">
		<div class="container">
			<div class="row">
				<div class="col-md-4 col-sm-4 wow fadeInUp" data-wow-delay="0.6s">
					<h2 class="heading">Contact Info.</h2>
					<div class="ph">
						<p><i class="fa fa-phone"></i> Phone</p>
						<h4>000-000-0000</h4>
					</div>
					<div class="address">
						<p><i class="fa fa-map-marker"></i> Our Location</p>
						<h4>Morbi Highway, Marwadi University, Gujarat, India</h4>
					</div>
				</div>
				<div class="col-md-4 col-sm-4 wow fadeInUp" data-wow-delay="0.6s">
					<h2 class="heading">Open Hours</h2>
					<p>Sunday  <span>8:00 AM - 10:00 PM</span></p>
					<p>Mon-Fri <span>7:00 AM - 10:00 PM</span></p>
					<p>Saturday<span>7:00 AM - 10:00 PM</span></p>
				</div>
				<div class="col-md-4 col-sm-4 wow fadeInUp" data-wow-delay="0.6s">
					<h2 class="heading">Follow Us</h2>
					<ul class="social-icon">
						<li><a href="https://www.facebook.com/Marwadiuniversity/"
								class="fa-brands fa-facebook wow bounceIn" data-wow-delay="0.3s"></a></li>
						<li><a href="https://twitter.com/mu_rajkot?lang=en" class="fa-brands fa-twitter wow bounceIn"
								data-wow-delay="0.6s"></a></li>
						<li><a href="https://www.instagram.com/marwadi.university/?hl=en"
								class="fa-brands fa-instagram wow bounceIn" data-wow-delay="0.9s"></a></li>
					</ul>
				</div>
			</div>
		</div>
	</footer>


	<!-- copyright section -->
	<section id="copyright">
		<div class="container">
			<div class="row">
				<div class="col-m
				d-12 col-sm-12">
					<h3>Marwadi Food</h3>
					<p>Copyright © Marwadi Chandrana and Group


				</div>
			</div>
		</div>
	</section>

	<!-- JAVASCRIPT JS FILES -->
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.parallax.js"></script>
	<script src="js/smoothscroll.js"></script>
	<script src="js/nivo-lightbox.min.js"></script>
	<script src="js/wow.min.js"></script>
	<script src="js/custom.js"></script>
	<script src="js/menu.js"></script>

</body>

</html>