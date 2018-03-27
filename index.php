<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Crawler</title>
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="crawler.css">
</head>
<body>
<header>
<br>
<center>Crawler</center>
</header>
<div id="menu">
<br>
        <form action="" method="GET">
            <center><input id="pole" type="text" name="search">
            <br>
            <br>
            <input id="przycisk" type="submit" value="Crawl!"></center>
        </form>
    </div>
    <div id="results">
    <br>
<?php
	error_reporting(E_ERROR | E_PARSE);
	
	if(isset($_GET["search"])){
		$url=$_GET["search"];
		//echo '<span id="linkurl">', $url, '</span>';
		
		$doc = new DOMDocument();
		//var_dump($doc);
		
		$doc->loadHTMLFile($url);
		//$doc->loadHTMLFile($url);
		//var_dump($doc);
		
		$tags = $doc->getElementsByTagName('a');
		$links = [];
		
		foreach ($tags as $tag) {
			$link = explode("#",$tag->getAttribute('href'));
			//var_dump($link);
			$link_final = $link[0];
			//var_dump($link_final); 
			
			$adres1 = "http://";
			$adres2 = "https://";
			$start1 = substr($link_final,0,7);
			$start2 = substr($link_final,0,8);
			
			if ($adres1 != $start1 and $adres2 != $start2) {
			$link_final = $url.$link_final;
			}
			array_push($links, $link_final);
			//echo $link_final, '<br>';
			
		}
		$links = array_unique($links);
		foreach ($links as $link) {
		echo '<span class="klasa">', $link, '</span>';
		}
	}
	
?>	
    </div>
</body>
</html>

 