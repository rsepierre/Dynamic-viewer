<?php
function listerRepertoire($where){

    $repertoire=opendir($where); // On ouvre le répertoire where
    $i=0;
	
	if($where!="content"){ echo "<li><h1>".substr(strrchr($where,'/'),1)."</h1><ul>"; }
    while(($objet=readdir($repertoire)) !== false){ // Si le répertoire existe on liste son contenu
		
		
        if($objet!="." && substr($objet, 0, 2)!=".." && substr($objet, -4, 4)!=".php" ){ // On filtre les "." ".." et ".php"
            if(is_dir($where."/".$objet)){ // Si l'objet est un répertoire on l'explore
				listerRepertoire($where."/".$objet);			
            }else{ // Si c'est un fichier
			
					$URL = "http://" . $_SERVER['HTTP_HOST'] . preg_replace("#/[^/]*\.php$#simU", "/", $_SERVER["PHP_SELF"]);
					$URL .= $where."/".$objet;
					$LOCALURL = $where."/".$objet;
					
					switch(strrchr($objet,'.')){
					
						case ".txt" :
							echo '<li><a href="content.php?type=txt&url='.$LOCALURL.'" target="content">'.$objet.'</a></li>';
							break;
						case ".doc" :
							echo '<li><a href="https://docs.google.com/gview?url='.$URL.'&embedded=true" target="content">'.$objet.'</a></li>';
							break;
						case ".odt" :
							echo '<li><a href="https://docs.google.com/gview?url='.$URL.'&embedded=true" target="content">'.$objet.'</a></li>';
							break;
						case ".docx" :
							echo '<li><a href="https://docs.google.com/gview?url='.$URL.'&embedded=true" target="content">'.$objet.'</a></li>';
							break;
						case ".rtf" :
							echo '<li><a href="https://docs.google.com/gview?url='.$URL.'&embedded=true" target="content">'.$objet.'</a></li>';
							break;
						case ".jpg" :
							echo '<li><a href="content.php?type=image&url='.$LOCALURL.'" target="content">'.$objet.'</a></li>';
							break;
						case ".jpeg" :
							echo '<li><a href="content.php?type=image&url='.$LOCALURL.'" target="content">'.$objet.'</a></li>';
							break;
						case ".png" :
							echo '<li><a href="content.php?type=image&url='.$LOCALURL.'" target="content">'.$objet.'</a></li>';
							break;
						case ".bmp" :
							echo '<li><a href="content.php?type=image&url='.$LOCALURL.'" target="content">'.$objet.'</a></li>';
							break;
						case ".gif" :
							echo '<li><a href="content.php?type=image&url='.$LOCALURL.'" target="content">'.$objet.'</a></li>';
							break;
						default :
							echo '<li>'.$objet.'</li>';
					
					}
			}
            $i++;
        }
		
    }
	if($where!="content"){
	echo "</ul></li>"; 
	}
}
?>

<html>
<head>
	<title>ANNONCIATION</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<link rel="stylesheet" type="text/css" href="simpletree.css" />
	<style type="text/css">
	
		#signatureTexte{
		visibility: hidden;  
		display: block;
		z-index:998;
		text-align:justify;
		font-family:Monaco;
		font-size:8px;
		text-transform:uppercases;
		color:#000;
		}
		
		position:fixed;
		#signature{
		bottom:10px;
		left:10px;
		display: block;
		width:600px;
		z-index:999;
		}
		
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
		position: fixed;
		padding:20px;
		top: 0px;
		right: 0px;
		left: 0px;
		bottom:0px;
		color: #000;
		background-color: #F5F5F5;
		text-align: justify;
		}

		#allcontent{
		position: absolute;
		top: 0px;
		left: 0px;
		bottom:0px;
		overflow:auto;
		right: 0px;
		}


		li {
		width: 300px;
		float:left;
		margin: 10px;
		border-top-style: solid;
		border-top-width:0px;
		border-top-color: black;
		list-style-type: none;
		border-left-style: solid;
		border-left-width: 1px;
		border-left-color: black;
		}
		
		ul {	
		list-style-type: none;
		}

		a:link { color : black; text-decoration: underline }
		a:hover { color : black; text-decoration: underline }
		a:visited { color : black; text-decoration: underline }
	</style>
	<script type="text/javascript" src="simpletreemenu.js">
		/***********************************************
		* Simple Tree Menu- © Dynamic Drive DHTML code library (www.dynamicdrive.com)
		* This notice MUST stay intact for legal use
		* Visit Dynamic Drive at http://www.dynamicdrive.com/ for full source code
		***********************************************/
	</script>
	<script>
		/***********************************************
		* JS signature site
		***********************************************/
		function show(id) {document.getElementById(id).style.visibility = "visible";}
		function hide(id) {document.getElementById(id).style.visibility = "hidden";}
	</script>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js">
	</script>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js">
	</script>
</head>
<body>
	<div id="allcontent">
	<div id="signature">
		<table><tr>
		<td>
		<span class="copyright" onMouseOver="show('signatureTexte')" onMouseOut="hide('signatureTexte')">&copy;</span>
		</td>
		<td>
		<div id="signatureTexte">PIERRE ROSE & JEREMIE DENIAU</div>
		</td>
		</tr></table>
	</div>	


<ul id="treemenu" class="treeview">
<li><br><h1>L'ANNONCIATION</h1>
<br>
	<ul class="flat" >
		<?php
		listerRepertoire("content");
		?>
		
	</ul>
</li>
</ul>




					


<br>



<script type="text/javascript">
ddtreemenu.createTree("treemenu", false )
</script>
</div>
</body>
</html>