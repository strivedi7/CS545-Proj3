<?php

$server = 'opatija.sdsu.edu:3306';
		$user = 'jadrn066';
		$password = 'sheet';
		$database = 'jadrn066';

		if(!($db = mysqli_connect($server,$user,$password,$database)))
    			echo "ERROR in connection ".mysqli_error($db);
		else{
			echo "connected";
				
				$sql = "create table Runner(
    				Name varchar(80) NOT NULL,
    				Address varchar(200) NOT NULL,
    				Phone char(10) NOT NULL PRIMARY KEY,
    				EmailID varchar(60) NOT NULL,
				Gender char(10) NOT NULL, 
				DOB char(10) NOT NULL,
				Photo varchar(150) NOT NULL,
				Experiencelevel char(15) NOT NULL,
				Category char(12) NOT NULL,
				Med varchar(500),
				LName varchar(50) NOT NULL);";
 	 	
			$result = mysqli_query($db, $sql);
    	
			echo $result;
    	
			close_connector($db);

        
			echo "Table created";
		}
?>