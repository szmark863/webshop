<?php 
	
	if (isset($_POST['submit'])) 
	{
		include_once 'db.php';

		$username = mysqli_real_escape_string($conn, $_POST['username']);
		$userpass = mysqli_real_escape_string($conn, $_POST['password']);
		$useremail = mysqli_real_escape_string($conn, $_POST['email']);

		if (empty($username) || empty($userpass) ||empty($useremail)) 
		{
			header("Location: index.php?page=signup&error=empty");
			exit();
		}
		else
			{
				if (!preg_match("/^[a-zA-Z0-9]*$/", $username) || !preg_match("/^[a-zA-Z0-9]*$/", $userpass)) 
				{
					header("Location: index.php?page=signup&error=wrongCharacters");
					exit();
				}
				else
				{
					if (!filter_var($useremail, FILTER_VALIDATE_EMAIL)) 
					{
						
						header("Location: index.php?page=signup&error=wrongEmail");
						exit();
					}
					else
					{
						$sql = "SELECT * FROM users WHERE username = ?";

						$statement = mysqli_stmt_init($conn);

						if (!mysqli_stmt_prepare($statement, $sql))
						{
							header("Location: index.php?page=signup&error=connectError");
							exit();
						}
						else
						{
							mysqli_stmt_bind_param($statement, "s", $username);

							mysqli_stmt_execute($statement);

							mysqli_stmt_store_result($statement);

							$resultCheck = mysqli_stmt_num_rows($statement);

							if ($resultCheck > 0) 
							{
								echo "<SCRIPT> //not showing me this
        							window.location.replace('index.php?page=signup&error=userExists');
									alert('Ez a felhasználó már létezik!')
    								</SCRIPT>";
								exit();
							}
							else
							{
								$hashedPassword = password_hash($userpass, PASSWORD_DEFAULT);

								$sql = "INSERT INTO users (username, passwd, email) VALUES (?,?,?);";

								$statement2 = mysqli_stmt_init($conn);

								if (!mysqli_stmt_prepare($statement2, $sql))
								{
									header("Location: index.php?page=signup&error=conn2error");
									exit();
								}
								else
								{
									mysqli_stmt_bind_param($statement2, "sss", $username, $hashedPassword, $useremail);
									mysqli_stmt_execute($statement2);
									echo "<SCRIPT> //not showing me this
        							window.location.replace('index.php?page=signup&=success');
									alert('Sikeres regisztráció!')
    								</SCRIPT>";
									exit();
								}
							}
						}

					}
				}
			}

			mysqli_stmt_close($statement);
			mysqli_stmt_close($statement2);

	}
	else
	{
		header("Location: register.php?register=buttonerror");
		exit();
	}
 ?>