
$(document).ready(function () {
      $(':submit').on('click', function(e) {
	
	e.preventDefault();	
       	var x = document.getElementById("Photo");
        var file = x.files[0];
	if (document.getElementById("DOB").value.length !== 0) {
            var dateOfBirth = new Date(document.getElementById("DOB").value);
            var AgeDiffereance = Date.now() - dateOfBirth.getTime();
            var DateC = new Date(AgeDiffereance);
            var age = Math.abs(DateC.getUTCFullYear() - 1970);
            if (age < 90 & age > 5){            
              document.getElementById("Error").style.display = "none";
            } else {
                document.getElementById("Error").style.display = "block";
                document.getElementById("Error").innerHTML = "Invalid Date of Birth";
                document.getElementById("Phone").focus();
                return false;
            }
	}
        if (document.getElementById("Zip").value.length !== 5 || isNaN(document.getElementById("Zip").value)) {
            document.getElementById("Error").style.display = "block";
            document.getElementById("Error").innerHTML = "Invalid Zip code";
            document.getElementById("Zip").focus();
            return false;

        }
	 else if (document.getElementById("Phone").value.length !== 10 || isNaN(document.getElementById("Phone").value)) {
		
            document.getElementById("Error").style.display = "block";
            document.getElementById("Error").innerHTML = "Invalid Phone Number";
            document.getElementById("Phone").focus();
            return false;
        } else if (file.size / 1000 > 1000) {
            document.getElementById("Error").style.display = "block";
            document.getElementById("Error").innerHTML = "Invalid Photo Size  Max size=1mb";
            return false;
        }else{
		 $.ajax({
			url: "Validate.php", 
			type: "post",
			 data: {'Phone':$("#Phone").val(),'EmailID' :$("#EmailID").val()},
			success: function(result){
			  document.getElementById("Error").style.display = "block";
			if(result == ""){
				SubmitForm();	
			}else{
				$("#Error").html(result);
			}
   		 }});	
	}
	
    });
	function SubmitForm(){
		
		$('form').serialize();
        	$('form').submit();
	}

					
	
});