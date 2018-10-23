<?php 

require("mysql/config.php"); 
if(isset($_GET['mid'])){
   $mid=$_GET['mid'];
}else{
  $mid="";
}
require("mbr_select.php");
?>

Fine<br />
<table border="1" cellspacing="0" cellpadding="2">
<tr>
	<td>Sensor ID</td>
	<td>Sensor Name</td>
	<td>Lend Date</td>
	<td>Deadline</td>
	<td>Restor Date</td>
	<td>Late</td>
	<td>Fine</td>
	<td>Keep</td>
	
</tr>

<?php
 $sql= "SELECT sensors.sid, sensors.sname, transactions.tlend, DATE_ADD(transactions.tlend, INTERVAL 3 DAY) AS deadline, 
 transactions.trest, DATEDIFF(transactions.trest, transactions.tlend)-3 AS late 
 FROM sensors, transactions
 WHERE sensors.sid=transactions.sid 
 AND transactions.mid='$mid'
 AND transactions.tstatus='2'";
//echo($sql);
 require('mysql/connect.php');
 while($record=mysqli_fetch_array($result)){

 }
?>
<tr>
	<td><?php echo($record[0]);?></td>
	<td><?php echo($record[1]);?></td>
	<td><?php echo date_format(date_create($record[2]),"d/m/Y");?></td>
	<td><?php echo date_format(date_create($record[3]),"d/m/Y");?></td>
	<td><?php echo date_format(date_create($record[4]),"d/m/Y");?></td>
	<td><?php echo($record[5]);?></td>
    <td><?php echo((int)$record[5]*100);?></td>
    <td><a href="javascript:fnekeep('<?php echo($record[0]);?>,<?php echo($record[2]);?>')">Keep</a></td>
</tr>

<?php
require('mysql/unconn.php');
?>

</table>
<script language="javascript">
	function fnekeep(v1,v2){
		var url = "fne_keep.php?mid=<?php echo($mid);?>&sid=" + v1 + "&tlend=" + v2;
		if(confirm("Keep this transections fine")==true){
			window.location.href=url;
		}
	}
</script>