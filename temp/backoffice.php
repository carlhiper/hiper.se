


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
	
	<!-- Autocomplete CSS -->
    <link rel="stylesheet" href="UIkit/components/autocomplete.css">
    <!-- Autocomplete Javascript -->
    <script src="UIkit/components/autocomplete.js"></script>
	<!--Favicon-->
	<link rel="icon" 
      type="image/png" 
      href="favicon.png" />


	<script>
		function serverRequest(str) {
			// Create JSON string
			xml_str = '<Data><command>get_mail</command><id>2</id></Data>';

			if (str.length == 0) { 
				return;
			} else {
				var xmlhttp = new XMLHttpRequest();
				xmlhttp.onreadystatechange = function() {
					if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
						var myArr = JSON.parse(xmlhttp.responseText);
						var txt="";
						for(i = 0; i<myArr.length; i++){
							txt += myArr[i] + "<br>";
						}
						document.getElementById("email").innerHTML = txt;
					}
					document.getElementById("readystate").innerHTML = xmlhttp.readyState;
					document.getElementById("status").innerHTML = xmlhttp.status;
					document.getElementById("responseType").innerHTML = XMLHttpRequest.responseType;
					document.getElementById("nbremailaddresses").innerHTML =myArr.length;
				}
				xmlhttp.open("GET", 'http://www.hiper.se/get_mail_addresses_se.php, true);
				xmlhttp.send();
			}	
		}
		window.onload=serverRequest(1);
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
		
		<h1 style="color:white">SWEDISH BACKOFFICE</h1>	
		<div class="uk-grid uk-grid-medium" style="position:relative; padding-top:30px;padding-left:5%; padding-right:5%" >
			<div class="uk-width-large-1-1 uk-width-medium-1-1 uk-width-small-1-1 uk-align-left">
				<table style="float:center; ">
					<!--  -->
					<a id="Goals" class="anchor"></a>
					<tr>
						<td style="background-color:#ebebeb;
								border:1px solid black;
								padding:20px;">
						<h2 style="color:#343434">External web page</h2>
					
						</td>
						<td>
						</td>
					</tr>
					<!--  -->
					<a id="PerformanceManagement" class="anchor"></a>
					<tr>
						<td></td>
						<td style="background-color:#ebebeb;
								border:1px solid black;
								padding:20px;">

							<h2 style="color:#343434">Statistics</h2>
							<p style="padding-left 20px"> Number of entries in the database: <span id="nbremailaddresses"> </p>

							</td>					
					</tr>
					
					<!-- Mailing list -->	
					<a id="OurSolution" class="anchor"></a>						
					<tr>
					  <td  style="background-color:#ebebeb;
								border:1px solid black; 
								padding:20px;">	
							<h2 style="color:#343434">Mailing list</h2>
							<p style="padding-left 20px"> <span id="email"> </p>
							<form action="javascript:serverRequest(1)">
								<input type="submit" value="Reload">							
							</form>
					  </td>
					  <td>	</td>
					</tr>
					<tr>
					  <td>	</td>
					  <td  style="background-color:#ebebeb;
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
				min-height:400px;
				border-top: 1px solid grey">
		
		<div align="center" style="position:relative; margin-top:20px ;width:100%;">
			<div style="width:80%;padding:20px">		
				<h6 style="color:#ff7562;font-weight:bold; line-height:8px">COUNTDOWN TO RELEASE</h6>
				<div id="countbox1" style="font:24pt 'open sans'; color:#ffffff;">	</div>
			</div>
			<hr style="border:1px grey solid; width:80%"></hr>

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


<script type="text/javascript">


//###################################################################
// Author: ricocheting.com
// Version: v3.0
// Date: 2014-09-05
// Description: displays the amount of time until the "dateFuture" entered below.

var CDown = function() {
	this.state=0;// if initialized
	this.counts=[];// array holding countdown date objects and id to print to {d:new Date(2013,11,18,18,54,36), id:"countbox1"}
	this.interval=null;// setInterval object
}

CDown.prototype = {
	init: function(){
		this.state=1;
		var self=this;
		this.interval=window.setInterval(function(){self.tick();}, 1000);
	},
	add: function(date,id){
		this.counts.push({d:date,id:id});
		this.tick();
		if(this.state==0) this.init();
	},
	expire: function(idxs){
		for(var x in idxs) {
			this.display(this.counts[idxs[x]], "Now!");
			this.counts.splice(idxs[x], 1);
		}
	},
	format: function(r){
		var out="";
		if(r.d != 0){out += r.d +" "+((r.d==1)?"day":"days")+", ";}
		if(r.h != 0){out += r.h +" "+((r.h==1)?"hour":"hours")+", ";}
		out += r.m +" "+((r.m==1)?"min":"mins")+", ";
		out += r.s +" "+((r.s==1)?"sec":"secs");

		return out.substr(0,out.length);
	},
	math: function(work){
		var	y=w=d=h=m=s=ms=0;
		ms=(""+((work%1000)+1000)).substr(1,3);
		work=Math.floor(work/1000);//kill the "milliseconds" so just secs
		y=Math.floor(work/31536000);//years (no leapyear support)
		w=Math.floor(work/604800);//weeks
		d=Math.floor(work/86400);//days
		work=work%86400;
		h=Math.floor(work/3600);//hours
		work=work%3600;
		m=Math.floor(work/60);//minutes
		work=work%60;
		s=Math.floor(work);//seconds

		return {y:y,w:w,d:d,h:h,m:m,s:s,ms:ms};
	},
	tick: function(){
		var now=(new Date()).getTime(),
			expired=[],cnt=0,amount=0;

		if(this.counts)
		for(var idx=0,n=this.counts.length; idx<n; ++idx){
			cnt=this.counts[idx];
			amount=cnt.d.getTime()-now;//calc milliseconds between dates

			// if time is already past
			if(amount<0){
				expired.push(idx);
			}
			// date is still good
			else{
				this.display(cnt, this.format(this.math(amount)));
			}
		}
		// deal with any expired
		if(expired.length>0) this.expire(expired);

		// if no active counts, stop updating
		if(this.counts.length==0) window.clearTimeout(this.interval);	
	},
	display: function(cnt,msg){
		document.getElementById(cnt.id).innerHTML=msg;
	}
};

window.onload=function(){
	var cdown = new CDown();
	cdown.add(new Date(2016,0,1,9,0,0), "countbox1");
};
</script>
</html>
