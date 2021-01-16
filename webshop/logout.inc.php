<?php  

if (isset($_POST["submit"])) 
{
	session_start();
	session_unset();
	session_destroy();
	echo "<SCRIPT>
        window.location.replace('index.php?LogoutSuccess');
		alert('Sikeres kijelentkezés!')
    	</SCRIPT>";
	exit();
}



?>