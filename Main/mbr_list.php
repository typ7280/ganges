<?php 
require("mysql/config.php"); 
$sql="SELECT mid, mname, email FROM members";
if(isset($_GET['kw'])){
 $kw=$_GET['kw'];
 $sql.=" WHERE mid='$kw' OR mname LIKE '%$kw%'";
//echo($sql);

} 
else{
 $kw="";
 $sql.= " WHERE mid IS NULL";
}
//echo($sql);
require('mysql/connect.php');
//$kw=$_GET['kw'];
?>


<html>
<head>
<meta http-equiv="Content-Type" content="text/html: charset=utf-8"/>
<title>Ganges System</title>
</head>
<body>
<form action="mbr_list.php" method="get" target="_self">
Search:
<label for="kw"></label>
<input type="text" name="kw" id="kw" value="<?php echo($kw);?>">
<input type="submit" name="submit" value="OK">
</form>
<table border="1" cellspacing="0" cellpadding="2">
	<tr>
		<td>ID</td>
		<td>Name</td>

	</tr>
<?php while($record=mysqli_fetch_array($result)){?>

	<tr>
		<td><a href="mbr_detail.php?mid=<?php echo($record[0]);?>"><?php echo($record[0]);?></a></td>
		<td><?php echo($record[1]);?></td>
	</tr>
<?php
}
require('mysql/unconn.php');
?>

</table>
</body>
</html>