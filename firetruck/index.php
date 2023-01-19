<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<meta name="geo.region" content="DE-BE" />
<meta name="geo.placename" content="Berlin" />
<meta name="geo.position" content="52.514431;13.596943" />
<meta name="ICBM" content="52.514431, 13.596943" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="Walls & Birds is your favourite Band from Germany." />
<meta name="keywords" content="Walls & Birds, walls, birds, band, live, music, berlin, germany, deutschland, karlsruhe, atlantic bar, tape, cassette, lucky one, nothing at all, mazzy star, frankfurt, ladybird, tillie bedeau, leo hilsheimer, jannis kleiss, tour, merch, merchandise, lyrics, album, ticket, mp3, download, cd, chords, buy, song text, konzert, mekka, blogspot, booking, hfg karlsruhe, synthesizer, casio, kawai 100f, yamaha dx7, roland jx-8p, john lennon, bob dylan, miami, liquor, 80s, jam, impro, show, festival" />
<title>WALLS & BIRDS</title>
<link href="styles/firetruck.css" rel="stylesheet" type="text/css" />
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-57006890-1', 'auto');
  ga('send', 'pageview');

</script>
<script type="text/javascript">
	var contentShown = 0; //0: nichts, 1: dates, 2: buy, 3: player
	var musicplaying = false; 
	function hideContent() {
		switch (contentShown) {
			case 0: break;
			case 1: document.getElementById("datescontent").style.display = "none"; break;
			case 2: document.getElementById("buycontent").style.display = "none"; break;
			case 3: hideNotification(); break;
		}
	}
	function showDates() {
		ga('send', 'event', 'navigation', 'open', 'live');
		if (document.getElementById("datescontent").style.display == "none") {
			hideContent();
			document.getElementById("datescontent").style.display = "inline";
			contentShown = 1;
		} else {
			document.getElementById("datescontent").style.display = "none";
		}
	}
	function showBuy() {
		if (document.getElementById("buycontent").style.display == "none") {
			hideContent();
			document.getElementById("buycontent").style.display = "inline";
			contentShown = 2;
		} else {
			document.getElementById("buycontent").style.display = "none";
		}
	}
	function showAutoplayNotification() {
		if (document.getElementById("autoplayNotification").style.display == "none") {
			hideContent();
			document.getElementById("autoplayNotification").style.display = "inline";
			contentShown = 3;
		} 
	}
	function hideNotification() {
		ga('send', 'event', 'navigation', 'open', 'play');
		if (document.getElementById("autoplayNotification").style.display == "inline") {
			document.getElementById("autoplayNotification").style.display = "none";
		}
	}
		
	
	function togglemusic(action) {		//0: init, 1: toggle(play if paused, pause if playing), 2 oder andere: pause
		var plr = document.getElementById("audioplayer");
		
		if (action == 0) {				//either start playing automatically or show dialog
			var promise = document.getElementById('audioplayer').play();
			if (promise !== undefined) {		//check if browser blocks autoblock. if no, play
				promise.then(function() {
					//working!
					document.getElementById("playpauseimg").src = "styles/img/pause_white.png";
					musicplaying = true;					
				}).catch(function() {			//if yes, show notification
					//autoplay blocked!
					showAutoplayNotification();
					document.getElementById("playpauseimg").src = "styles/img/play_white.png";
					musicplaying = false;
				});
			} 	
		} else if ((action == 1) && !musicplaying) {			//player is paused, start playing!
			plr.play();
			hideNotification();
			document.getElementById("playpauseimg").src = "styles/img/pause_white.png";
			musicplaying = true;
		} else {									//player is playing, pause it!
			plr.pause();
			document.getElementById("playpauseimg").src = "styles/img/play_white.png";
			musicplaying = false;
		}
	}
</script>

<script type="text/javascript">
var toggle = -1;
function toggletitle(val)
{
var speed = 4000;
if(toggle < 1){
	document.title = "WALLS & BIRDS";
	timer = window.setTimeout("toggletitle("+toggle+")",speed);
	toggle++;
} else {
	document.title = "WALLS & BIDRS";
	timer = window.setTimeout("toggletitle("+toggle+")",speed);
	toggle = 0;
} 
}
toggletitle(0);
</script>
</head>

<body>

<video  autoplay muted loop id="bgvid">
  <source src="styles/vid/1.mp4" type="video/mp4">
  <source src="styles/vid/1.webm" type="video/webm">

</video>

<audio id="audioplayer" loop onloadeddata="javascript:togglemusic(0);">
  <source src="styles/sound/kommhere64short.mp3" type="audio/mpeg" preload="auto" >
  
Your browser does not support the audio element.
</audio>


<div id="container">



<div id="oben"></div>
 <center><div id="title">
  <img id="titelbild" src="styles/img/title3.png" alt="WALLS & BIRDS"/>
 </div></center>
  <div id="underthetitle">
   
   <div class="spoiler">
    <!-- <p>- New tape "Daytona Beach" is there! Order <a href="https://wallsandbirds.bandcamp.com/album/daytona-beach" target="_blank">here</a>. -</p> -->
   </div>
   
  </div>

  
  
</div>


 
  
<div id="unten">

    
<div id="datescontent" class="footcontent" style="display:none">
  <h1>Upcoming shows:</h1>
  
	<?php
	$servername = getenv('OLD_DB_HOST');
	$username = getenv('OLD_DB_USER');
	$password = getenv('OLD_DB_PASS');
	$dbname = getenv('OLD_DB_NAME');

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	mysqli_set_charset($conn,"utf8");
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 
	

	//select all shows more recent than 3 months from today, ordered by date 
	$sql = "SELECT DATE_FORMAT(day, '%b %d, %y') AS dayFormat, `city`, `location`, `eventname`, `link` FROM `live` WHERE day >= (DATE_SUB(CURDATE(), INTERVAL 3 MONTH)) ORDER BY day DESC";
	$result = $conn->query($sql);
	
	if ($result && $result->num_rows > 0) {
	    // output data of each row
	    while($row = $result->fetch_assoc()) {
	    	echo "<p>";
	    	echo $row["dayFormat"];
	    	echo " | ";
	    	echo $row["city"];
	    	echo " | ";
	    	if ($row["eventname"] == NULL) {
				echo "<a href ='";
				echo $row["link"];
				echo "' target='_blank'>";
				echo $row["location"];
				echo "</a>";
				// So: <p>Apr 22, 2016 | Berlin | <a href="www.vn.de" target="_blank">Villa Neukölln</a></p>
			} else {
				echo $row["location"];
				echo " | ";
				echo "<a href ='";
				echo $row["link"];
				echo "' target='_blank'>";
				echo $row["eventname"];
				echo "</a>"; 
				//// So: <p>Apr 22, 2016 | Berlin | about blank | <a href="www.dbtr.de" target="_blank">dbtr festival</a></p>
			}
	    	echo "</p>";
	    		        //echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
    	}
	} else {
	    echo "0 results";
	}
	
	$conn->close();
	?>
  </div>
 
 
  <div id="buycontent" class="footcontent" style="display:none"> <!-- "music"-button -->
   <h1>Daytona Beach</h1>
   <p>Daytona Beach is out on tape since March 31st, 2016. Available on <a onclick="javascript:togglemusic(2)" href="https://wallsandbirds.bandcamp.com/album/daytona-beach" target="_blank">bandcamp</a>. For more information read this <a href="http://wallsandbirds.com/goodbye_solitude_ia_mid.pdf" target="_blank">article</a> by Elinor Ljunkvist.</p>
   <p>For those who bought the early prerelease tape version, you can download the digital files <a href="/download/index.html" target="_blank">here</a>.</p>
   <br>
   <h1>Other releases</h1>
   <p>Visit <a onclick="javascript:togglemusic(2)" href="https://wallsandbirds.bandcamp.com" target="_blank">bandcamp</a> to find our older releases like the 'Atlantic Bar' or the very first Walls & Birds EP.</p>
   <p>We keep our Singles and other songs that don't belong anywhere else on <a onclick="javascript:togglemusic(2)" href="https://soundcloud.com/wallsandbirds" target="_blank">Soundcloud</a>.</p>
   <br>  
  </div> 
  
  <div id="autoplayNotification" class="footcontent" style="display:none"> <!-- wenn der browser audio autoplay blockt -->
   <center><p>play a little music if you want to by clicking the play button</p></center>     
  </div>

  <div id="centerer">
   <div id="dates"><a href="javascript:showDates()">live</a></div>
   <div id="buy"><a href="javascript:showBuy()">music</a></div>
   <div><a onclick="javascript:togglemusic(2)" href="https://www.youtube.com/user/wallsandbirds" target="_blank">videos</a></div>
   <div><img id="playpauseimg" src="styles/img/play_white.png" style="position:relative;top:2px;height:12px;" onclick="javascript:togglemusic(1);"></div>
   <div><a href="http://www.facebook.com/wallsandbirds" target="_blank">facebook</a></div>
   <div><a href="mailto:judy@wallsandbirds.com">@email</a></div>
   <div><a href="impressum.html" target="_blank">impressum</a></div>
  </div>
 
</div>


</body>
</html>
