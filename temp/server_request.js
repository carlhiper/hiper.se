
function serverRequest(str) {
	// Create JSON string
	xml_str = '<Data><command>get_company_list</command><id>2</id></Data>';
	json_str = '{command:get_company_list,id:2}';
	if (str.length == 0) { 
		return;
	} else {
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				var myArr = JSON.parse(xmlhttp.responseText);
				var txt="";
				for(i = 0; i<myArr.length; i++){
					txt += myArr[i].name + "<br>" + myArr[i].info + "<br>" + myArr[i].reg_date + "<hr>";
				}
				document.getElementById("companies").innerHTML = txt;
			}
			document.getElementById("readystate").innerHTML = xmlhttp.readyState;
			document.getElementById("status").innerHTML = xmlhttp.status;
			document.getElementById("responseType").innerHTML = XMLHttpRequest.responseType;
		}
		xmlhttp.open("GET", 'http://90.225.70.16/hiper/hiper_server.php?q='+xml_str, true);
		xmlhttp.send();
	}	
}
