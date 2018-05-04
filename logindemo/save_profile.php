<?php
	session_start();
	require("mysql/config.php");

	if($_SESSION['mem_id'] == "")
	{
		echo "Please Login!";
		exit();
	}
	mysql_connect($dbhost,$dbuser,$dbpass) or die ("Cannot connect to the database.");
	mysql_select_db($dbname);

	if($_POST["txtPassword"] != $_POST["txtConPassword"])
	{
		echo "Password not Match!";
		exit();
	}
	$strSQL = "UPDATE member_login SET mem_pass ='".trim($_POST['txtPassword'])."' WHERE mem_id = '".$_SESSION["mem_id"]."' ";
	$strSQL = "UPDATE member_detail SET mem_class = '".trim($_POST['txtClass'])."'
	,mem_roll = '".trim($_POST['txtRoll'])."' WHERE mem_id = '".$_SESSION["mem_id"]."' ";
	$objQuery = mysql_query($strSQL);

	echo "Save Completed!<br>";

	if($_SESSION["Status"] == "ADMIN")
	{
		echo "<br> Go to <a href='admin_page.php'>Admin page</a>";
	}
	else
	{
		echo "<br> Go to <a href='user_page.php'>User page</a>";
	}

	mysql_close();
?>
