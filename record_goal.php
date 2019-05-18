<?php 
require_once "micro/PDOC.php";
$direct = str_replace("/record_goal.php", "", $_SERVER['REQUEST_URI']);

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
	<div class="page-top-area set-bg" data-setbg="img/record_goal.jpg">
		<div class="breadcrumb-area">
			<a href="#">ثبت گل</a> / <a href="index.php">خانه</a>
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
									<a class="nav-link active" id="1-tab" data-toggle="tab" href="#tab-1" role="tab" aria-controls="tab-1" aria-selected="true">ثبت گل</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="2-tab" data-toggle="tab" href="#tab-2" role="tab" aria-controls="tab-2" aria-selected="false">گل های ثبت شده</a>
								</li>
							</ul>
							<div class="tab-content" id="myTabContent">
								<!-- record player -->
								<div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="tab-1">
									<?php 
										echo '
										<form class="login100-form validate-form flex-sb flex-w" method="post">
											
											<div class="wrap-input100 validate-input m-b-16" data-validate = "لطفا فیلد نام را پر کنید">
												<input class="input100" type="text" name="ig" placeholder="شماره بازی">
												<span class="focus-input100"></span>
											</div>
											
											<div class="wrap-input100 validate-input m-b-16" data-validate = "لطفا فیلد تاریخ تولد را پر کنید">
												<input class="input100" type="text" name="name" placeholder="نام بازیکن">
												<span class="focus-input100"></span>
											</div>


											<div class="wrap-input100 validate-input m-b-16" data-validate = "لطفا فیلد گل ها را پر کنید">
												<input class="input100" type="text" name="min" placeholder="دقیقه">
												<span class="focus-input100"></span>
											</div>

											';

										$sql = "SELECT * FROM `games`";
										$resps = pdoConnect($sql);
										echo '<div class="w3-white w3-padding notranslate w3-padding-16 validate-input m-b-16 flex-sb flex-w">
											<table id="customers">
											  <tbody><tr>
											  <center>
												<th style=margin:120em>شماره</th>
											  	<th style=width:120em>تیم اول</th>
											  	<th style=width:120em>تیم دوم </th>
											  	<th style=width:120em>تاریخ</th>
											  	<th style=width:120em>گل های تیم اول</th>
											  	<th style=width:120em>گل های تیم دوم</th>
											  	<th style=width:120em>هفته</th>
											  	<th style=width:120em>داور</th>
											  	<th style=width:120em>خطا ها</th>
											  	<th style=width:120em>جمع گل ها</th>
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

										$sql = "SELECT * FROM `gamers`";
										$resps = pdoConnect($sql);
										echo '<p style="direction:rtl;"><center><h3>بازیکن ها</h3></center></p><div class="w3-white w3-padding notranslate w3-padding-16 validate-input m-b-16 flex-sb flex-w">
											<table id="customers">
											  <tbody><tr>
											  <center>
												<th style=margin:120em>شماره</th>
											  	<th style=width:120em>نام</th>
											  	<th style=width:120em>تاریخ تولد</th>
											  	<th style=width:120em>نقش</th>
											  	<th style=width:120em>گل ها</th>
											  	<th style=width:120em>پاس گل</th>
											  	<th style=width:120em>تعداد خطا</th>
											  	<th style=width:120em>تیم</th>
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
											</div><div class="container-login100-form-btn m-t-17">
												<input type="submit" name="submit1" class="login100-form-btn" value="ثبت">
											</div>

										</form>
										';


										if(!empty($_POST["submit1"]) and !empty($_POST["ig"]) and !empty($_POST["name"]) and !empty($_POST["min"])){
											$p = $_POST;
											if(!(int)$p["ig"] or !(int)$p["min"]){
												print("<h3 class='false'><center>لطفا اعداد را به انگلیسی و درست وارد کنید</center</h3>");
											}
											elseif(!is_min($p["min"])){
												print("<h3 class='false'><center>لطفا دقیقه بازی را درست وارد کنید</center</h3>");
											}
											else{
												# barresi valid bodan id ha
												$count_games = (int)pdoConnect("SELECT COUNT(id) FROM `games`")[0]["COUNT(id)"];
												$name_gamer = pdoConnect("SELECT name,id,team FROM `gamers` where name=?", array($p["name"]));
												if((int)$p["ig"] > (int)$count_games or (int)$p["ig"] < 0){
													print("<h3 class='false'><center>بازی شماره ".$p["ig"]." وجود ندارد</center</h3>");
												}
												elseif(count($name_gamer) == 0){
													print("<h3 class='false'><center>بازیکنی با نام ".$p["name"]." وجود ندارد</center</h3>");
												}
												else{
													$team_gamer = $name_gamer[0]["team"];
													# sabt goal dar table 'goals'

													$get_game_sql = "SELECT second_team,first_team FRom `games` where id = ?";
													$get_game = pdoConnect($get_game_sql, array($p["ig"]));
													$first_team =  $get_game[0]["first_team"];
													$second_team =  $get_game[0]["second_team"];

													if($first_team == $team_gamer){
													 	$esql = "UPDATE `games` SET `first_team_goal` = `first_team_goal`+1, `goals`= `second_team_goal` + `first_team_goal` WHERE `games`.`id` = ?;";
													 }
													elseif($second_team == $team_gamer){
													 	$esql = "UPDATE `games` SET `second_team_goal` = `second_team_goal`+1, `goals`= `second_team_goal` + `first_team_goal` WHERE `games`.`id` = ?;";
													 }
													else{
													 	print("<h3 class='false'><center>".$p["name"]." در بازی " . $p["ig"] ." شرکت نکرده است</center</h3>");
													}
													if(isset($esql)){
														$sql_sabt = "INSERT INTO `goals` (`id`, `game`, `gamer`, `minutes`) VALUES (NULL, ?,?,?)";
														$sabt = pdoConnect($sql_sabt, array($p['ig'], $p["name"], $p["min"]));
														# ezafe kardan yek goal be goal haye bazikon
														$gname = pdoConnect("UPDATE `gamers` SET `goals` = `goals`+1 WHERE `gamers`.`id` = ?", array($name_gamer[0]["id"]));
														$end = pdoConnect($esql, array($p["ig"]));
														print("<h3 class='true'><center>گل با موفقیت ثبت شد و نتایج بازی هم بروز شد.برای مشهاد صفحه را دوباره بارگزاری کنید.</center</h3>");
													}
												}
											}
										}
										else{
											print("<h3 class='false'><center>لطفا تمام فیلد ها را پر کنید</center</h3>");
										}
									?>
								</div>
								<div class="tab-pane fade" id="tab-2" role="tabpanel" aria-labelledby="tab-2">
									<?php
										$sql = "SELECT * FROM `goals`";
										$resps = pdoConnect($sql);
										echo '<div class="w3-white w3-padding notranslate w3-padding-16 validate-input m-b-16 flex-sb flex-w">
											<table id="customers">
											  <tbody><tr>
											  <center>
												<th style=margin:120em>شماره</th>
											  	<th style=width:120em>شماره بازی</th>
											  	<th style=width:120em>نام بازیکن</th>
											  	<th style=width:120em>دقیقه</th>
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