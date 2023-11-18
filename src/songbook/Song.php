<!DOCTYPE html>
<html>
<head>
	<meta name="robots"><meta charset="utf-8" />
	<title><?php echo urldecode($_GET["song"]); ?></title>
	<meta name="keywords" content="Walls & Birds, walls, birds, song" />
	<meta name="description" content="" />
	<link href="song.css" rel="stylesheet">
    
</head>

<script type="text/javascript">
	
	var roots = [			
			"A", "A", 
			"A#", "Bb",
			"B", "B",
			"C", "C",
			"C#", "Db",
			"D", "D",
			"D#", "Eb",
			"E", "E",
			"F", "F",
			"F#", "Gb",
			"G", "G",
			"G#", "Ab"
			]; 
			
	var qualities = [" ", "\n", "maj", "m", "maj7", "7", "min7", "dim", "m7b5", "7b5", "7#5", "7b9", "6", "6/9", "sus2", "sus4"];

	
	
	function allPartners(arrayA, arrayB) {
		var result = new Array(arrayA.length * arrayB.length);
		for (a = 0; a < arrayA.length; a++) {
			for (b = 0; b < arrayB.length; b++) {
				result[(a*arrayB.length) + b] = arrayA[a].concat(arrayB[b]); 
			};
		};
		
		return result;
	};
	
	function setUpMappingTable (array, steps) {
		if (Math.abs(steps) <= 12) {
			var absoluteSteps = (steps + 12) % 12;			//ein halbton runter = 11 halbtöne hoch
			var shift = absoluteSteps * (roots.length / 12) * qualities.length;
			var result = {};
			for (i = 0; i < array.length; i++) {
				result[array[i]] = array[(i + shift) % array.length]; //objects vom typ A:"A#"
			};
			console.log(result);
			return result;
		}
		return array;
	};
	
	function transpose(steps) {
		
		var allChords = allPartners(roots, qualities); //bastelt ein array aus allen möglichen vorkommenden Akkorden
		
		var mappingTable = setUpMappingTable(allChords, steps);
		
		//austauschen der Strings aus allChords anhand der Tabelle mit den Zuordnungspaaren
		var reg = new RegExp(Object.keys(mappingTable).join("|"),"g");
		document.getElementById("songtextDisplay").innerHTML = 
			document.getElementById("songtextDisplay").innerHTML.replace(reg, function(matched){
 				return mappingTable[matched];
			});
		
	};
	
	function transposeUp() {
		transpose(1);
	};
	function transposeDown() {
		transpose(-1);
	};

</script>


<body>

<?php
	header('Content-Type: text/html; charset="UTF-8"');
	
	$songtextDisplayed = "";
	
	$folder = "wallsandbirds";
	if ($_GET["folder"]) {
   		$folder = $_GET["folder"];
   	};
	$filedir = $folder . "/" . urldecode($_GET["song"]) . ".txt";
	$songtext =fopen($filedir, "r");
	
	
	if ($songtext) {	
		echo "<h1>" . fgets($songtext) . "</h1>";	//zeige titel als h1 an
		$root = fgets($songtext);
		$songtextDisplayed = $songtextDisplayed .  '<pre>' . substr($root, 0, 5) . '<a href="javascript:transposeDown()">-</a> ' . trim(substr($root, 5, 8)) . ' <a href="javascript:transposeUp()">+</a></pre>';
		while (!feof($songtext)) {
			$line = fgets($songtext);				//ausgelesene zeile
			if (trim($line) == "") { 				//zeile ist nur zeilenumbruch
				$songtextDisplayed = $songtextDisplayed . "<p style='line-height:20%'><br></p>"; 						//muss ueber br eingefuegt werden
			} else {
				$songtextDisplayed = $songtextDisplayed . "<pre>" . $line . "</pre>";	//zeilen mit inhalt werden ausgegeben, pre sorgt fuer anzeige aller whitespaces
			}
		}
		echo '<div id="songtextDisplay">' . $songtextDisplayed . '</div>';
		
	}
	fclose($filedir);
	
	
	
?>
</body>


