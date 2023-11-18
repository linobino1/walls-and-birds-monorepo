<!DOCTYPE html>
<html>
<head>
	<meta name="robots" content="noindex"><meta charset="utf-8" />
	<!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
	<title>WALLS & BIRDS</title>
	<meta name="keywords" content="Walls & Birds, walls, birds, songs, lyrics, chords, text" />
	<meta name="description" content="The Walls & Birds Songbook" />
	<link href="../styles/style.css" rel="stylesheet">
    
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
    	<a href="../index.php"><img alt="Walls & Birds" src="../styles/img/title4.png" style="width:100%; transform:translateY(35%); -ms-transform:translateY(35%); -webkit-transform:translateY(35%);"></a>
	</header><!-- .header-->
	<main class="content">
		<h2>The Walls & Birds Songbook</h2>
        <br>
        

        <?php
   			$folder = "wallsandbirds";
   			if (@$_GET["folder"]) {
   				$folder = $_GET["folder"];
   			};
   			$files = glob($folder . "/*.txt");
   			
   			
   			#HTML output
   			foreach ($files as $file) {
   				$songname = basename($file, ".txt");
   				echo '<a href="Song.php?folder=';
   				echo urlencode($folder);
   				echo '&song=';
   				echo urlencode($songname);
   				echo '">';
   				echo $songname;
   				echo '</a><br>';
   			};
   
		?>
    
    <br><hr><br>
    
    
    
	</main><!-- .content -->

</div><!-- .wrapper -->

</body>
</html>