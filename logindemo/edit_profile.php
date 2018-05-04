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
	$strSQL = "SELECT * FROM member_login,member_detail WHERE mem_id = '.$_SESSION['mem_id'].' && member_login.mem_id = member_detail.mem_id";

	$objQuery = mysql_query($strSQL);
	$objResult = mysql_fetch_array($objQuery);
?>
<html>
<head>
<title>LightUp SSP DEMO</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"></head>
<body>
<form name="form1" method="post" action="save_profile.php">
  Edit Profile! <br>
  <table width="400" border="1" style="width: 400px">
    <tbody>
      <tr>
        <td width="125"> &nbsp;UserID</td>
        <td width="180">
          <?php echo $objResult["mem_id"];?>
        </td>
      </tr>
      <tr>
        <td> &nbsp;Username</td>
        <td>
          <?php echo $objResult["mem_user"];?>
        </td>
      </tr>
      <tr>
        <td> &nbsp;Password</td>
        <td><input name="txtPassword" type="password" id="txtPassword" value="<?php echo $objResult["mem_pass"];?>">
        </td>
      </tr>
      <tr>
        <td> &nbsp;Confirm Password</td>
        <td><input name="txtConPassword" type="password" id="txtConPassword" value="<?php echo $objResult["mem_pass"];?>">
        </td>
      </tr>
      <tr>
        <td>&nbsp;Class</td>
        <td><input name="txtClass" type="text" id="txtClass" value="<?php echo $objResult["mem_class"];?>"></td>
      </tr>
			<tr>
				<td>&nbsp;Roll</td>
				<td><input name="txtRoll" type="text" id="txtRoll" value="<?php echo $objResult["mem_roll"];?>"></td>
			</tr>
      <tr>
        <td> &nbsp;Status</td>
        <td>
          <?php echo $objResult["mem_status"];?>
        </td>
      </tr>
    </tbody>
  </table>
  <br>
  <input type="submit" name="Submit" value="Save">
</form>
</body>
</html>
