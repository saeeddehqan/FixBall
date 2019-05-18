<?php 
require_once "micro/PDOC.php";
$direct = str_replace("/buy_player.php", "", $_SERVER['REQUEST_URI']);

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
	<div class="page-top-area set-bg" data-setbg="img/buy_player.jpg">
		<div class="breadcrumb-area">
			<a href="#">دریافت بازیکن</a> / <a href="index.php">خانه</a>
		</div>
	</div>
	<!-- Page top section end -->


	<!-- Elements section start -->
	<section class="elements-section spad">
		<div class="container">
			<!-- Accordions & tabs -->
			<div class="element">

					<div class="col-lg-15">
						<!-- Tabs -->
						<div class="tab-element">
							<ul class="nav nav-tabs" id="myTab" role="tablist">
								<li class="nav-item">
									<a class="nav-link active" id="1-tab" data-toggle="tab" href="#tab-1" role="tab" aria-controls="tab-1" aria-selected="true">خرید بازیکن</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="2-tab" data-toggle="tab" href="#tab-2" role="tab" aria-controls="tab-2" aria-selected="false">بازیکن های تیم ها</a>
								</li>
							</ul>
							<div class="tab-content" id="myTabContent">
								<!-- record player -->
								<div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="tab-1">
									<?php 
										$sql = "SELECT * FROM `gamers`";
										$resps = pdoConnect($sql);
										echo '<span style="direction:rtl;"><center><h3>بازیکن ها</h3></center></span>
										<form method="post">
										<div class="w3-white w3-padding notranslate w3-padding-16 validate-input m-b-16 flex-sb flex-w">
											<table id="customers">
											  <tbody><tr>
												<th style=margin:120em>شماره</th>
											  	<th style=width:120em>نام</th>
											  	<th style=width:120em>تاریخ تولد</th>
											  	<th style=width:120em>نقش</th>
											  	<th style=width:120em>گل ها</th>
											  	<th style=width:120em>پاس گل</th>
											  	<th style=width:120em>تعداد خطا</th>
											  	<th style=width:120em>تیم</th>
											  </tr>
										';
										foreach ($resps as $key => $i) {
											print "<tr>";
											foreach ($i as $key2 => $j) {
												if($key2 == "id"){
													print "<td><input type='checkbox' style='border:2px solid #0d0d0d;background:#0d0d0d;' name=id".$i['id']." value=".$i['id'].">" . $j . "</td>";
												}
												else{
													print "<td>" . $j . "</td>";
												}
											}
											print "</tr>";
										}

										echo '
											</tbody></table>
											
											</div>
										 	<span style="direction:rtl;">
										 		<center>
										 			<h3>انتخاب تیم <br><br>
										 				<select name="team" style="width:400px;direction:rtl">
										 			</h3>
										 		</center>
										 	</span>
										';

										$get_teams_sql = "SELECT name FROM `teams`";
										$get_teams = pdoConnect($get_teams_sql);
										foreach ($get_teams as $key => $i) {
											foreach ($i as $key => $j) {
												echo '<option>' . $j . '</option>';
											}
										}
										echo '</select>
											<br>
											<div class="container-login100-form-btn m-t-17">
												<input type="submit" name="submit1" class="login100-form-btn" value="ثبت">
											';

										if(!empty($_POST["submit1"]) and count($_POST) > 2){
											$p = $_POST;
											$team = $p["team"];

											$selected_gamers = array();
											foreach ($p as $key => $i) {
												if(stristr($key, "id")){
													array_push($selected_gamers, $i);
												}
											}
											foreach ($selected_gamers as $key => $i) {
												$gamer = "UPDATE `gamers` SET `team`=? WHERE id = " . $i;
												$sabt = pdoConnect($gamer, array($team));
											}
											echo "<h3 class='true'>
													<center>" . count($selected_gamers)." بازیکن برای تیم ". $team ." دریافت شد</center>
												</h3>";
										}
										else{
											print("<h3 class='false'><center>لطفا حداقل یک بازیکن را انتخاب کنید</center</h3>");
										}
										echo "</div>";
									?>
								</div>
								<div class="tab-pane fade" id="tab-2" role="tabpanel" aria-labelledby="tab-2">
									<?php
										echo '<p style="direction:rtl;"><center><h3>بازیکن ها</h3></center></p>

										<div class="w3-white w3-padding notranslate w3-padding-16 validate-input m-b-16 flex-sb flex-w">
											<table id="customers" style="width:100%;">
											  <tbody>
											  
											  ';
										echo '<tr><center>
											  	<th style="margin:120em;text-align:center">تیم</th>
											  	<th style="margin:120em;text-align:center" colspan=10>بازیکن</th>
											  </tr>';
										foreach ($get_teams as $key => $i) {
											foreach ($i as $key2 => $j) {
												$sql = "SELECT name from `gamers` where team = '".$j."'";
												$pc = pdoConnect($sql);
												$len = (int)count($pc)+1;
												echo "<tr><th style='width:10cm;text-align:center;background:#fff;' rowspan='". $len ."'>$j</th></tr>";
												foreach ($pc as $key => $k) {
													foreach ($k as $key => $v) {
												 		echo "<tr><td style='background:#fff;margin:120em;text-align:center'>$v</td></tr>";
													}
												 } 
											}
										}
										echo '
											</tbody></table></div>';
									?>
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
				<a href="#"><i class="fa fa-dribbble"></i></a> <br>


<br><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
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