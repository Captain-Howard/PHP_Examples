<!DOCTYPE html>
<html>
	<head>
		<title>php prog 1</title>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	</head>
	<body>
	<?php
	
	if (!isset($_POST['username']))
	{
		print <<<BLOCK1
		<h1>Project Parts 1</h1>
		<p>This example allows user input and query to occur within one file.
		It also illustrates a bit fancier table.</p>
	
		<h2>Data Base Authentication</h2>
	
		<p>Please provide the following to search the quotations database.</p>
	
		<form action='howa1111.php' method="post">
		<p>	Username <input type="text" name="username" maxlength="14"></p>
		<p>Password <input type="password" name="password"></p>
	
		<p>Enter text to search for <input type="text" name="searchstring" maxlength="500"></p>
		<p><input type="submit" value="Search"> <INPUT type="reset" value="Clear"></p>
		</form>
	
BLOCK1;
	}
	else
	{
		echo "<h3>Project Parts Database Connection Information</h3>";
		// Connecting, selecting database
		$link = mysqli_connect('localhost', htmlentities($_POST['username']),htmlentities($_POST['password']),'projparts16')
		or die('Could not connect: ' . mysqli_connect_error());
		echo 'Connected successfully';
	

			$query = 'SELECT * FROM `projdata` WHERE `description` LIKE \'%'.htmlentities($_POST['searchstring']).'%\'';
			
				$result = mysqli_query($link,$query) or die('Query failed: ' . mysqli_error());
	
				// Printing results in HTML
	
				echo "<table border=\"3\"><caption>Search Results</caption>\n";
	
				echo "<tr background=\"fuzzy-blue.jpg\"><th><font color=\"#EA1986\">ID</font></th><th><font color=\"#EA1986\">Description</font></th><th><font color=\"#EA1986\">Price</font></th><th><font color=\"#EA1986\">Stock</font></th><th><font color=\"#EA1986\">Type</font></th></tr>\n";
				while ($line = mysqli_fetch_array($result, MYSQLI_ASSOC))
				{
					echo "\t<tr>\n";
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