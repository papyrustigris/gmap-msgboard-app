<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    
    <style type="text/css">
      html { height: 100% }
      body { height: 100%; margin: 0; padding: 0; background-color:#5FBE7C;}
      
      #map-canvas { height:79%; width:100%; }
      
      .nav-bar {height:11%; background-color:white; border-bottom:3px black solid; }
      	  .nav-bar-content {position:relative; top:16px; }
      	  	#logo {position:relative; top:8px;}
      	  	
      .nav-bar-bottom {height:9%; border-top:4px black solid;}
      .nav-bar-bottom:hover{border-top:4px red solid;}
      
      .nav-bar-bottom {background-color:#5FBE7C; text-align:center; }
      		#btmnav {position:relative;	}
          
     
      a{text-decoration:none;}
      	.r-btn{float:right; position:relative; right:4px;
      	         height:46px; width:46px;}
      	
      	.l-btn{float:left; position:relative; left:4px;
      		 height:46px; width:46px;}
                        
        .contentString{color:blue; font-size:18px;}  
      	
    </style>

<!-- google maps javascript API access activation -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDmz8eH21-SKupsw3nAD7RqlBY1wvNf7vU"></script>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>

<!-- drawing/places js libraries -->
    <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?libraries=drawing"></script>
    <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?libraries=places"></script>



			<!--                        map javascriPt			   -->
	
	<script type="text/javascript">
	
var geocoder;
var map;
var infowindow = new google.maps.InfoWindow();
var marker;

function initialize() {
  geocoder = new google.maps.Geocoder();
  var mapOptions = {
    zoom: 13,
     };
  map = new google.maps.Map(document.getElementById('map-canvas'),
      mapOptions);

  // Try HTML5 geolocation
  if(navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {
      var pos = new google.maps.LatLng(position.coords.latitude,
                                       position.coords.longitude);
       
      
     marker = new google.maps.Marker({
     position:pos,
       });       
                      
var lat = marker.getPosition().lat();
var lng = marker.getPosition().lng();          
      
  var latlng = new google.maps.LatLng(lat, lng);
  
  geocoder.geocode({'latLng': latlng}, function(results, status) {
    if (status == google.maps.GeocoderStatus.OK) {
      if (results[1]) {
        map.setZoom(15);
         
            var marker = new google.maps.Marker({
            position: latlng,
            draggable: true,
            map: map
            });       

// "<a href='/drupal-7.31'>" + results[0].formatted_address + "</a>"			
// var spaces = y[0].split(" "); 
//var noSpaces = spaces.join("");
//var xx = "<a href='/drupal-7.31/node/" + noSpaces + "'>" + y[0] + "</a>";

			
		      var x = results[0].formatted_address;
		      var y = x.split(",");
		      var z = "<a href='/drupal-7.31'>" + y[0] + "</a>" + "<br>" + "26 the Hamlet";
  
		      infowindow.setContent(z);
		      infowindow.open(map,marker);
		       
      } else {
        alert('No results found');
      	     }
	    } else {
	      alert('Geocoder failed due to: ' + status);
	           }
  	});
  
        map.setCenter(latlng);
             
    }, function() {
      handleNoGeolocation(true);
    });
  } else {
    // Browser doesn't support Geolocation
    handleNoGeolocation(false);
  }
	
  
}

google.maps.event.addDomListener(window, 'load', initialize);


 </script>
 
     			<!-- 			END OF MAPLOAD SCRIPT				-->
     
     
     
  </head>
  
   
  <body>
	 
     <div class="nav-bar">
       <div class="nav-bar-content">
        <a class="l-btn"href="login.php?action=logout"><img src="/images/exit_icon.png" alt="exit" height="46px" width="46px" /></a>
        <a class="r-btn" href=""><img src="/images/settings_icon.png" alt="settings" height="46px" width="46px" /></a>    	
  	
  	<center><img src="/images/" id="logo" alt="wth" height="30px" /></center>
      </div>
    </div>
    	
    					<div id="map-canvas"></div>
    	
	<div class="nav-bar-bottom">   
	
	<img src="/images/btmnavbar.png" id="btmnav" alt="btmnav" />
	
	</div>
	
  </body>
</html>