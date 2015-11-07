<?php

    $this->layout = false;
    
?>

<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8' />
<link href='/css/fullcalendar.css' rel='stylesheet' />
<link href='/css/fullcalendar.print.css' rel='stylesheet' media='print' />
<script src='/js/moment.min.js'></script>
<script src='/js/jquery.min.js'></script>
<script src='/js/fullcalendar.min.js'></script>
<script src='/js/calendar.js'></script>
<script src="/js/jquery.qtip-1.0.min.js"></script>


 <script type = "application/javascript">
         function loadJSON(){
            var datafile = "/events/feed?start=2015-11-01&end=2015-12-13&_=1446847237104";
            var http_request = new XMLHttpRequest();
			
			
			
            http_request.onreadystatechange = function(){
			
               if (http_request.readyState == 4  ){
                  // Javascript function JSON.parse to parse JSON data
                  //var jsonObj = JSON.parse(http_request.responseText);
				  console.log(http_request.responseText);
				  
                  // jsonObj variable now contains the data structure and can
                  // be accessed as jsonObj.name and jsonObj.country.
                  document.getElementById("output").innerHTML = http_request.responseText;
                 
               }
            }
			
           http_request.open("GET", datafile, true);
           //http_request.setRequestHeader("Accept", "application/json");
           
           //http_request.send();
         }
		

      </script>

<style>

	body {
		margin: 40px 10px;
		padding: 0;
		font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
		font-size: 14px;
	}

	#calendar {
		max-width: 900px;
		margin: 0 auto;
	}

</style>
</head>
<body onload="loadJSON();">
	<div id = "output"></div>

	<div id='calendar'></div>

</body>
</html>
