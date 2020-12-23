<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
		<title>howa1041</title>
	</head>
    <body>
		<?php		
		if(isset($_POST["submit"])){
			$a = 0;
			$subject = $_POST["name"];
			$pattern = '/[A-Z][a-z]+ [A-Z][a-z]+/';

			if (preg_match($pattern, $subject)){
				$a++;
			}
			else{
				echo "<p>Please enter a valid name!</p>";
			}
			
			
			$subject = $_POST["email"];
			$pattern = '/([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)/';
			
			if (preg_match($pattern, $subject)){
				$a++;
			}
			else{
				echo "<p>Please enter an e-mail address!</p>";
			}
			
			if($a == 2){
				echo "<h2>PHP Form Results</h2>";
				echo "<p>Full Name: ", $_POST["name"], "</p>";
				echo "<p>Postal Address: ", $_POST["postal"], "</p>";
				echo "<p>E-mail Address: ", $_POST["email"], "</p>";
			}
		}
		else{
		?>
		<form action=<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?> method="POST">
				<table border="0">
			  		<tr>
						<td>Enter Full Name Here:</td>
						<td>
							<input type="text" id="Name" name="name"></input>							
						</td>				  		
			  		</tr>
			  		<tr>
						<td>Postal Address:</td>
						<td>
							<input type="text" id="Postal" name="postal"></input>							
						</td>				  		
			  		</tr>
			  		<tr>
						<td>E-mail Address:</td>
						<td>
							<input type="text" id="Email" name="email"></input>								
						</td>				  		
			  		</tr>
			  		<tr>
			  			<td>
			  				<input type="submit" id="submit" name="submit" value="Submit" />
			  			</td>
			  			<td>
			  				<input type="reset" id="reset" name="reset">
			  			</td>
			  		</tr>
				</table>
			<input type="hidden" id="validated" name="validated" value="false" />
		</form>
		<?php 
		}
		?>
    </body>
</html>