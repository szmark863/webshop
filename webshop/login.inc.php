<?php 

session_start();

if (isset($_POST["submit"])) 
{
	require 'db.php';

	$userName = mysqli_real_escape_string($conn, $_POST['username']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);

	if (empty($userName) || empty($password)) 
	{
		header("Location: index.php?page=login&error=inputEmpty");
		echo "<SCRIPT>alert('Üres mező(k)! Töltsön ki mindent!')</SCRIPT>";
		exit();
	}
	else
	{
		$sql = "SELECT * FROM users WHERE username = ?";

		$statement = mysqli_stmt_init($conn);

		if (!mysqli_stmt_prepare($statement, $sql)) {
			header("Location: index.php?page=login&error=connection1");
			exit();
		}
		else
		{
			mysqli_stmt_bind_param($statement, 's', $userName);
			mysqli_stmt_execute($statement);

			$eredmeny = mysqli_stmt_get_result($statement);

			if ($row = mysqli_fetch_assoc($eredmeny)) 
			{
				$jelszoCheck = password_verify($password, $row["passwd"]);
				if ($jelszoCheck == false) 
				{
    				echo "<SCRIPT>
        				window.location.replace('index.php?page=login&error=wrongPassword');
						alert('Rossz jelszó!')
    					</SCRIPT>";
					exit();
				}
				else
				{
					$_SESSION["username"] = $row["username"];
					$_SESSION["email"] = $row["email"];
					echo "<SCRIPT>
        				window.location.replace('index.php?LoginSuccess');
						alert('Sikeres bejelentkezés!')
    					</SCRIPT>";
					exit();
				}
			}
			else
			{
				echo "<SCRIPT>
        				window.location.replace('index.php?page=login&error=loginError');
						alert('Rossz jelszó vagy felhasználónév kombináció!')
    					</SCRIPT>";
					exit();
				exit();
			}
		}
	}


}
 ?>