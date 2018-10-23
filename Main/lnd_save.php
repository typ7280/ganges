<?php 
require('mysql/config.php');
if(isset($_POST['mid'])){
  $mid=$_POST['mid'];
}else{
  $mid="";
}

if(isset($_POST['sid'])){
	$sid=$_POST['sid'];
}else{
	$sid="";
}

$msg="";
$v1=0;

$sql="SELECT COUNT(sid) FROM sensors WHERE sid='$sid'";
require('mysql/connect.php');
$record=mysqli_fetch_array($result);
$sensorsrow=$record[0];
require('mysql/unconn.php');

$sql="SELECT COUNT(sid) FROM transactions WHERE sid='$sid' AND mid='$mid' AND tstatus='1'";
require('mysql/connect.php');
$record=mysqli_fetch_array($result);
$lending=$record[0];
require('mysql/unconn.php');

$sql="SELECT COUNT(mid) FROM transactions WHERE mid='$mid' AND tstatus='1'";
require('mysql/connect.php');
$record=mysqli_fetch_array($result);
$holding=$record[0];
require('mysql/unconn.php');

if($sensorsrow<1){
   $msg="Wrong sensor ID";
   $v1=0;
}else if($lending>0){
   $msg="This sensor already booked";
   $v1=0;
}else if($holding>=2){
   $msg="This member already booked 2 sensors";
   $v1=0;
}else{
	$sql="INSERT INTO transactions(mid,sid,tlend,tstatus) VALUES('$mid', '$sid', NOW(),'1')";
	require('mysql/connect.php');
	if($result==1){
    $msg="Reservation is success";
    $v1=1;
	}else{
    $msg="Reservation is failed";
    $v1=0;
	}
	require('mysql/unconn.php');
}

?>

<!-- <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> -->
<!-- <html xmlns="http://www.w3.org/1999/xhtml"> -->
<html>
<head>
<meta http-equiv="Content-Type" content="text/html: charset=utf-8"/>
<title>Reservation System</title>
</head>
<body>
<script language="javascript">
	 var v1=<?php echo($v1);?>;
	 alert('<?php echo($msg);?>');

if(v1==1){
window.location.replace("card.php?mid=<?php echo($mid);?>");
}else{
window.history.back();
}
</script>

</body>
</html>