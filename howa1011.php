<!DOCTYPE html>
<html>
<head>
<title>php prog 1</title>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
</head>
<body>
<?php 

	date_default_timezone_set('CST');
	echo date('g:i A \o\n l F d, Y');
	echo "<br>";
	echo "Last Modified: " . date('g:i A \o\n l F d, Y', getlastmod()); 
	

?>
</body>
</html>