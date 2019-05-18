<?php 
require_once "micro/PDOC.php";
$direct = str_replace("/record_team.php", "", $_SERVER['REQUEST_URI']);

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
	<div class="page-top-area set-bg" data-setbg="img/record_team.jpg">
		<div class="breadcrumb-area">
			<a href="#">ثبت تیم</a> / <a href="index.php">خانه</a>
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
									<a class="nav-link active" id="1-tab" data-toggle="tab" href="#tab-1" role="tab" aria-controls="tab-1" aria-selected="true">ثبت تیم</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="2-tab" data-toggle="tab" href="#tab-2" role="tab" aria-controls="tab-2" aria-selected="false">تیم های ثبت شده</a>
								</li>
							</ul>
							<div class="tab-content" id="myTabContent">
								<!-- record player -->
								<div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="tab-1">
									<?php 
									
										echo '
										<form class="login100-form validate-form flex-sb flex-w" method="post">
											
											<div class="wrap-input100 validate-input m-b-16" data-validate = "لطفا فیلد نام را پر کنید">
												<input class="input100" type="text" name="name" placeholder="نام">
												<span class="focus-input100"></span>
											</div>
											
											<div class="wrap-input100 validate-input m-b-16" data-validate = "لطفا فیلد تاریخ تولد را پر کنید">
												<input class="input100" type="text" name="ct1" placeholder="رنگ پیراهن - یک">
												<span class="focus-input100"></span>
											</div>


											<div class="wrap-input100 validate-input m-b-16" data-validate = "لطفا فیلد گل ها را پر کنید">
												<input class="input100" type="text" name="ct2" placeholder="رنگ پیراهن - یک"">
												<span class="focus-input100"></span>
											</div>

											<div class="wrap-input100 validate-input m-b-16" data-validate = "لطفا فیلد نقش بازیکن را پر کنید">
												<input class="input100" type="text" name="ranking" placeholder="رتبه">
												<span class="focus-input100"></span>
											</div>

											<div class="wrap-input100 validate-input m-b-16" data-validate = "لطفا نام تیم را پر کنید">
												<input class="input100" type="text" name="points" placeholder="امتیاز">
												<span class="focus-input100"></span>
											</div>

											<div class="container-login100-form-btn m-t-17">
												<input type="submit" name="submit1" class="login100-form-btn" value="ثبت">
											</div>

										</form>';
										if(!empty($_POST["submit1"]) and !empty($_POST["name"]) and !empty($_POST["ct1"]) and !empty($_POST["ct2"]) and !empty($_POST["ranking"]) and !empty($_POST["points"])){
											$p = $_POST;
											if(!(int)$p["ranking"] or !(int)$p["points"]){
												print("<h3 class='false'><center>لطفا امتیاز و رتبه را با اعداد انگلیسی وارد کنید</center</h3>");
											}
											else{
												$sql = "INSERT INTO `teams` (`id`, `name`, `color_one`, `color_two`, `rank`, `points`) VALUES (NULL,?,?,?,?,?)";
												$sabt = pdoConnect($sql, array($p['name'], $p["ct1"], $p["ct2"], $p['ranking'], $p['points']));
												print("<h3 class='true'><center>تیم با موفقیت ثبت شد</center</h3>");
											}
										}
										else{
											print("<h3 class='false'><center>لطفا تمام فیلد ها را پر کنید</center</h3>");
										}
										
									?>
								</div>
								<div class="tab-pane fade" id="tab-2" role="tabpanel" aria-labelledby="tab-2">
									<?php
										$sql = "SELECT * FROM `teams`";
										$resps = pdoConnect($sql);
										echo '<div class="w3-white w3-padding notranslate w3-padding-16 validate-input m-b-16 flex-sb flex-w">
											<table id="customers">
											  <tbody><tr>
											  <center>
												<th style=margin:120em>شماره</th>
											  	<th style=width:120em>نام</th>
											  	<th style=width:120em>رنگ پیراهن - یک</th>
											  	<th style=width:120em>رنگ پیراهن - دو</th>
											  	<th style=width:120em>رتبه</th>
											  	<th style=width:120em>امتیاز</th>
											  </center>
											  </tr>
										';
										foreach ($resps as $key => $i) {
											print "<tr>";
											foreach ($i as $key => $j) {
												print "<td>" . $j . "</td>";
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