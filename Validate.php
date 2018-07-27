<?php
		$Phone = $_POST[Phone];
		$Email = $_POST[EmailID];
		
		$server = 'opatija.sdsu.edu:3306';
		$user = 'jadrn066';
		$password = 'sheet';
		$database = 'jadrn066';

	

		if(!($db = mysqli_connect($server,$user,$password,$database)))
    				echo "ERROR in connection ".mysqli_error($db);
			else{
				$sql = "select * from Runner where Phone='$Phone' OR EmailID='$Email';";
				$result = mysqli_query($db, $sql);
				$how_many = mysqli_affected_rows($db);
				mysqli_close($db);
				if($how_many > 0){
				    echo "User already exist</br>Try different Phone Number and Email ID";
				}
			}

?>
