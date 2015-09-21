
<!DOCTYPE html>
<html lang="en">
<?php 
  include("connection.php");
?>
    if (isset($_GET['Logout'])) {
setcookie("id","",time()-3600);
header("location:index.php");
  }
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Oooosers</title>

    <!-- Bootstrap core CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

  </head>

  <body role="document">

    <!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">

        <div class="navbar-header">
          <a class="navbar-brand" href="http://79.170.44.213/yingzi0310.com/ooosers/index.php">Ooosers</a>
        </div>

        <div id="navbar" class="navbar-collapse ">

          <ul class="nav navbar-nav">
            <li class="active"><a href="http://79.170.44.213/yingzi0310.com/ooosers/editprofile.php">Edit Profile</a></li>
            <li><a href="#about">Contacts</a></li>
            <li><a href="http://79.170.44.213/yingzi0310.com/ooosers/searchsetting.php">Search Setting</a></li>
            <li><a href="#message">Message</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">My Poster <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="http://79.170.44.213/yingzi0310.com/ooosers/newpost.php">New Poster</a></li>
<?php 
$query = "SELECT `subject`,`posterId`,`descrition`,`category`,`reward`FROM `posters` WHERE `id` = '".$_COOKIE['id']."'";

        if ($result=mysqli_query($link, $query)) {

            while ($row = mysqli_fetch_array($result)) {?>
            <li><a href="#"><?php echo $row["subject"]?></a></li>
  <?php
            }
        }

?>
              </ul>
            </li>
          </ul>
<!--/.signin -->
<?php 


    if (isset($_GET['Logout'])) {
setcookie("id","",time()-3600);
header("location:index.php");
  }




  if (isset($_COOKIE['id']))
{



echo "Welcome, ".$_COOKIE['id'];
echo "<a href='index.php?Logout=true'>Logout</a>";

//session_destroy();
//setcookie("id","",time()-3600);
  }
   else 
{
  echo "Welcome, guest!";
echo "&nbsp;&nbsp;";
echo "<a href='login.php'>Login/Signup</a>";
}





?>


        </div><!--/.nav-bar -->
      </div><!--container-->
    </nav>

    <?php
$query = "SELECT `id`,`gpsx`,`gpsy`,`descrition` FROM `posters` WHERE `gpsx` != 0";

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
array_push($phpPoster, $row["descrition"]);
}


} else {

echo "It failed";
}


    ?>


    <div  style="background-color:blue;" >
        <div id="googleMap" style="width:100%;height:780px;padding-top: 2cm;"></div>
<script src="http://maps.googleapis.com/maps/api/js"></script>
<script>
function initialize() {
  var mapProp = {
    //center:new google.maps.LatLng(51.508742,-0.120850),
    zoom:13,
    mapTypeId:google.maps.MapTypeId.ROADMAP
  };
  var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
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
google.maps.event.addDomListener(window, 'load', initialize);
</script>




    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

  </body>
</html>
