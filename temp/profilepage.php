

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
	<link rel="stylesheet" type="text/css" href= "hiperstyle_homepage.css">
	<script>
	function requestProfiles(str) {
		xml_str = '<Data><command>get_profiles</command><id>0</id></Data>';
		//json_str = '{command:get_company_list,id:2}';
		//document.getElementById("goals").innerHTML = "test";
		if (str.length == 0) { 
			return;
		} else {
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
					var myArr = JSON.parse(xmlhttp.responseText);
					var txt="";
					for(i = 0; i<myArr.length; i++){
						txt += myArr[i].title + "<br>" + myArr[i].description + "<hr>";
					}
					document.getElementById("goals").innerHTML = txt;
				}else{
					document.getElementById("goals").innerHTML = "responseType: " + xmlhttp.responseType + 
					"<hr>readyState: " + xmlhttp.readyState + "<hr> status: " + xmlhttp.status + 
					"<hr> responseText:" + xmlhttp.responseText;
				}
			}
			xmlhttp.open("GET", 'http://90.225.70.16/hiper/hiper_server.php?q='+xml_str, true);
			xmlhttp.send();
		}	
	}
	function requestGoals(str) {
		xml_str = '<Data><command>get_latest_goals</command><id>3</id></Data>';
		//json_str = '{command:get_company_list,id:2}';
		//document.getElementById("goals").innerHTML = "test";
		if (str.length == 0) { 
			return;
		} else {
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
					var myArr = JSON.parse(xmlhttp.responseText);
					var txt="";
					for(i = 0; i<myArr.length; i++){
						txt += myArr[i].title + "<br>" + myArr[i].description + "<hr>";
					}
					document.getElementById("goals").innerHTML = txt;
				}else{
					document.getElementById("goals").innerHTML = "responseType: " + xmlhttp.responseType + 
					"<hr>readyState: " + xmlhttp.readyState + "<hr> status: " + xmlhttp.status + 
					"<hr> responseText:" + xmlhttp.responseText;
				}
			}
			xmlhttp.open("GET", 'http://90.225.70.16/hiper/hiper_server.php?q='+xml_str, true);
			xmlhttp.send();
		}	
	}
	</script>
</head>

<body ng-app="myApp" ng-controller="userCtrl" onload='requestGoals("get_latest_goals")'>

	<div class="body">

		<table>
		
		<tr>
			<td class="noborder">      </td>

			<td class="border_right">
				<ul class="navbar">			
					<li> <a href="logout.php"><h3>LOGOUT</h3></a></li>
					<li> <a href="#contact"><h3>CONTACT</h3></a></li>
					<li> <a href="#reference"><h3>REFERENCE</h3></a></li>
					<li> <a href="about.html"><h3>ABOUT</h3></a></li>
					<li> <a href="index.html"><h3>HOME</h3></a></li>
				</ul>
			</td>
		</tr>
		
		<tr>
		  <td class="border_left">     
			<h1 class="name">HIPER</h1>
		  </td>
		 
		  <td class="noborder">	</td>
	 
		</tr>
		<tr>
			<td class="noborder">      </td>
			<!-- Team flow -->
			<td class="border_right" style="height:400px">
			
				<p style="padding-left 20px"> <span id="goals"> </p>
			</td>
		</tr>
		<tr>
		<!-- User info -->		
		  <td class="border_left">  
			<h3 class="what"> Welcome </h3>
			<p  style="padding-left 20px"> user. </p>
		  </td>
		  <td class="noborder">	</td>	 
		 </tr>
		 
		 <tr>
			<td class="noborder">      </td>
		<!-- etc -->
			<td class="border_right">
				<ul>			
					<li> <a class="intext" href="#add_goal"><p>ADD GOAL</p></a></li>
					<li> <a class="intext" href="#friend"><p>CONNECT FRIEND</p></a></li>
					<li> <a class="intext" href="#change_profile"><p>CHANGE PROFILE</p></a></li>
				</ul>
			</td>
		</tr>
		
		<tr>
		  <td class="border_left">     
			<h3 class="what"> News </h3>
			<p  style="padding-left 20px"> Friend added a goal </p>
		  </td>
		 
		  <td class="noborder">	</td>
	 
		 </tr>
		 		<tr>
			<td class="noborder">      </td>

			<td class="border_right">
			<h3 class="what"> Personal goals </h3>
			<p  style="padding-left 20px"> list...</p>
			</td>
		</tr>
		
		<tr>
		  <td class="border_left">  
				<img src="img/iphone.png" width="150px">		 
		  </td>
		  <td class="noborder">	</td>
	 
		 </tr>
		</table>

	</div>

</body>
</html>
	

	



