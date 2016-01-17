
<?php
// Check if user is logged in, otherwise send back to login page
session_start();
if (!isset($_SESSION['username'])){
	header("Location:login.html");
}
?>	


<!DOCTYPE html>

<html>
<script src= "http://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js"></script>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="utf-8">

	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,800,700&subset=latin,greek' rel='stylesheet' type='text/css'>
	<!-- UIkit -->
	<!-- CSS -->
	<link id="data-uikit-theme" rel="stylesheet" type="text/css" href= "UIkit/css/uikit.css"> 
	<link rel="stylesheet" type="text/css" href= "UIkit/css/components/slidenav.css"> 
	<link rel="stylesheet" type="text/css" href= "UIkit/css/components/slider.css"> 
	<link rel="stylesheet" type="text/css" href= "UIkit/css/components/accordion.css"> 

	<!--HIPER style-->
	<link rel="stylesheet" type="text/css" href= "css/hiperstyle_homepage.css"> 
	
	<!-- javascript -->
	<script src="UIkit/jquery-1.11.3.js"></script>
	<script src="UIkit/js/uikit.min.js"></script>
	<script src="UIkit/js/components/parallax.min.js"></script>    
	<script src="UIkit/js/components/slider.min.js"></script>  	
	<script src="UIkit/js/components/slidenav.min.js"></script>  		
	<script src="UIkit/js/components/accordion.min.js"></script>   	
	<script src="functions.js"></script>

	<!-- Autocomplete CSS -->
    <link rel="stylesheet" href="UIkit/components/autocomplete.css">
    <!-- Autocomplete Javascript -->
    <script src="UIkit/components/autocomplete.js"></script>
	<!--Favicon-->
	<link rel="icon" 
      type="image/png" 
      href="favicon.png" />

	<script>	
		window.onload=load_mail_en(1);
		window.onload=load_mail_se(1);
		window.onload=load_news('se',3);
		window.onload=load_news('en',3);
	</script>
</head>

<body ng-app="myApp" ng-controller="userCtrl" >
<div style="position:absolute; left: 0; right: 0; z-index: 300; width:100%">
	<!--Heading-->
	<div id="header" style="position:fixed; 
				height:50px; 
				background-color:white; 
				width:100%;  
				z-index:500;
				border-bottom: 1px solid grey">

		<div class="uk-grid">

			<div class="uk-width-small-1-1 uk-width-medium-1-1 uk-width-large-1-1" >
					<a href="index.html"><img style="float:left; height:46px; width:auto; margin-right:50px;margin-left:10px; margin-top:2px" src="img/hiper_logo.png"></img></a>
					<a href="logout.php"><p style="float:right; height:46px; width:auto; margin-right:50px;margin-left:10px; margin-top:2px">LOGOUT</p></a>				
			</div>
		</div>
	</div>

	<a id="BACKOFFICE" class="anchor"></a>
	<div 	align="center" style="position: relative;
				background-color: #ffffff;
				background-size:cover;
				background-image: url(img/bkg_laptop.jpg);
				background-position:center bottom;
				z-index: 100;
				padding-top:100px;
				padding-bottom:50px;
				width:100%;
				border-top: 1px solid grey;">
		
		<h1 style="color:white">BACKOFFICE</h1>	
		<div class="uk-grid uk-grid-medium" style="position:relative; padding-top:30px;padding-left:5%; padding-right:5%" >
			<div class="uk-width-large-1-1 uk-width-medium-1-1 uk-width-small-1-1 uk-align-left">
				<table>
					<!--  -->
					<tr>
						<td style="background-color:#ffffff;
								border:1px solid black;
								padding:20px;"
								valign="top">
							<h2 style="color:#343434">Nyheter</h2>
							<p> <span id="news_se_top3"> </p>
							<a href="#news_archive_se" data-uk-modal="{center:true}" onclick="load_news('se',100)" style="color:#343434; font-weight:bold">Arkiv</a>
							<br>
							<br>
							<form name="form_news_se" class="" action="store_news.php" method="POST" accept-charset="UTF-8" >
								<fieldset data-uk-margin>
									<input type="date" id="date_se" name="date_se" placeholder="datum"></input>	<br>
									<input type="text" id="news_se" name="news_se" placeholder="nyhet"></input>	<br>
									<button  type="submit" name="submit_news_se" id="submit_news_se">Lägg till nyhet</button> <br>
									<input  type="button" value="Ta bort senaste nyheten" onClick="self.location='delete_news_se.php'"></input>
								</fieldset>
							<form>
							<br>

						</td>
						<td style="background-color:#ffffff;
								border:1px solid black;
								padding:20px;"
								valign="top">
							<h2 style="color:#343434">News</h2>
							<p> <span id="news_en_top3"> </p>
							<a href="#news_archive_en" data-uk-modal="{center:true}" onclick="load_news('en',100)" style="color:#343434; font-weight:bold">Archive</a>
							<br>
							<br>
							<form name="form_news_en" class="" action="store_news.php" method="POST" accept-charset="UTF-8">
								<fieldset data-uk-margin>
									<input type="date" id="date_en" name="date_en" ></input> <br>
									<input type="text" id="news_en" name="news_en" placeholder="news"></input>	<br>
									<button  type="submit" name="submit_news_en" id="submit_news_en">Submit update</button> <br>
									<input  type="button" value="Delete last update" onClick="self.location='delete_news_en.php'"></input>
								</fieldset>
							<form>
							<br>
						</td>
					</tr>
					<!-- Modal implementation News archive se -->
					<div id="news_archive_se" class="uk-modal">
						<div class="uk-modal-dialog">			
							<a  href="#"  class="uk-modal-close uk-close"></a>
							<div class="uk-container-center" style="padding-bottom:5%">		
								<div class="uk-panel">
									<h2>Nyhetsarkiv</h2>
									<p style="padding-left 20px"> <span id="news_se_all"> </p>
								</div>			
							</div>			
						</div>
					</div>
					<!-- Modal implementation News archive en -->
					<div id="news_archive_en" class="uk-modal">
						<div class="uk-modal-dialog">			
							<a  href="#"  class="uk-modal-close uk-close"></a>
							<div class="uk-container-center" style="padding-bottom:5%">		
								<div class="uk-panel">
									<h2>News archive</h2>
									<p style="padding-left 20px"> <span id="news_en_all"> </p>
								</div>			
							</div>			
						</div>
					</div>
					
					<!-- Mailing list -->	
					<tr>
					  <td  style="background-color:#ffffff;
								border:1px solid black; 
								padding:20px;"
								valign="top">	
							<h2 style="color:#343434">Mailing list</h2>
							<p style="padding-left 20px"><strong> Total: </strong><span id="nbremailaddresses_se"> </strong></p>
							<p style="padding-left 20px"> <span id="email_se"> </p>
					  </td>
					  <td  style="background-color:#ffffff;
								border:1px solid black; 
								padding:20px;"
								valign="top">	
							<h2 style="color:#343434">Mailing list</h2>
							<p style="padding-left 20px"><strong> Total:  </strong><span id="nbremailaddresses_en"></p>
							<p style="padding-left 20px"> <span id="email_en"> </p>
					  </td>
					</tr>
					<tr>
					  <td>	</td>
					  <td  style="background-color:#ffffff;
								border:1px solid black; 
								padding:20px;">	
							<h2 style="color:#343434">Connection info</h2>
							<p style="padding-left 20px"> status: <span id="status"></p>
							<p style="padding-left 20px"> readyState: <span id="readystate"> </p>
							<p style="padding-left 20px"> responseType: <span id="responseType"> </p>
					  </td>
					</tr>
				</table>
			</div>		
		</div>
	</div>

	<!--Footer-->
	<div style="position: relative;			  
				background-color: #343434;
				z-index: 100;
				width: 100%;
				min-height:270px;
				border-top: 1px solid grey">
		
		<div align="center" style="position:relative; margin-top:20px ;width:100%;">

			<div class="uk-grid" style="width:80%; padding-bottom:5px;padding-top:20px;">
				<div class="uk-width-large-1-4 uk-width-medium-1-2 uk-container-center" align="center">   
					<a href="about.html#WhyHIPER"><h6 style="color:#ff7562;font-weight:bold; line-height:8px"> WHY? </h6></a>
					<a href="about.html#Goals"><h6 style="color:#ffffff; line-height:8px"> Goals </h6></a>
					<a href="about.html#PerformanceManagement"><h6 style="color:#ffffff; line-height:8px"> Performance Management </h6></a>
					<a href="about.html#OurSolution"><h6 style="color:#ffffff; line-height:8px"> Our Solution </h6></a>
					<a href="about.html#Implementation"><h6 style="color:#ffffff; line-height:8px"> Implementation </h6></a>
					<a href="about.html#Pricing"><h6 style="color:#ffffff; line-height:8px"> Pricing </h6></a>
				</div>
				<div class="uk-width-large-1-4 uk-width-medium-1-2 uk-container-center" align="center">	
					<a href="about.html#AboutHIPER"><h6 style="color:#ff7562;font-weight:bold; line-height:8px"> ABOUT </h6></a>
					<a href="about.html#TheCompany"><h6 style="color:#ffffff; line-height:8px"> Company </h6></a>
					<a href="about.html#Contact"><h6 style="color:#ffffff; line-height:8px"> Contact </h6></a>
					<a href="about.html#PressandMedia"><h6 style="color:#ffffff; line-height:8px"> Press and Media </h6></a>
				</div>
				<div class="uk-width-large-1-4 uk-width-medium-1-2 uk-container-center" align="center">	
					<a href="about.html#BusinessUse"><h6 style="color:#ff7562;font-weight:bold; line-height:8px"> BUSINESS USE </h6></a>
					<a href="about.html#BusinessBenefits"><h6 style="color:#ffffff; line-height:8px"> Business Benefits </h6></a>
					<a href="about.html#BusinessCases"><h6 style="color:#ffffff; line-height:8px"> Business Cases</h6></a>
				</div>
				<div class="uk-width-large-1-4 uk-width-medium-1-2 uk-container-center" align="center">	
					<a href="about.html#QA"><h6 style="color:#ff7562;font-weight:bold; line-height:8px"> QUESTIONS & ANSWERS </h6></a>
					<a href="about.html#FAQ"><h6 style="color:#ffffff; line-height:8px"> FAQ </h6></a>
					<a href="about.html#TermsofUse"><h6 style="color:#ffffff; line-height:8px"> Terms of Use </h6></a>
					<a href="about.html#PrivacyPolicy"><h6 style="color:#ffffff; line-height:8px"> Privacy Policy </h6></a>
					<a href="about.html#Support"><h6 style="color:#ffffff; line-height:8px"> Support </h6></a>
				</div>
			</div>
			<hr style="border:1px grey solid; width:80%"></hr>
			<div class="uk-grid" style="width:80%;">
				<div class="uk-width-large-1-2 uk-width-medium-1-2 uk-container-center" align="center">   
				</div>
				<div class="uk-width-large-1-2 uk-width-medium-1-2 uk-container-center" align="center">	
					<a href="index.html"><img style="float:right; height:30px; width:auto; margin-right:10px;margin-left:20px;" src="img/hiper_logo.png"></img></a>
					<p  style="float:right;color:white;font-size:11px">&copy; 2015</p>

				</div>
			</div>
		</div>

	</div>
</div>
	
	
	
</body>
</html>
