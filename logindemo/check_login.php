<?php
	session_start();
	require("mysql/config.php");
	mysql_connect($dbhost,$dbuser,$dbpass) or die ("Cannot connect to the database.");
	mysql_select_db($dbname);
	$strSQL = "SELECT * FROM member_login WHERE mem_user = '.mysql_real_escape_string($_POST['txtUsername']).'
	and mem_pass = '.mysql_real_escape_string($_POST['txtPassword']).'";
	$objQuery = mysql_query($strSQL);
	$objResult = mysql_fetch_array($objQuery);
	if(!$objResult)
	{
			echo "Username and Password Incorrect!";
	}
	else
	{
			$_SESSION["mem_id"] = $objResult["mem_id"];
			$_SESSION["mem_status"] = $objResult["mem_status"];

			session_write_close();

			if($objResult["mem_status"] == "ADMIN")
			{
				header("location:admin_page.php");
			}
			else
			{
				header("location:user_page.php");
			}
	}
	mysql_close();
?>
