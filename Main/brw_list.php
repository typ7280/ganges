<!-- Sensor In Use. --><br />
<style>

	table {
  		/*boarder-collapse: collapse;
  		width: 800px;
        color: #d96459;
        font-family: monospace;
        font-size: 25px;
        text-align:  left;*/
        width: 800px;
        margin: auto;
        text-align: center;
        table-layout: fixed;
  	}
  	/*th{
  		background-color: #588c7e;
  		color: white;
  	}*/
  	table, tr, th, td{
  		padding: 20px;
  		color: white;
  		border: 1px solid #080808;
  		border-collapse: collapse;
  		font-size: 17px;
  		font-family: Arial;
  		background: linear-gradient(top, #343A40 50%, #222222 100%);
  		background: -webkit-linear-gradient(top, #343A40 50%, #222222 100%);
  	}
</style>
<table border="1" cellspacing="0" cellpadding="2">
<tr>
	<td>Sensor ID</td>
	<td>Sensor Name</td>
	<td>Lend Date</td>
	<td>Dead Line</td>
	<td>Restore</td>
</tr>	
<?php
 $sql="SELECT sensors.sid, sensors.sname, transactions.tlend, date_add(transactions.tlend, INTERVAL 3 DAY) AS deadline 
 FROM sensors, transactions 
 WHERE sensors.sid=transactions.sid 
 AND transactions.mid='$mid' 
 AND transactions.tstatus='1'";
//echo($sql);
 require('mysql/connect.php');
 while($record=mysqli_fetch_array($result)){ 
?>

<tr>
	<td><?php echo($record[0]);?></td>
	<td><?php echo($record[1]);?></td>
	<td><?php echo date_format(date_create($record[2]),"d/m/Y");?></td>
	<td><?php echo date_format(date_create($record[3]),"d/m/Y");?></td>
    <td><a href="javascript:rstsensors('<?php echo($record[0]);?>')">Restore</a></td>
</tr>
<?php
}
require('mysql/unconn.php');
?>

</table>
<script language="javascript">
	function rstsensors(v1){
		var url = "rst_save.php?mid=<?php echo($mid);?>&sid=" + v1;
		if(confirm("Restore this sensor ?")==true){
			window.location.href=url;
		}
	}
</script>