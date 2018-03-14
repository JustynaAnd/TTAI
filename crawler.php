
<html>
<head>
</head>
<body>
<?php
	$url = " ";
	if(isset($_GET["search"])){
		$url=$_GET["search"];
		//chcę z url'a pobrac a href, a później wyświetlić url'e stron z takimi hrefami 
		echo $url;
	}	
?>	
	<form action="" method="GET">
		<input type="text" name="search" value="<?php echo $url;?>">
		<input type="submit" value="Crawl!">
	</form>
</body>
</html>

 