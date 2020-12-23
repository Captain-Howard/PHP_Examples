<!DOCTYPE html>
<html>
	<head>
		<title>php prog 2</title>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	</head>
	<body>
	<?php
	
	if (!isset($_POST['username']))
	{
		?>
				
		<h1>Project Parts 1</h1>
		<p>This example allows user input and query to occur within one file.
		It also illustrates a bit fancier table.</p>
	
		<h2>Data Base Authentication</h2>
	
		<p>Please provide the following to search the quotations database.</p>
	
		<form action='howa1131.php' method="post">
		<p>	Username <input type="text" name="username" maxlength="14"></p>
		<p>Password <input type="password" name="password"></p>
		<p>Enter price to search for <input type="text" name="price" maxlength="3"></p>
		<p>Greater than:<input type="radio" name="priceval" value="great"></p>
		<p>Less than:<input type="radio" name="priceval" value="less"></p> 
		<p><input type="submit" value="Enter"> <INPUT type="reset" value="Clear"></p>
		</form>
	
	<?php
	}
	else
	{
			echo "<h3>Project Parts Database Connection Information</h3>";
			// Connecting, selecting database
			$link = mysqli_connect('localhost', htmlentities($_POST['username']), htmlentities($_POST['password']),'projparts16')
			or die('Could not connect: ' . mysqli_connect_error());
			echo 'Connected successfully';
			if(htmlentities($_POST['priceval'])=="great")
				$query = 'SELECT `description`,`price` FROM `projdata` WHERE `price` > '.htmlentities($_POST['price']).'';
			else
				$query = 'SELECT `description`,`price` FROM `projdata` WHERE `price` < '.htmlentities($_POST['price']).'';
			
				$result = mysqli_query($link,$query) or die('Query failed: ' . mysqli_error());
			
				// Printing results in HTML
			
				echo "<table border=\"3\"><caption>Search Results</caption>\n";
			
				echo "<tr background=\"fuzzy-blue.jpg\"><th><font color=\"#EA1986\">Description</font></th><th><font color=\"#EA1986\">Price</font></th></tr>\n";
				while ($line = mysqli_fetch_array($result, MYSQLI_ASSOC))
				{
					if($altclr)
					{
						$bgclr="#FFFFFF";
						$altclr=0;
					}
					else
					{
						$bgclr="#ccffcc";
						$altclr=1;
					}
				
					echo "\t<tr bgcolor=$bgclr>\n";
					foreach ($line as $col_value)
					{
						echo "\t\t<td>$col_value</td>\n";
					}
					echo "\t</tr>\n";
				}
				echo "</table>\n";
			
				// Free resultset
				mysqli_free_result($result);
			
				// Closing connection
				mysqli_close($link);
	}		
	?>
	
	</body>
</html>


