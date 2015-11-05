<?
	error_reporting(0);
	$message = "";
	$username = "";
	if (isset($_POST['action']) && $_POST['action'] == "Submit")
	{
		if ($_POST['username'] != "" && ($_POST['password'] != "" ))
		{
			if ($_POST['username'] == "KDG" && ($_POST['password'] == "KDG"))
				$message = "Access Granted..";
			else
			{
			$attempt = $_POST['attempt'];
				if ($attempt == 3)
				{
					echo "<SCRIPT>window.opener=self;window.close();</SCRIPT>";
				}	
				$message = "Access Denied..";
				$username = $_POST['username'];
			}
		}
		else
		{
			$attempt = $_POST['attempt'];
				if ($attempt == 3)
				{
					echo "<SCRIPT>window.opener=self;window.close();</SCRIPT>";
				}			
			$message = "Username/Password must not be empty..";
			$username = $_POST['username'];	
		}
	}
?>

<html>

	<head>
		<title>
			:: Login ::
		</title>
	</head>
<body>

<center>

<br>
<form method="post" action="login.php">

	<table border=1 cellpadding="2" cellspacing="2">
		<tr>
			<td COLSPAN="2" align="center">LOGIN</td>
		</tr>
		<tr>
			<td COLSPAN="2" align="center" nowrap><?=$message?>&nbsp;</td>
		</tr>
		<tr>
			<td>Username: </td> <td><input type="text" name="username" value="<?=$username?>"></td>
		</tr>
		<tr>
			<td>Password: </td> <td><input type="password" name="password"></td>
		</tr>
		<tr>
			<td COLSPAN="2" align="center"><input type="hidden" value="
			<?if ($attempt ==1)
				{
					$attempt = 1 + 1;
					echo $attempt;
				}
			  else if ($attempt ==2)
				{
					$attempt = 2 + 1;
					echo $attempt;
				}
			  else
				{
					echo "1";
				}
			?>	
			" name=attempt>
				<input type="submit" value="Submit" name="action" /> <input type="reset" value="Clear" />
			</td>
		</tr>
	</table>
</form>
</center>
</body>

</html>