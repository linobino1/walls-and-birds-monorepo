<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
	<title>WALLS & BIRDS</title>
	<meta name="keywords" content="Walls & Birds, walls, birds, band, live, music, berlin, germany, deutschland, karlsruhe, atlantic bar, tape, cassette, lucky one, nothing at all, mazzy star, frankfurt, ladybird, tillie bedeau, leo hilsheimer, jannis kleiss, tour, merch, merchandise, lyrics, album, ticket, mp3, download, cd, chords, buy, song text, konzert, mekka, blogspot, booking, hfg karlsruhe, synthesizer, casio, kawai 100f, yamaha dx7, roland jx-8p, john lennon, bob dylan, miami, liquor, 80s, jam, impro, show, festival" />
	<meta name="description" content="" />
	<link href="style.css" rel="stylesheet">
    <link href="ins-imgs.css" rel="stylesheet">
    
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

<div class="wrapper">
	<header class="header">
    	<a href="../index.html"><img alt="Walls & Birds" src="../img/title4.png" style="width:100%; transform:translateY(35%); -ms-transform:translateY(35%); -webkit-transform:translateY(35%);"></a>
	</header><!-- .header-->
	<main class="content">
		<h2>Info</h2>
        <br>
        This page is not to be shared in public. Technical Rider and Presstext at the bottom. Contact us via <a href="mailto:judy@wallsandbirds.com">email</a>.
        <br> 
        <br>
    	
        <h2>Music</h2>
        <br> 
        
    	<h3>Daytona Beach<h3>
		<iframe style="border: 0; width: 100%; height: 120px;" src="http://bandcamp.com/EmbeddedPlayer/album=1408131823/size=large/bgcol=ffffff/linkcol=0687f5/tracklist=false/artwork=small/transparent=true/" seamless><a href="http://wallsandbirds.bandcamp.com/album/daytona-beach">Daytona Beach by Walls &amp; Birds</a></iframe>        
        <br>
        <br>
        <h3>Sweet Lovin' Woman [live]<h3>
        <iframe width="100%" height="166" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/196666830&amp;color=ff5500&amp;auto_play=false&amp;hide_related=false&amp;show_comments=true&amp;show_user=true&amp;show_reposts=false"></iframe>
        <h6><a target="_blank" href="https://soundcloud.com/wallsandbirds/sweet-lovin-woman">https://soundcloud.com/wallsandbirds/sweet-lovin-woman</a></h6>
        <br>
        <h3>Nothing At All<h3>
		<iframe width="100%" height="166" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/111748675&amp;color=ff5500&amp;auto_play=false&amp;hide_related=false&amp;show_comments=true&amp;show_user=true&amp;show_reposts=false"></iframe>
        <h6><a href="https://soundcloud.com/wallsandbirds/nothing-at-all-single-edit" target="_blank">https://soundcloud.com/wallsandbirds/nothing-at-all-single-edit</a></h6>
        
        <br>
        <hr>
        <br>
        <h2>Live</h2>
        <br>
        
        <div style="width:560px;height:315px;margin: 0 auto;">
         <video controls width="560px" height="315px">
          <source src="vid/bossa854.mp4" type="video/mp4">
         </video>
        </div>
        
        <br><hr><br>
        <h2>Video</h2>
        <br>
        <h3>Mary Ann's Daughter<h3>
        <div style="margin-left:auto;margin-right:auto;display:block;width:560px;height:315px;">
        <iframe width="560" height="315" src="https://www.youtube.com/embed/6X3RffMNXJk" frameborder="0" allowfullscreen></iframe>
        </div>
        <br>
        <h3>(Everything Is) In The Pawnshop<h3>
        <div style="margin-left:auto;margin-right:auto;display:block;width:560px;height:315px;">
        <iframe width="560" height="315" src="https://www.youtube.com/embed/-p4FnTWy2u4" frameborder="0" allowfullscreen></iframe>
        </div>
        <br>
        <h3>The Lucky One<h3>
        <div style="margin-left:auto;margin-right:auto;display:block;width:560px;height:315px;">
        <iframe width="560" height="315" src="https://www.youtube.com/embed/ipJWUXkRrjg" frameborder="0" allowfullscreen></iframe>
        </div>
        
        <br><hr><br>
        <h2>Photo</h2>
        <br>
        <center>
        <?php
    # To prevent browser error output
    #header('Content-Type: text/javascript; charset=UTF-8');

    # Add images to array
    $images = glob("pressefotos/*.jpg");

    # Sort the images based on its 'last modified' time stamp
    $sortedImages = array();
    $count = count($images);
    for ($i = 0; $i < $count; $i++) {
        $sortedImages[date ('YmdHis', filemtime($images[$i])).$i] = $images[$i];
    }

    # Set to 'false' if you want the oldest images to appear first
    $newest_images_first = true;

    # Sort images in array
    if($newest_images_first) {
        krsort($sortedImages);
    } else {
        ksort($sortedImages);
    }

    # Generate the HTML output
    echo '<ul class="ins-imgs">';
    foreach ($sortedImages as $image) {

        # Get the name of the image, stripped from image folder path and file type extension
        $name = ''.substr($image,12,strpos($image, '.')-12);

        # Begin adding
        echo '<li class="ins-imgs-li">';
        echo '<div class="ins-imgs-img">';
        echo '<img src="'.$image.'" alt="'.$name.'" title="'.$name.'">';
        echo '</div>';
        echo '<div class="ins-imgs-label">'.$name.'</div>';
        echo '</li>';
    }
    echo '</ul>';
	?>
	</center>
    
    <br><hr><br>
    <h2>Shows</h2>
    <br>
    
    	<?php
	$servername = getenv('DB_HOST');
	$username = getenv('DB_USER');
	$password = getenv('DB_PASS');
	$dbname = getenv('DB_NAME');

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	mysqli_set_charset($conn,"utf8");
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 
	

	//select all shows more recent than 3 months from today, ordered by date 
	$sql = "SELECT DATE_FORMAT(day, '%b %d, %y') AS dayFormat, `city`, `location`, `eventname`, `link` FROM `live` WHERE `location`!='' ORDER BY day ASC";
	$result = $conn->query($sql);
	
	if ($result->num_rows > 0) {
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
    
    
    <br><hr><br>
    <h2>Download</h2>
    <br>
    <a href="doc/W&B RIDER.pdf" target="_blank">Technical Rider</a>
    <br>
    <a href="doc/Walls & Birds Text.rtf" target="_blank">Pressetext</a>
    
    
	</main><!-- .content -->

</div><!-- .wrapper -->

</body>
</html>