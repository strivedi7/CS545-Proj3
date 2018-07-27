<!DOCTYPE html>
<html>
	<head>
    		<meta charset="utf-8">
    		<title>Runner Report</title>
    		<link rel="stylesheet" href="RosterReport.css">
	</head>
	<body>
    		<header>
           		 Please enter the password!
        	</header>
		<form method="post" action="" name="login">

			<input type="password" name="Password" id="Password" required/><br />

			<input type="submit" value="Log In" id="SubmitBTN" />
	
		</form>
		<?php
			

			$pass = $_POST['Password'];
		$valid = false;

		$raw = file_get_contents('Passwords.txt');
		$data = explode("\n",$raw);
		foreach($data as $item) {
    			if(crypt($pass,$item) === $item) 
            		$valid = true;            
    		} 
		if(!$valid){
   			echo "<div class=\"Cat\">Wrong Password!</div>";
			
		}
		else
		{
			echo "<div class=\"Cat\">Correct Password!</div>";

		}

		?>
	</body>
</html>
