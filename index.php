<?php 

$direct = str_replace("/index.php", "", $_SERVER['REQUEST_URI']);
if(!isset($_COOKIE["fixball"])){
	// setcookie ("fixball", 31, time()+9000000);
	header("Location: $direct");
}
if(empty($_COOKIE['fixball'])){
	header("Location: $direct/login/");	
}
require_once "micro/PDOC.php";

try{
	pdoConnect("SELECT id FROM `gamers`");
}
catch(Exception $e){
	create_db("micro/fixball.sql");
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>FixBall</title>
	<meta charset="UTF-8">
	<meta name="description" content="FixBall | football manager">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Favicon -->   
	<link href="img/logo.ico" rel="shortcut icon"/>

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">

	<!-- Stylesheets -->
	<link rel="stylesheet" href="css/bootstrap.min.css"/>
	<link rel="stylesheet" href="css/font-awesome.min.css"/>
	<link rel="stylesheet" href="css/flaticon.css"/>
	<link rel="stylesheet" href="css/animate.css"/>
	<link rel="stylesheet" href="css/owl.carousel.css"/>
	<link rel="stylesheet" href="css/style.css"/>



	<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>
<body>
	<!-- Page Preloder -->
	<div id="preloder">
		<div class="loader"></div>
	</div>

	<!-- Header section start -->
	<header class="header-section sp-pad">
		<h3 class="site-logo">FixBall</h3>

		<div class="nav-switch">
			<i class="fa fa-bars"></i>
		</div>
		<nav class="main-menu">
			<ul>
				<li><a href="index.php">خانه</a></li>
				<li><a href="record_player.php">ثبت بازیکن</a></li>
				<li><a href="record_game.php">ثبت بازی</a></li>
				<li><a href="record_team.php">ثبت تیم</a></li>
				<!-- <li><a href="record_result.php">ثبت نتایج بازی</a></li> -->
				<li><a href="record_goal.php">ثبت گل</a></li>
				<li><a href="buy_player.php">دریافت بازیکن</a></li>
				<li><a href="statistics.php">امار ها</a></li>

			</ul>
		</nav>
	</header>
	<!-- Header section end -->


	<!-- Hero section start -->
	<section class="hero-section">
		<div class="hero-slider owl-carousel">
			<div class="hs-item set-bg sp-pad" data-setbg="img/hero-slider/1.jpg">
				<div class="hs-text">
					<h2 class="hs-title">FixBall</h2>
					<p class="hs-des">A FootBall Manager<br> With PHP</p>
				</div>
			</div>
			<div class="hs-item set-bg sp-pad" data-setbg="img/hero-slider/2.jpg">
				<div class="hs-text">
					<h2 class="hs-title">FixBall</h2>
					<p class="hs-des">Easy, Fast <br>For Use</p>
				</div>
			</div>
		</div>
	</section>
	<!-- Hero section end -->
<?php


$sql1 = "SELECT COUNT(id) FROM `gamers`";
$sql2 = "SELECT COUNT(id) FROM `games`";
$sql3 = "SELECT COUNT(id) FROM `teams`";
$gamers = pdoConnect($sql1)[0]["COUNT(id)"];
$games = pdoConnect($sql2)[0]["COUNT(id)"];
$teams = pdoConnect($sql3)[0]["COUNT(id)"];


?>

	<!-- Milestones section start -->
	<section class="milestones-section spad">
		<div class="container">
			<div class="row">
				<div class="col-lg-4 col-md-6 fact-box">
					<div class="fact-content">
						<img src="img/player.png" class="flaticon-gamepad">
							
						<h2><?php echo $gamers ?></h2>
						<p>بازیکن ها</p>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 fact-box">
					<div class="fact-content">
						<img src="img/team.png" class="flaticon-gamepad">
						<h2><?php echo $teams ?></h2>
						<p>تیم ها</p>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 fact-box">
					<div class="fact-content">
						<img src="img/Games.png" class="flaticon-gamepad">
						<h2><?php echo $games ?></h2>
						<p>بازی ها</p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Milestones section end -->

	<!-- Footer section start -->
	<footer class="footer-section spad">
		<div class="container text-center">
			<p>saeeddhqan@gmail.com</p>
			<div class="social">
				<a href="#"><i class="fa fa-facebook"></i></a>
				<a href="#"><i class="fa fa-twitter"></i></a>
				<a href="#"><i class="fa fa-dribbble"></i></a> </br>


</br><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->

			</div>
		</div>


	</footer>
	<!-- Footer section end -->


	<!--====== Javascripts & Jquery ======-->
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/mixitup.min.js"></script>
	<script src="js/circle-progress.min.js"></script>
	<script src="js/main.js"></script>
</body>
</html>