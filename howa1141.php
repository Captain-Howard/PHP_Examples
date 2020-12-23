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
	
		<form action='howa1141.php' method="post">
		<p>	Username <input type="text" name="username" maxlength="14"></p>
		<p>Password <input type="password" name="password"></p>
		<p>Model Name:<input type="radio" name="priceval" value="model"><input type="text" name="model1" maxlength="50"></p>
		<p>Fuel Economy:<input type="radio" name="priceval" value="fuel"> <input type="text" name="fuel1" maxlength="50">Above<input type="radio" name="abbl" value="above">Below<input type="radio" name="abbl" value="below"></p>
		<p><input type="submit" value="Enter"> <INPUT type="reset" value="Clear"></p>
		</form>
	
	<?php
	}
	else
	{
			echo "<h3>Project Parts Database Connection Information</h3>";
			// Connecting, selecting database
			$link = mysqli_connect('localhost', htmlentities($_POST['username']), htmlentities($_POST['password']),'fueleco16')
			or die('Could not connect: ' . mysqli_connect_error());
			echo 'Connected successfully';
			if(htmlentities($_POST['priceval'])=="model")
				$query = 'SELECT `YEAR`,`MODEL`,`COMB (mpg)` FROM `TABLE 1` WHERE `MODEL` LIKE \'%'.htmlentities($_POST['model1']).'%\'';
			else
				if(htmlentities($_POST['abbl'])=="above")
					$query = 'SELECT `YEAR`,`MODEL`,`COMB (mpg)` FROM `TABLE 1` WHERE `COMB (mpg)` > '.htmlentities($_POST['fuel1']).'';
				else
					$query = 'SELECT `YEAR`,`MODEL`,`COMB (mpg)` FROM `TABLE 1` WHERE `COMB (mpg)` < '.htmlentities($_POST['fuel1']).'';
			
				$result = mysqli_query($link,$query) or die('Query failed: ' . mysqli_error());
			
				// Printing results in HTML
			
				echo "<table border=\"3\"><caption>Search Results</caption>\n";
			
				echo "<tr background=\"fuzzy-blue.jpg\"><th><font color=\"#EA1986\">Year</font></th><th><font color=\"#EA1986\">Model</font></th><th><font color=\"#EA1986\">MPG</font></th></tr>\n";
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