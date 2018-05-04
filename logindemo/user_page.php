<?php
	session_start();
	require("mysql/config.php");

	if($_SESSION['mem_id'] == "")
	{
		echo "Please Login!";
		exit();
	}

	if($_SESSION['mem_status'] != "USER")
	{
		echo "This page for User only!";
		exit();
	}

	mysql_connect($dbhost,$dbuser,$dbpass) or die ("Cannot connect to the database.");
	mysql_select_db($dbname);
	$strSQL = "SELECT * FROM member_login WHERE mem_id = '.$_SESSION['mem_id'].' ";
	$objQuery = mysql_query($strSQL);
	$objResult = mysql_fetch_array($objQuery);
?>
<html>
<meta charset="utf-8">
<head>
<title>LightUp SSP DEMO</title>
</head>
<body>
  Welcome to User Page! <br>
  <table border="1" style="width: 300px">
    <tbody>
      <tr>
        <td width="87"> &nbsp;Username</td>
        <td width="197"><?php echo $objResult["mem_user"];?>
        </td>
      </tr>
      <tr>
        <td> &nbsp;Name</td>
        <td><?php echo $objResult["mem_id"];?></td>
      </tr>
    </tbody>
  </table>
  <br>
  <a href="edit_profile.php">Edit</a><br>
  <br>
  <a href="logout.php">Logout</a>
</body>
</html>
