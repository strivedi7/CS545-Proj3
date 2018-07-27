<?php

if($_GET) exit;
if($_POST) exit;

$pass = array('cs545','abc123','sdsu','Trivedi7');

#### Using SHA256 #######
$salt='$5$R4F7hgjhij4l%665';  # 12 character salt starting with $1$

for($i=0; $i<count($pass); $i++) 
        echo crypt($pass[$i],$salt)."</br>\n";
?>