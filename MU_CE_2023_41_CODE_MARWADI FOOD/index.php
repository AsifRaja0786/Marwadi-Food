<?php
	
	include("admin/includes/db.php");

	session_start();

	$food = ["", "", "", ""];
	$img = ["", "", "", ""];
	$startTime = ["", "", "", ""];
	$endTime = ["", "", "", ""];

	if(isset($_POST['submit'])) {
		$_SESSION['email'] = $_POST['email2'];
	}
	
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

	<style>
		.food-img {
			height: 350px;
			width: 500px;
		}
		.chefImg {
			height: 350px;
			width: 300px;
		}
	</style>

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
					<li><a href="#home">HOME</a></li>
					<li><a href="#gallery">FOOD GALLERY</a></li>
					<li><a href="#menu">SPECIAL MENU</a></li>
					<li><a href="#team">CHEFS</a></li>
					<li><a href="#req-verfication">FOOD REQUEST</a></li>
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

				<!-- Day Option -->
				<div class="col-md-offset-2 col-md-8 col-sm-12 text-center">
					<h1 class="heading">Food Gallery</h1>

					<button class="btn btn-secondary dropdown-toggle" type="button"
						data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" onclick="sunday()" >
						Sunday
					</button>

					<button class="btn btn-secondary dropdown-toggle" type="button" 
						data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" onclick="monday()">
						Monday
					</button>

					<button class="btn btn-secondary dropdown-toggle" type="button" 
						data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" onclick="tuesday()">
						Tuesday
					</button>

					<button class="btn btn-secondary dropdown-toggle" type="button" 
						data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" onclick="wednesday()">
						Wednesday
					</button>

					<button class="btn btn-secondary dropdown-toggle" type="button" 
						data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" onclick="thursday()">
						Thursday
					</button>

					<button class="btn btn-secondary dropdown-toggle" type="button" 
						data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" onclick="friday()">
						Friday
					</button>

					<button class="btn btn-secondary dropdown-toggle" type="button" 
						data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" onclick="saturday()">
						Saturday
					</button>
					<br><br>				
				</div>

			<div id="sunday">

				<?php 
					// getDynamicRegularFood("sunday");
					$index = 0;
					$query = "SELECT * FROM `sunday`";
					$result = mysqli_query($con, $query);
					
					while($row=$result->fetch_assoc()) {
						$food[$index] = $row['food'];
						$img[$index] = "img/" . $row['img'];
						$startTime[$index] = $row['startTime'];
						$endTime[$index] = $row['endTime'];
						$index++;
					}												
				?>

				<div class="col-md-6 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
					<a href="<?= $img[0] ?>" data-lightbox-gallery="zenda-gallery">
						<img src="<?= $img[0] ?>" alt="gallery img" class="food-img">
					</a>
					<div>
						<h3>Breakfast</h3>
						<span><?= $food[0] ?></span>
						<br><br><br><br>
					</div>
					<a href="<?= $img[2] ?>" data-lightbox-gallery="zenda-gallery">
						<img src="<?= $img[2] ?>" alt="gallery img" class="food-img">
					</a>
					<div>
						<h3>Snacks</h3>
						<span><?= $food[2] ?></span>
					</div>
				</div>
				
				<div class="col-md-6 col-sm-6 wow fadeInUp" data-wow-delay="0.8s">
					<a href="<?= $img[1] ?>" data-lightbox-gallery="zenda-gallery">
						<img src="<?= $img[1] ?>" alt="gallery img" class="food-img">
					</a>
					<div>
						<h3>Lunch</h3>
						<span><?= $food[1] ?></span>
						<br><br><br><br>
					</div>
					<a href="<?= $img[3] ?>" data-lightbox-gallery="zenda-gallery">
						<img src="<?= $img[3] ?>" alt="gallery img" class="food-img">
					</a>
					<div>
						<h3>Dinner</h3>
						<span><?= $food[3] ?></span>
					</div>
				</div>
			</div>


			<div id="monday" hidden= True>
				
				<?php
					// getDynamicRegularFood("monday");
					$index = 0;
					$query = "SELECT * FROM `monday`";
					$result = mysqli_query($con, $query);
					
					while($row=$result->fetch_assoc()) {
						$food[$index] = $row['food'];
						$img[$index] = "img/" . $row['img'];
						$startTime[$index] = $row['startTime'];
						$endTime[$index] = $row['endTime'];
						$index++;
					}
				?>

				<div class="col-md-6 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
					<a href="<?= $img[0] ?>" data-lightbox-gallery="zenda-gallery">
						<img src="<?= $img[0] ?>" alt="gallery img" class="food-img">
					</a>
					<div>
						<h3>Breakfast</h3>
						<span><?= $food[0] ?></span>
						<br><br><br><br>
					</div>
					<a href="<?= $img[2] ?>" data-lightbox-gallery="zenda-gallery">
						<img src="<?= $img[2] ?>" alt="gallery img" class="food-img">
					</a>
					<div>
						<h3>Snacks</h3>
						<span><?= $food[2] ?></span>
					</div>
				</div>
				
				<div class="col-md-6 col-sm-6 wow fadeInUp" data-wow-delay="0.8s">
					<a href="<?= $img[1] ?>" data-lightbox-gallery="zenda-gallery">
						<img src="<?= $img[1] ?>" alt="gallery img" class="food-img">
					</a>
					<div>
						<h3>Lunch</h3>
						<span><?= $food[1] ?></span>
						<br><br><br><br>
					</div>
					<a href="<?= $img[3] ?>" data-lightbox-gallery="zenda-gallery">
						<img src="<?= $img[3] ?>" alt="gallery img" class="food-img">
					</a>
					<div>
						<h3>Dinner</h3>
						<span><?= $food[3] ?></span>
					</div>
				</div>
				
			</div>



			<div id="tuesday" hidden=True>
				
				<?php
					// getDynamicRegularFood("tuesday");
					$index = 0;
					$query = "SELECT * FROM `tuesday`";
					$result = mysqli_query($con, $query);
					
					while($row=$result->fetch_assoc()) {
						$food[$index] = $row['food'];
						$img[$index] = "img/" . $row['img'];
						$startTime[$index] = $row['startTime'];
						$endTime[$index] = $row['endTime'];
						$index++;
					}
				?>

				<div class="col-md-6 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
					<a href="<?= $img[0] ?>" data-lightbox-gallery="zenda-gallery">
						<img src="<?= $img[0] ?>" alt="gallery img" class="food-img">
					</a>
					<div>
						<h3>Breakfast</h3>
						<span><?= $food[0] ?></span>
						<br><br><br><br>
					</div>
					<a href="<?= $img[2] ?>" data-lightbox-gallery="zenda-gallery">
						<img src="<?= $img[2] ?>" alt="gallery img" class="food-img">
					</a>
					<div>
						<h3>Snacks</h3>
						<span><?= $food[2] ?></span>
					</div>
				</div>

				<div class="col-md-6 col-sm-6 wow fadeInUp" data-wow-delay="0.8s">
					<a href="<?= $img[1] ?>" data-lightbox-gallery="zenda-gallery">
						<img src="<?= $img[1] ?>" alt="gallery img" class="food-img">
					</a>
					<div>
						<h3>Lunch</h3>
						<span><?= $food[1] ?></span>
						<br><br><br><br>
					</div>
					<a href="<?= $img[3] ?>" data-lightbox-gallery="zenda-gallery">
						<img src="<?= $img[3] ?>" alt="gallery img" class="food-img">
					</a>
					<div>
						<h3>Dinner</h3>
						<span><?= $food[3] ?></span>
					</div>
				</div>

			</div>



			<div id="wednesday" hidden=True>
					
				<?php
					// getDynamicRegularFood("wednesday");
					$index = 0;
					$query = "SELECT * FROM `wednesday`";
					$result = mysqli_query($con, $query);
					
					while($row=$result->fetch_assoc()) {
						$food[$index] = $row['food'];
						$img[$index] = "img/" . $row['img'];
						$startTime[$index] = $row['startTime'];
						$endTime[$index] = $row['endTime'];
						$index++;
					}
				?>
						
				<div class="col-md-6 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
					<a href="<?= $img[0] ?>" data-lightbox-gallery="zenda-gallery">
						<img src="<?= $img[0] ?>" alt="gallery img" class="food-img">
					</a>
					<div>
						<h3>Breakfast</h3>
						<span><?= $food[0] ?></span>
						<br><br><br><br>
					</div>
					<a href="<?= $img[2] ?>" data-lightbox-gallery="zenda-gallery">
						<img src="<?= $img[2] ?>" alt="gallery img" class="food-img">
					</a>
					<div>
						<h3>Snacks</h3>
						<span><?= $food[2] ?></span>
					</div>
				</div>

				<div class="col-md-6 col-sm-6 wow fadeInUp" data-wow-delay="0.8s">
					<a href="<?= $img[1] ?>" data-lightbox-gallery="zenda-gallery">
						<img src="<?= $img[1] ?>" alt="gallery img" class="food-img">
					</a>
					<div>
						<h3>Lunch</h3>
						<span><?= $food[1] ?></span>
						<br><br><br><br>
					</div>
					<a href="<?= $img[3] ?>" data-lightbox-gallery="zenda-gallery">
						<img src="<?= $img[3] ?>" alt="gallery img" class="food-img">
					</a>
					<div>
						<h3>Dinner</h3>
						<span><?= $food[3] ?></span>
					</div>
				</div>

			</div>



			<div id="thursday" hidden=True>
				
				<?php
					// getDynamicRegularFood("thursday");
					$index = 0;
					$query = "SELECT * FROM `thursday`";
					$result = mysqli_query($con, $query);
					
					while($row=$result->fetch_assoc()) {
						$food[$index] = $row['food'];
						$img[$index] = "img/" . $row['img'];
						$startTime[$index] = $row['startTime'];
						$endTime[$index] = $row['endTime'];
						$index++;
					}
				?>

				<div class="col-md-6 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
					<a href="<?= $img[0] ?>" data-lightbox-gallery="zenda-gallery">
						<img src="<?= $img[0] ?>" alt="gallery img" class="food-img">
					</a>
					<div>
						<h3>Breakfast</h3>
						<span><?= $food[0] ?></span>
						<br><br><br><br>
					</div>
					<a href="<?= $img[2] ?>" data-lightbox-gallery="zenda-gallery">
						<img src="<?= $img[2] ?>" alt="gallery img" class="food-img">
					</a>
					<div>
						<h3>Snacks</h3>
						<span><?= $food[2] ?></span>
					</div>
				</div>

				<div class="col-md-6 col-sm-6 wow fadeInUp" data-wow-delay="0.8s">
					<a href="<?= $img[1] ?>" data-lightbox-gallery="zenda-gallery">
						<img src="<?= $img[1] ?>" alt="gallery img" class="food-img">
					</a>
					<div>
						<h3>Lunch</h3>
						<span><?= $food[1] ?></span>
						<br><br><br><br>
					</div>
					<a href="<?= $img[3] ?>" data-lightbox-gallery="zenda-gallery">
						<img src="<?= $img[3] ?>" alt="gallery img" class="food-img">
					</a>
					<div>
						<h3>Dinner</h3>
						<span><?= $food[3] ?></span>
					</div>
				</div>

			</div>


			<div id="friday" hidden=True>
				
				<?php
					// getDynamicRegularFood("friday");
					$index = 0;
					$query = "SELECT * FROM `friday`";
					$result = mysqli_query($con, $query);
					
					while($row=$result->fetch_assoc()) {
						$food[$index] = $row['food'];
						$img[$index] = "img/" . $row['img'];
						$startTime[$index] = $row['startTime'];
						$endTime[$index] = $row['endTime'];
						$index++;
					}
				?>

				<div class="col-md-6 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
					<a href="<?= $img[0] ?>" data-lightbox-gallery="zenda-gallery">
						<img src="<?= $img[0] ?>" alt="gallery img" class="food-img">
					</a>
					<div>
						<h3>Breakfast</h3>
						<span><?= $food[0] ?></span>
						<br><br><br><br>
					</div>
					<a href="<?= $img[2] ?>" data-lightbox-gallery="zenda-gallery">
						<img src="<?= $img[2] ?>" alt="gallery img" class="food-img">
					</a>
					<div>
						<h3>Snacks</h3>
						<span><?= $food[2] ?></span>
					</div>
				</div>

				<div class="col-md-6 col-sm-6 wow fadeInUp" data-wow-delay="0.8s">
					<a href="<?= $img[1] ?>" data-lightbox-gallery="zenda-gallery">
						<img src="<?= $img[1] ?>" alt="gallery img" class="food-img">
					</a>
					<div>
						<h3>Lunch</h3>
						<span><?= $food[1] ?></span>
						<br><br><br><br>
					</div>
					<a href="<?= $img[3] ?>" data-lightbox-gallery="zenda-gallery">
						<img src="<?= $img[3] ?>" alt="gallery img" class="food-img">
					</a>
					<div>
						<h3>Dinner</h3>
						<span><?= $food[3] ?></span>
					</div>
				</div>

			</div>



			<div id="saturday" hidden=True>
				
				<?php
					// getDynamicRegularFood("saturday");
					$index = 0;
					$query = "SELECT * FROM `saturday`";
					$result = mysqli_query($con, $query);
					
					while($row=$result->fetch_assoc()) {
						$food[$index] = $row['food'];
						$img[$index] = "img/" . $row['img'];
						$startTime[$index] = $row['startTime'];
						$endTime[$index] = $row['endTime'];
						$index++;
					}
				?>

				<div class="col-md-6 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
					<a href="<?= $img[0] ?>" data-lightbox-gallery="zenda-gallery">
						<img src="<?= $img[0] ?>" alt="gallery img" class="food-img">
					</a>
					<div>
						<h3>Breakfast</h3>
						<span><?= $food[0] ?></span>
						<br><br><br><br>
					</div>
					<a href="<?= $img[2] ?>" data-lightbox-gallery="zenda-gallery">
						<img src="<?= $img[2] ?>" alt="gallery img" class="food-img">
					</a>
					<div>
						<h3>Snacks</h3>
						<span><?= $food[2] ?></span>
					</div>
				</div>

				<div class="col-md-6 col-sm-6 wow fadeInUp" data-wow-delay="0.8s">
					<a href="<?= $img[1] ?>" data-lightbox-gallery="zenda-gallery">
						<img src="<?= $img[1] ?>" alt="gallery img" class="food-img">
					</a>
					<div>
						<h3>Lunch</h3>
						<span><?= $food[1] ?></span>
						<br><br><br><br>
					</div>
					<a href="<?= $img[3] ?>" data-lightbox-gallery="zenda-gallery">
						<img src="<?= $img[3] ?>" alt="gallery img" class="food-img">
					</a>
					<div>
						<h3>Dinner</h3>
						<span><?= $food[3] ?></span>
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

				<?php

					$newspecialfood = ["", "", "", "", "", "", "", ""];
					$newspecialfullmenu = ["", "", "", "", "", "", "", ""];

					$index = 0;
					$query = "SELECT * FROM `specialmenu`";
					$result = mysqli_query($con, $query);
					
					while($row=$result->fetch_assoc()) {
						$newspecialfood[$index] = $row['food'];
						$newspecialfullmenu[$index] = $row['fullmenu'];
						$index++;
					}
				?>

				<div class="col-md-6 col-sm-6">
					<h4><?= $newspecialfood[0] ?><span></span></h4>
					<h5><?= $newspecialfullmenu[0] ?></h5>
				</div>
				<div class="col-md-6 col-sm-6">
					<h4><?= $newspecialfood[1] ?><span></span></h4>
					<h5><?= $newspecialfullmenu[1] ?></h5>
				</div>
				<div class="col-md-6 col-sm-6">
					<h4><?= $newspecialfood[2] ?><span></span></h4>
					<h5><?= $newspecialfullmenu[2] ?></h5>
				</div>
				<div class="col-md-6 col-sm-6">
					<h4><?= $newspecialfood[3] ?><span></span></h4>
					<h5><?= $newspecialfullmenu[3] ?></h5>
				</div>
				<div class="col-md-6 col-sm-6">
					<h4><?= $newspecialfood[4] ?><span></span></h4>
					<h5><?= $newspecialfullmenu[4] ?></h5>
				</div>
				<div class="col-md-6 col-sm-6">
					<h4><?= $newspecialfood[5] ?><span></span></h4>
					<h5><?= $newspecialfullmenu[5] ?></h5>
				</div>
				<div class="col-md-6 col-sm-6">
					<h4><?= $newspecialfood[6] ?><span></span></h4>
					<h5><?= $newspecialfullmenu[6] ?></h5>
				</div>
				<div class="col-md-6 col-sm-6">
					<h4><?= $newspecialfood[7] ?><span></span></h4>
					<h5><?= $newspecialfullmenu[7] ?></h5>
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
				<?php

					$i = 0;
					$chefName = ["", "", ""];
					$chefPost = ["", "", ""];
					$chefImg = ["", "", ""];

					$query = "SELECT * FROM `chefs`";
					$result = mysqli_query($con, $query);

					while($row=$result->fetch_assoc()) {
						$chefName[$i] = $row['name'];
						$chefPost[$i] = $row['post'];
						$chefImg[$i] = "img/" . $row['img'];
						$i++;
					}

				?>
				<div class="col-md-4 col-sm-4 wow fadeInUp" data-wow-delay="0.3s">
					<img src="<?= $chefImg[0] ?>" class="img-responsive center-block chefImg" alt="Chef Image">
					<h4><?= $chefName[0] ?></h4>
					<h3><?= $chefPost[0] ?></h3>
				</div>
				<div class="col-md-4 col-sm-4 wow fadeInUp" data-wow-delay="0.6s">
					<img src="<?= $chefImg[1] ?>" class="img-responsive center-block chefImg" alt="Chef Image">
					<h4><?= $chefName[1] ?></h4>
					<h3><?= $chefPost[1] ?></h3>
				</div>
				<div class="col-md-4 col-sm-4 wow fadeInUp" data-wow-delay="0.9s">
					<img src="<?= $chefImg[2] ?>" class="img-responsive center-block chefImg" alt="Chef Image">
					<h4><?= $chefName[2] ?></h4>
					<h3><?= $chefPost[2] ?></h3>
				</div>
			</div>
		</div>
	</section>

<!-- request verification -->
<section id="req-verfication" class="parallax-section">
		<div class="container">
			<div class="row">
				<div class="col-md-offset-1 col-md-10 col-sm-12 text-center">
					<h1 class="heading">Email Address Verification</h1>
					<hr>
				</div>
				<div class="col-md-offset-1 col-md-10 col-sm-12 wow fadeIn" data-wow-delay="0.9s">

				<form action="php/send_otp.php" method="post">
						
					<div id="step-1">
						<div class="col-md-6 col-sm-6">
							<input name="email" type="email" class="form-control" id="email" placeholder="Email">
							<label id="email-warn"></label>
						</div>
					</div>
						
					<div id="step-2" hidden=True >
						<div class="col-md-6 col-sm-6">
							<input name="otp" type="number" class="form-control" id="otp" placeholder="Enter Your OTP">
							<label id="otp-warn"></label>
						</div>
					</div>
					<h5 style="margin-left: 1em; margin-top: 1em;width:50%">Note : On Verification of Your Email you can order your food manually !!!</h5><br>

					
					<div class="button-section col-sm-3">
					<input name="button" type="submit" class="form-control" flag ="step-1" id="s-otp-button" value="Send OTP" >
					</div>
					
					</form>
				</div>
			
			</div>
		</div>
	</section>


	<!-- request section -->
	<section id="contact" class="parallax-section" hidden=True>
		<div class="container">
			<div class="row">
				<div class="col-md-offset-1 col-md-10 col-sm-12 text-center">
					<h1 class="heading">Manual Food Request</h1>
					<hr>
				</div>
				<div class="col-md-offset-1 col-md-10 col-sm-12 wow fadeIn" data-wow-delay="0.9s">
					<form  method="post">
						<div class="col-md-6 col-sm-6">
							<input name="name" type="text" class="form-control" id="name" placeholder="Name">
						</div>
						<div class="col-md-6 col-sm-6">
							<input name="email2" type="email" class="form-control" id="email2" placeholder="Email">
						</div>

						<div class="col-md-12 col-sm-12">
							<input name="time" type="text" class="form-control" id="time" placeholder="Meal Time">
						</div>

						<div class="col-md-12 col-sm-12">
							<textarea name="message" rows="8" class="form-control" id="message"
								placeholder="Reason"></textarea>
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
	<script src="js/validate.js"></script>
	<script src="js/menu.js"></script>
	
	
<script>
		
function sunday(){
    document.getElementById("sunday").hidden=false;
    document.getElementById("monday").hidden=true;
    document.getElementById("tuesday").hidden=true;
    document.getElementById("wednesday").hidden=true;
    document.getElementById("thursday").hidden=true;
    document.getElementById("friday").hidden=true;
    document.getElementById("saturday").hidden=true;

}

function monday(){
    document.getElementById("sunday").hidden=true;
    document.getElementById("monday").hidden=false;
    document.getElementById("tuesday").hidden=true;
    document.getElementById("wednesday").hidden=true;
    document.getElementById("thursday").hidden=true;
    document.getElementById("friday").hidden=true;
    document.getElementById("saturday").hidden=true;

}


function tuesday(){
    document.getElementById("sunday").hidden=true;
    document.getElementById("monday").hidden=true;
    document.getElementById("tuesday").hidden=false;
    document.getElementById("wednesday").hidden=true;
    document.getElementById("thursday").hidden=true;
    document.getElementById("friday").hidden=true;
    document.getElementById("saturday").hidden=true;

}


function wednesday(){
    document.getElementById("sunday").hidden=true;
    document.getElementById("monday").hidden=true;
    document.getElementById("tuesday").hidden=true;
    document.getElementById("wednesday").hidden=false;
    document.getElementById("thursday").hidden=true;
    document.getElementById("friday").hidden=true;
    document.getElementById("saturday").hidden=true;

}


function thursday(){
    document.getElementById("sunday").hidden=true;
    document.getElementById("monday").hidden=true;
    document.getElementById("tuesday").hidden=true;
    document.getElementById("wednesday").hidden=true;
    document.getElementById("thursday").hidden=false;
    document.getElementById("friday").hidden=true;
    document.getElementById("saturday").hidden=true;

}


function friday(){
    document.getElementById("sunday").hidden=true;
    document.getElementById("monday").hidden=true;
    document.getElementById("tuesday").hidden=true;
    document.getElementById("wednesday").hidden=true;
    document.getElementById("thursday").hidden=true;
    document.getElementById("friday").hidden=false;
    document.getElementById("saturday").hidden=true;

}


function saturday(){
    document.getElementById("sunday").hidden=true;
    document.getElementById("monday").hidden=true;
    document.getElementById("tuesday").hidden=true;
    document.getElementById("wednesday").hidden=true;
    document.getElementById("thursday").hidden=true;
    document.getElementById("friday").hidden=true;
    document.getElementById("saturday").hidden=false;

}
</script>


</body>

</html>