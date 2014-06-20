
<!-- saved from url=(0041)http://bonjourjeanjacques.org/acte03.html -->
<html>
<head>
	<title>Visualisation</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<style type="text/css">		
		h1 { 
		text-align:left;
		font-family:arial;
		font-size:12px;
		color:red;
		text-transform:uppercase;
		}
		
		@charset "UTF-8";
		
		@font-face {
		font-weight: normal;
		font-style: normal;
		}	

		body {
		font-family:'Times New Roman';
		font-size: 13px;
		color: black;
		background-color: #F5F5F5;
		text-align: justify;
		}
		
		ul {	
		list-style-type: none;
		}
		
		.chapeau {
		padding-top: 5%;
		padding-left: 15%;
		padding-right: 30%;
		font-size:200%;
		line-height:130%;

		a:link { color : black; text-decoration: underline }
		a:hover { color : black; text-decoration: underline }
		a:visited { color : black; text-decoration: underline }
	</style>
</head>
<body>
<?php
$type = $_GET["type"];
$url = $_GET["url"];
 if (isset($type)) {
					if ($type=="image") { 
					echo '<img src="'.$url.'" style="width:auto;margin-right:10%;margin-left:10%;max-height:80%;margin-top:5%;margin-bot:auto;">';
					}
					elseif ($type=="txt"){
											$handle = fopen($url, 'ru');
											if ($handle)
											{
											while (!feof($handle))
											{
											$buffer = fgets($handle);
											echo '<p class="chapeau">'.$buffer.'</p>';
											}
											fclose($handle);
											}
					}
} else {
		$handle = fopen('presentation.txt', 'ru');
		if ($handle)
		{
		while (!feof($handle))
		{
		$buffer = fgets($handle);
		echo '<p class="chapeau">'.$buffer.'</p>';
		}
		fclose($handle);
		}
}
?>
</body>
</html>