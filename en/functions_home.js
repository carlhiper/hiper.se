function load_news(lang, nbr) {
	// Create XML string
	xml_str = '<Data><language>se</language><amount>'+nbr.toString()+'</amount></Data>';
	if (nbr.length == 0) { 
		return;
	} else {
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				var myArr = JSON.parse(xmlhttp.responseText);
				var txt="";
				for(i = 0; i<myArr.length; i++){
					txt += '<p style="font-size:20px;line-height:12px;font-weight:bold">';
					txt += myArr[i].dat + '</p><p style="font-size:16px;line-height:12px;">';
					txt += myArr[i].text + "</p>";
				}
				if (nbr == 3){
					document.getElementById("news_se_top3").innerHTML = txt;
				}else{
					document.getElementById("news_se_all").innerHTML = txt;							
				}
			}
		}
		if (lang=='en'){
			xmlhttp.open("GET", 'http://90.225.70.16/hiper/en/get_news_en.php?q='+xml_str, true);
		}else{
			xmlhttp.open("GET", 'http://90.225.70.16/hiper/get_news_se.php?q='+xml_str, true);
		}
		xmlhttp.send();
	}	
}

	
