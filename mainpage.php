<?
	session_start();
	//include("javascript.js");
	include("connection.php");
	$query="SELECT description FROM posters WHERE id='".$_SESSION['id']."'LIMIT 1";
	$result=mysqli_query($link,$query);



	$row = mysqli_fetch_array($result);
	$poster = $row['description'];

	//$row = mysqli_fetch_array($result);
	
	//$diary=$row['diary'];
?>

<?php
	if($error){
		echo addcslashes($error);
	}
?>


<a href ="index.php? logout=1">Log Out<a>

<textarea><?php echo $poster;?></textarea>

<form method="post">
<input type="float" name="gpsx" value=<?php echo $_POST['gpsx']?> >
<input type="float" name="gpsy" value=<?php echo $_POST['gpsy']?> >
<input type="submit" name="postOnline" value="Post Online"/>
</form>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    
    <!--     <script src="js/bootstrap.min.js"></script>    -->

<script>
	
$("textarea").keyup(function() {

	$.post("updateposter.php",{poster:$("textarea").val()});

});

</script>








<?php
echo $_SESSION['id']."<br>";
if ($_POST['postOnline']=="Post Online"){
$query="UPDATE posters SET gpsx ='".$_POST['gpsx']."' WHERE id='".$_SESSION['id']."'LIMIT 1";
	
mysqli_query($link,$query);
$query="UPDATE posters SET gpsy ='".$_POST['gpsy']."' WHERE id='".$_SESSION['id']."'LIMIT 1";
mysqli_query($link,$query);
}





$query = "SELECT `id`,`gpsx`,`gpsy`,`description` FROM `posters` WHERE `gpsx` != 0";

if ($result=mysqli_query($link, $query)) {
//echo mysqli_num_rows($result);
	$phpId = array();
	$phpGpsx = array();
	$phpGpsy = array();
	$phpPoster = array();
	
while ($row = mysqli_fetch_array($result)) {
//echo "id: " . $row["id"]. " - gps: " . $row["gpsx"]. " " . $row["gpsy"]. "<br>";
//echo $row. "<br>";
array_push($phpId, $row["id"]);
array_push($phpGpsx, $row["gpsx"]);
array_push($phpGpsy, $row["gpsy"]);
array_push($phpPoster, $row["poster"]);
}


} else {

echo "It failed";
}

//print_r($row);

?>

<html> 
<head> 
<meta name="viewport" content="initial-scale=1.0, user-scalable=no" /> 
<style type="text/css"> 
html { height: 100% } 
body { height: 100%; margin: 0px; padding: 0px } 
#map_canvas { height: 60%;width: 60%; } 
</style> 

<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script> 


<script type="text/javascript">

function initialize() 
//this defines the center of the map when it is referred to in myOptions below
{ //var myLatlng = new google.maps.LatLng(42.276340, -83.737903); 

//this defines the zoom level 
var myOptions = {
//this defines the zoom level 
  zoom: 13,
  //center: myLatlng,
//ROADMAP can be changed to SATELLITE, TERRAIN, and HYBRID
  mapTypeId: google.maps.MapTypeId.ROADMAP
}
//this associates the map and options the map_canvas div layer
var map = new google.maps.Map(document.getElementById("map_canvas"), myOptions) ;



var jsId = <? echo json_encode($phpId); ?>;
var jsGpsx = <? echo json_encode($phpGpsx); ?>;
var jsGpsy = <? echo json_encode($phpGpsy); ?>;
var jsPoster = <? echo json_encode($phpPoster); ?>;


//jsGpsx = new Array (41.260556,41.263333,41.266983);
//jsGpsy = new Array (-95.929722,-95.927778,-95.931767);
icon = new Array ('BlueMushroom.png', 'RedMushroom.png', 'GoldenMushroom.png');
title = new Array ("BlueMushroom", "RedMushroom", "GoldenMushroom");
//content = new Array ("BlueMushroom<br><img src=BlueMushroom.png>","RedMushroom<br><img src=RedMushroom.png>","GoldenMushroom<br><img src=GoldenMushroom.png>");

//markers = new Array ();
 	  for (var i = 0; i < 20; i++) {
//myLatlng = new google.maps.LatLng(jsGpsx[i],jsGpsy[i]);

var infowindow = new google.maps.InfoWindow({
   content: jsPoster[i]
});

var marker = new google.maps.Marker({
    position: new google.maps.LatLng(jsGpsx[i],jsGpsy[i]),
    map: map,
//this creates a new html string for each 

    icon:icon[i],
	html: jsPoster[i],
    title: title[i]
});

google.maps.event.addListener(marker, 'click', function() { 
// Notice the change from marker to this. As you have all seen the event fires for each marker, but as you //were calling infowindow.open(map, marker) javascript engine’s memory location thingymabob (not good with //names) held the last reference to marker. But you had passed in the marker to the event, so by calling //this in place of marker, you get what you are looking for.
  infowindow.setContent(this.html);
  infowindow.open(map,this);
  
});
}

	    		navigator.geolocation.getCurrentPosition(function(position) {
	    		
		    		var geolocate = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
		    		var marker = new google.maps.Marker({
    				position: geolocate,
    				map: map,
					//this creates a new html string for each 

    				icon:'blueDot.png',
    				title: "Me!"
					});
		    		

		    		
		    		map.setCenter(geolocate);
		    		
	    		});




}

</script> 
</head> 

<body onLoad="initialize()"> 
<div id="map_canvas" style="width:1100px; height:700px"></div> 
</body> 
</html>
