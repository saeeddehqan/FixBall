<?php 
require_once "micro/PDOC.php";
$direct = str_replace("/statistics.php", "", $_SERVER['REQUEST_URI']);

if(empty($_COOKIE['fixball'])){
	header("Location: $direct/login/");
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
	<link rel="stylesheet" type="text/css" href="login/css/util.css">
	<link rel="stylesheet" type="text/css" href="login/css/main.css">
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="login/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="login/vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="login/vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="login/vendor/animsition/css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="login/vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="login/vendor/daterangepicker/daterangepicker.css">
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


	<!-- Page top section start -->
	<div class="page-top-area set-bg" data-setbg="img/statistics.jpg">
		<div class="breadcrumb-area">
			<a href="#">امار ها</a> / <a href="index.php">خانه</a>
		</div>
	</div>
	<!-- Page top section end -->


	<!-- Elements section start -->
	<section class="elements-section spad">
		<div class="container">
			<!-- Accordions & tabs -->
			<div class="element">
				<div class="row">

					<div class="col-lg-15">
						<!-- Tabs -->
						<div class="tab-element">
							<ul class="nav nav-tabs" id="myTab" role="tablist">
								<li class="nav-item">
									<a class="nav-link active" id="1-tab" data-toggle="tab" href="#tab-1" role="tab" aria-controls="tab-1" aria-selected="true">رتبه بندی بازیکن ها</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="2-tab" data-toggle="tab" href="#tab-2" role="tab" aria-controls="tab-2" aria-selected="false">رتبه بندی تیم ها </a>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="3-tab" data-toggle="tab" href="#tab-3" role="tab" aria-controls="tab-3" aria-selected="false">بیشترین خطا در بازی</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="4-tab" data-toggle="tab" href="#tab-4" role="tab" aria-controls="tab-4" aria-selected="false">کمترین خطا در بازی</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="5-tab" data-toggle="tab" href="#tab-5" role="tab" aria-controls="tab-5" aria-selected="false">بیشترین گل در بازی</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="6-tab" data-toggle="tab" href="#tab-6" role="tab" aria-controls="tab-6" aria-selected="false">کمترین گل در بازی</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="7-tab" data-toggle="tab" href="#tab-7" role="tab" aria-controls="tab-7" aria-selected="false">بازیکن پر خطا</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="8-tab" data-toggle="tab" href="#tab-8" role="tab" aria-controls="tab-8" aria-selected="false">بازیکن کم خطا</a>
								</li>
							</ul>
							<div class="tab-content" id="myTabContent">
								<!-- record player -->
								<div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="tab-1">
									<?php 
									
										$sql = "SELECT goals,name FROM `gamers` ORDER BY `gamers`.`goals` ASC";
										$resps = pdoConnect($sql);
										echo '<div class="w3-white w3-padding notranslate w3-padding-16 validate-input m-b-16 flex-sb flex-w">
											<table id="customers">
											  <tbody><tr>
											  <center>
												<th style="margin:120em;text-align:left;">گل ها</th>
											  	<th style="width:120em;text-align:center;">نام بازیکن</th>
											  </center>
											  </tr>
										';
										foreach ($resps as $key => $i) {
											print "<tr>";
											foreach ($i as $key => $j) {
												print "<td style='text-align:center;'>" . $j . "</td>";
											}
											print "</tr>";
										}

										echo '
											</tbody></table>
											</div>
										';
									?>
										
									?>
								</div>
								<div class="tab-pane fade" id="tab-2" role="tabpanel" aria-labelledby="tab-2">
									<?php
										$sql = "SELECT rank,name FROM `teams` ORDER BY `teams`.`rank` ASC ";
										$resps = pdoConnect($sql);
										echo '<div class="w3-white w3-padding notranslate w3-padding-16 validate-input m-b-16 flex-sb flex-w">
											<table id="customers">
											  <tbody><tr>
											  <center>
												<th style="margin:120em;text-align:center;">رتبه تیم</th>
											  	<th style="width:120em;text-align:center;">نام تیم</th>
											  </center>
											  </tr>
										';
										foreach ($resps as $key => $i) {
											print "<tr>";
											foreach ($i as $key => $j) {
												print "<td style='text-align:center;'>" . $j . "</td>";
											}
											print "</tr>";
										}

										echo '
											</tbody></table>
											</div>
										';
									?>
								</div>
								<div class="tab-pane fade" id="tab-3" role="tabpanel" aria-labelledby="tab-3">
									<?php
										$sql = "SELECT id,first_team,second_team,date,referee,errors FROM `games` ORDER BY `games`.`errors` DESC ";
										$resps = pdoConnect($sql);
										echo '<div class="w3-white w3-padding notranslate w3-padding-16 validate-input m-b-16 flex-sb flex-w">
											<table id="customers">
											  <tbody><tr>
											  <center>
												<th style="width:120em;text-align:center">شماره</th>
											  	<th style="width:120em;text-align:center">تیم اول</th>
											  	<th style="width:120em;text-align:center">تیم دوم </th>
											  	<th style="width:120em;text-align:center">تاریخ</th>
											  	<th style="width:120em;text-align:center">داور</th>
											  	<th style="width:120em;text-align:center">خطا ها</th>
											  </center>
											  </tr>
										';
										foreach ($resps as $key => $i) {
											print "<tr>";
											foreach ($i as $key => $j) {
												print "<td style='text-align:center;'>" . $j . "</td>";
											}
											print "</tr>";
										}

										echo '
											</tbody></table>
											</div>
										';
									?>
								</div>
								<div class="tab-pane fade" id="tab-4" role="tabpanel" aria-labelledby="tab-4">
									<?php
										$sql = "SELECT id,first_team,second_team,date,referee,errors FROM `games` ORDER BY `games`.`errors` ASC ";
										$resps = pdoConnect($sql);
										echo '<div class="w3-white w3-padding notranslate w3-padding-16 validate-input m-b-16 flex-sb flex-w">
											<table id="customers">
											  <tbody><tr>
											  <center>
												<th style="width:120em;text-align:center">شماره</th>
											  	<th style="width:120em;text-align:center">تیم اول</th>
											  	<th style="width:120em;text-align:center">تیم دوم </th>
											  	<th style="width:120em;text-align:center">تاریخ</th>
											  	<th style="width:120em;text-align:center">داور</th>
											  	<th style="width:120em;text-align:center">خطا ها</th>
											  </center>
											  </tr>
										';
										foreach ($resps as $key => $i) {
											print "<tr>";
											foreach ($i as $key => $j) {
												print "<td style='text-align:center;'>" . $j . "</td>";
											}
											print "</tr>";
										}

										echo '
											</tbody></table>
											</div>
										';
									?>
								</div>
								<div class="tab-pane fade" id="tab-5" role="tabpanel" aria-labelledby="tab-5">
									<?php
										$sql = "SELECT id,first_team,second_team,date,first_team_goal,second_team_goal,goals FROM `games` ORDER BY `games`.`goals` DESC";
										$resps = pdoConnect($sql);
										echo '<div class="w3-white w3-padding notranslate w3-padding-16 validate-input m-b-16 flex-sb flex-w">
											<table id="customers">
											  <tbody><tr>
											  <center>
												<th style="width:120em;text-align:center">شماره</th>
											  	<th style="width:120em;text-align:center">تیم اول</th>
											  	<th style="width:120em;text-align:center">تیم دوم </th>
											  	<th style="width:120em;text-align:center">تاریخ</th>
											  	<th style="width:120em;text-align:center">گل های تیم اول</th>
											  	<th style="width:120em;text-align:center">گل های تیم دوم</th>
											  	<th style="width:120em;text-align:center">جمع گل ها</th>
											  </center>
											  </tr>
										';
										foreach ($resps as $key => $i) {
											print "<tr>";
											foreach ($i as $key => $j) {
												print "<td style='text-align:center;'>" . $j . "</td>";
											}
											print "</tr>";
										}

										echo '
											</tbody></table>
											</div>
										';
									?>
								</div>
								<div class="tab-pane fade" id="tab-6" role="tabpanel" aria-labelledby="tab-6">
									<?php
										$sql = "SELECT id,first_team,second_team,date,first_team_goal,second_team_goal,goals FROM `games` ORDER BY `games`.`goals` ASC";
										$resps = pdoConnect($sql);
										echo '<div class="w3-white w3-padding notranslate w3-padding-16 validate-input m-b-16 flex-sb flex-w">
											<table id="customers">
											  <tbody><tr>
											  <center>
												<th style="width:120em;text-align:center">شماره</th>
											  	<th style="width:120em;text-align:center">تیم اول</th>
											  	<th style="width:120em;text-align:center">تیم دوم </th>
											  	<th style="width:120em;text-align:center">تاریخ</th>
											  	<th style="width:120em;text-align:center">گل های تیم اول</th>
											  	<th style="width:120em;text-align:center">گل های تیم دوم</th>
											  	<th style="width:120em;text-align:center">جمع گل ها</th>
											  </center>
											  </tr>
										';
										foreach ($resps as $key => $i) {
											print "<tr>";
											foreach ($i as $key => $j) {
												print "<td style='text-align:center;'>" . $j . "</td>";
											}
											print "</tr>";
										}

										echo '
											</tbody></table>
											</div>
										';
									?>
								</div>
								<div class="tab-pane fade" id="tab-7" role="tabpanel" aria-labelledby="tab-7">
									<?php
										$sql = "SELECT * FROM `gamers` ORDER BY `gamers`.`errors` DESC ";
										$resps = pdoConnect($sql);
										echo '<div class="w3-white w3-padding notranslate w3-padding-16 validate-input m-b-16 flex-sb flex-w">
											<table id="customers">
											  <tbody><tr>
											  <center>
												<th style="text-align:center">شماره</th>
											  	<th style="text-align:center">نام</th>
											  	<th style="text-align:center">تاریخ تولد</th>
											  	<th style="text-align:center">نقش</th>
											  	<th style="text-align:center">گل ها</th>
											  	<th style="text-align:center">پاس گل</th>
											  	<th style="text-align:center">تعداد خطا</th>
											  	<th style="text-align:center">تیم</th>
											  </center>
											  </tr>
										';
										foreach ($resps as $key => $i) {
											print "<tr>";
											foreach ($i as $key => $j) {
												print "<td style='text-align:center;'>" . $j . "</td>";
											}
											print "</tr>";
										}

										echo '
											</tbody></table>
											</div>
										';
									?>
								</div>
								<div class="tab-pane fade" id="tab-8" role="tabpanel" aria-labelledby="tab-8">
									<?php
										$sql = "SELECT * FROM `gamers` ORDER BY `gamers`.`errors` ASC ";
										$resps = pdoConnect($sql);
										echo '<div class="w3-white w3-padding notranslate w3-padding-16 validate-input m-b-16 flex-sb flex-w">
											<table id="customers">
											  <tbody><tr>
											  <center>
												<th style="text-align:center">شماره</th>
											  	<th style="text-align:center">نام</th>
											  	<th style="text-align:center">تاریخ تولد</th>
											  	<th style="text-align:center">نقش</th>
											  	<th style="text-align:center">گل ها</th>
											  	<th style="text-align:center">پاس گل</th>
											  	<th style="text-align:center">تعداد خطا</th>
											  	<th style="text-align:center">تیم</th>
											  </center>
											  </tr>
										';
										foreach ($resps as $key => $i) {
											print "<tr>";
											foreach ($i as $key => $j) {
												print "<td style='text-align:center;'>" . $j . "</td>";
											}
											print "</tr>";
										}

										echo '
											</tbody></table>
											</div>
										';
									?>
								</div>
								<div class="tab-pane fade" id="tab-9" role="tabpanel" aria-labelledby="tab-9">
									<?php
										$sql = "SELECT rank,name FROM `teams` ORDER BY `teams`.`rank` ASC ";
										$resps = pdoConnect($sql);
										echo '<div class="w3-white w3-padding notranslate w3-padding-16 validate-input m-b-16 flex-sb flex-w">
											<table id="customers">
											  <tbody><tr>
											  <center>
												<th style="margin:120em;text-align:center;">رتبه تیم</th>
											  	<th style="width:120em;text-align:center;">نام تیم</th>
											  </center>
											  </tr>
										';
										foreach ($resps as $key => $i) {
											print "<tr>";
											foreach ($i as $key => $j) {
												print "<td style='text-align:center;'>" . $j . "</td>";
											}
											print "</tr>";
										}

										echo '
											</tbody></table>
											</div>
										';
									?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Elements section end -->

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