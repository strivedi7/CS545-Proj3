<!DOCTYPE html>
<html>
	<head>
    		<meta charset="utf-8">
    		<title>Confirmation</title>
    		<link rel="stylesheet" href="RosterReport.css">
	</head>
	<body>
	<a  href="index.html" id="HomeButton" >Home</a>  
    		 
<?php
	$UPLOAD_DIR = 'Pictures/';
	
	if(!empty($_POST)) {	
		
		$msg = "";

    		if(strlen($_POST["FName"]) == 0)
        		$msg .= "Please enter the First Name<br />"; 
		if(strlen($_POST["LName"]) == 0)
        		$msg .= "Please enter the Last Name<br />"; 
		if(strlen($_POST["Add01"]) == 0)
        		$msg .= "Please enter the Address<br />"; 
		if(strlen($_POST["City"]) == 0)
        		$msg .= "Please enter the City<br />"; 
		if(strlen($_POST["State"]) == 0)
        		$msg .= "Please enter the State<br />"; 
		if(strlen($_POST["Zip"]) == 0)
        		$msg .= "Please enter the Zip<br />"; 
		elseif(!is_numeric($_POST["Zip"])) 
       			 $msg .= "Zip code may contain only numeric digits<br />"; 
    		if(strlen($_POST["Phone"]) == 0)
        		$msg .= "Please enter the Phonne Num<br />"; 
		elseif(!is_numeric($_POST["Phone"])) 
       			 $msg .= "Phone code may contain only numeric digits<br />";
    		if(strlen($_POST["EmailID"]) == 0)
        		$msg .= "Please enter the Email ID<br />"; 
    		if(strlen($_POST["User"]) == 0)
        		$msg .= "Please enter the Gender<br />";                        
    		if(strlen($_POST["DOB"]) == 0)
        		$msg .= "Please enter the Date of Birth<br />";
		if(age($_POST["DOB"]))
        		$msg .= "Invalid the Date of Birth<br />";
    		if(strlen($_FILES['P1']['name']) == 0)
        		$msg .= "Please enter Photo<br />";
		if($_FILES["P1"]["size"]/1000 > 1000)
			$msg .= "Photo Size is to big ". $_FILES["P1"]["size"]/1000000 ." mb, max length is 1mb<br />";
		if(file_exists("$UPLOAD_DIR".$_FILES['P1']['name']))
        		$msg .= "The same name ". $_FILES['P1']['name'] ." already exists on the server</br>Please rename the photo name\n";
		if(strlen($_POST["Experiencelevel"]) == 0)
        		$msg .= "Please enter the Experience level<br />";
		if(strlen($_POST["Category"]) == 0)
        		$msg .= "Please enter the Catagory<br />";
		if($msg) {
        		echo "<div id=\"ErrorMsg\">".$msg."</div>";
			include 'Register.php';
        	}else{       		
		
		$Name = $_POST["FName"]." ".$_POST["MName"]." ".$_POST["LName"];
		$Add = $_POST["Add01"]." ".$_POST["Add02"]." ".$_POST["City"]." ".$_POST["State"]." ".$_POST["Zip"];
		$Phone= $_POST["Phone"];
		$EmailID= $_POST["EmailID"]; 
		$Gender =  $_POST["User"];
		$DOB =  $_POST["DOB"];
		$Photo=  $_FILES['P1']['name'];
		$Experiencelevel=  $_POST["Experiencelevel"];
		$Category=  $_POST["Category"];
		$MedCondition = $_POST["MedicalCondition"];
		$LName = $_POST["LName"];
	
		$server = 'opatija.sdsu.edu:3306';
		$user = 'jadrn066';
		$password = 'sheet';
		$database = 'jadrn066';

		if(!($db = mysqli_connect($server,$user,$password,$database)))
    			echo "ERROR in connection ".mysqli_error($db);
		else{

			$sql = "INSERT INTO Runner(Name,Address,Phone,EmailID,Gender,DOB,Photo,Experiencelevel,Category,Med,LName) ".
    			"VALUES('$Name','$Add','$Phone','$EmailID','$Gender','$DOB','$Photo','$Experiencelevel','$Category','$MedCondition','$LName');";
			
       			move_uploaded_file($_FILES['P1']['tmp_name'], "$UPLOAD_DIR".$Photo);
       			//echo "Success!</br >\n";
        		//"The filename is: ".$Photo."<br />";
       	 		//echo "The tmp filename is: ".$_FILES['P1']['tmp_name']."<br />";  
        		//echo "The basename is: ".basename($Photo)."<br />";  

			$result = mysqli_query($db, $sql);  

    			$how_many = mysqli_affected_rows($db);
    				
			if( $how_many > 0){
		
    				echo "<div id=\"Top\">
           		 		$Name, You have Succesfully Loged in! </br> See you on 3rd
        			</div>";
			}else{
				echo "<div id=\"Top\">
           		 		Sorry!, Something went wrong! </br> Please Sign In again.
        			</div>";
			}
			
		}
	}	
	}else{
		echo "<div id=\"Top\">
           		No Data trasmited
        	</div>";
	}
	

?>
<?php
	function age($birthDate){
			$birthDate = explode("/", $birthDate);
  			//get age from date or birthdate
  			$age = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md")
    			? ((date("Y") - $birthDate[2]) - 1)
    			: (date("Y") - $birthDate[2]));
			
			if($age > 5 && $age < 90)
 			return false;
			else
			return treu;
		}
	?>
    </body>
</html>