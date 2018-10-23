<?php 

require("mysql/config.php"); 
if(isset($_GET['mid'])){
   $mid=$_GET['mid'];
}else{
	$mid="";
}
require("mbr_select.php");
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html: charset=utf-8"/>
<title>Ganges System</title>
</head>

<body>
<table border="1" cellspacing="0" cellpadding="2">
	<tr>
		<td colspan="2">Member Detail</td>
	</tr>
	<tr>
		<td align="right">ID : </td>
		<td align="left"><?php echo($mid);?></td>
	</tr>
	<tr>
		<td align="right">Name : </td>
		<td align="left"><?php echo($mname);?></td>
	</tr>
	<tr>
		<td colspan="2" align="center"><a href="mbr_list.php">Back</a></td>
	</tr>
</table><br />
<?php require("brw_form.php");?><br />
<?php require("brw_list.php");?><br />
<?php require("fne_list.php");?><br />
</body>
</html>