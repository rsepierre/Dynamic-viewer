<html>
<head>
	<title>Visualisation</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
<?php
 if (isset($_GET["url"])) {
                    $url = $_GET["url"];
                    $type = $_GET["type"];
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