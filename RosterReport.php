<!DOCTYPE html>
<html>
	<head>
    		<meta charset="utf-8">
    		<title>Runner Report</title>
    		<link rel="stylesheet" href="RosterReport.css">
	</head>
	<body>
    		
	<?php
		if(!empty($_POST)){
		
		$pass = $_POST['Password'];
		$valid = false;

		$raw = file_get_contents('Passwords.txt');
		$data = explode("\n",$raw);
		foreach($data as $item) {
    			if(crypt($pass,$item) === $item) 
            		$valid = true;            
    		} 
		if(!$valid){
   			echo "<div class=\"Cat\">Wrong Password!fkjhhfjhgfjhfjghfh</div>
				<header>
           		 Please enter the password!
        		</header>
			<form method=\"post\" action=\"\" name=\"login\">

			<input type=\"password\" name=\"Password\" id=\"Password\" required/><br />

			<input type=\"submit\" value=\"Log In\" id=\"SubmitBTN\" />
	
			</form>";
		}
		else
   		{   
		echo "<header>
           		 Runner List
        	</header>	";
		$server = 'opatija.sdsu.edu:3306';
		$user = 'jadrn066';
		$password = 'sheet';
		$database = 'jadrn066';
		
		if(!($db = mysqli_connect($server,$user,$password,$database)))
  			echo "ERROR in connection ".mysqli_error($db);
		else {
  			$sql1 = "select * from Runner where category='teen' order by LName;";    
    			$result = mysqli_query($db, $sql1);
    			if(!result)
       				echo "ERROR in query".mysqli_error($db);
			else{
    				
				echo "	<table id=\"BoxContainer\">
					<div class=\"Cat\">Teen</div>";
    					while($row=mysqli_fetch_row($result)) {
					echo "<tr><td>
						<table class=\"DataBox\" border=\"1\">";
        						echo "<tr >
                            					<td class=\"ImageTag\" rowspan=\"3\" >
                              						<img src='Pictures/$row[6]' width='200' alt='Image not avilable' />
                            					</td>
                            					<td >
                                					$row[0]
                            					</td>
                       				 	</tr>
                      					<tr >
                            					<td >
                                					Age- ";age($row[5]);
                           					echo "</td>
                        				</tr>
                       				 	<tr>
                            					<td>$row[7]</td>
                            					
                        				</tr>
                    				</table>
					</td></tr>";        			
        				}
			}
			$sql2 = "select * from Runner where category='adult' order by Name;";    
    			$result = mysqli_query($db, $sql2);
    			if(!result)
       				echo "ERROR in query".mysqli_error($db);
			else{
    				
				echo "<table id=\"BoxContainer\"><div class=\"Cat\">Adult</div>";
    					while($row=mysqli_fetch_row($result)) {
					echo "<tr><td>
						<table class=\"DataBox\" border=\"1\">";
        						echo "<tr >
                            					<td class=\"ImageTag\" rowspan=\"3\" >
                              						<img src='Pictures/$row[6]' width='200' alt='Image not avilable' />
                            					</td>
                            					<td >
                                					$row[0]
                            					</td>
                       				 	</tr>
                      					<tr >
                            					<td >
                                					Age- ";age($row[5]);
                           					echo "</td>
                        				</tr>
                       				 	<tr>
                            					<td>$row[7]</td>
                            					
                        				</tr>
                    				</table>
					</td></tr>";        			
        				}
			}
			$sql3 = "select * from Runner where category='senior' order by Name;";    
    			$result = mysqli_query($db, $sql3);
    			if(!result)
       				echo "ERROR in query".mysqli_error($db);
			else{
    				
					echo "<table id=\"BoxContainer\"><div class=\"Cat\">Senior</div>";
    					while($row=mysqli_fetch_row($result)) {
					echo "<tr><td>
						<table class=\"DataBox\" border=\"1\">";
        						echo "<tr >
                            					<td class=\"ImageTag\" rowspan=\"3\" >
                              						<img src='Pictures/$row[6]' width='200' alt='Image not avilable' />
                            					</td>
                            					<td >
                                					$row[0]
                            					</td>
                       				 	</tr>
                      					<tr >
                            					<td >
                                					Age- ";age($row[5]);
                           					echo "</td>
                        				</tr>
                       				 	<tr>
                            					<td>$row[7]</td>
                            					
                        				</tr>
                    				</table>
					</td></tr>";        		
        				}
			}

    		mysqli_close($db);
		}
    		}
	}else{ echo "<header>
           		 Please enter the password!
        		</header>
		<form method=\"post\" action=\"\" name=\"login\">

			<input type=\"password\" name=\"Password\" id=\"Password\" required/><br />

			<input type=\"submit\" value=\"Log In\" id=\"SubmitBTN\" />
	
		</form>";
	}
	?>
	<?php
		// Referance : stackoverflow.com 
		//date in mm/dd/yyyy format; 
		function age($birthDate){
			
 			$birthDate = explode("/", $birthDate);
  			//get age from date or birthdate
  			$age = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md")
    			? ((date("Y") - $birthDate[2]) - 1)
    			: (date("Y") - $birthDate[2]));
  			echo $age." Years";
		}
	?>

	</table>
	</body>
</html>
