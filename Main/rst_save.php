<?php
require('mysql/config.php');
if(isset($_GET['mid'])){
  $mid=$_GET['mid'];
}else{
  $mid="";
}

if(isset($_GET['sid'])){
	$sid=$_GET['sid'];
}else{
	$sid="";
}

$sql="SELECT DATEDIFF(NOW(),tlend) FROM transactions WHERE sid='$sid' AND mid='$mid' AND tstatus='1'";
require('mysql/connect.php');
$record=mysqli_fetch_array($result);
$numdays=(int)$record[0];
require('mysql/unconn.php');

if($numdays>3){
	$tstatus=2;
}else{
	$tstatus=0;
}

$sql="UPDATE transactions SET trest=NOW(), tstatus='$tstatus' WHERE sid='$sid' AND mid='$mid' AND tstatus='1'";
	require('mysql/connect.php');
if($result==1){
    $msg="Return is success";
    $v1=1;
}else{
    $msg="Return is failed";
    $v1=0;
}
	require('mysql/unconn.php');


?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html: charset=utf-8"/>
<title>Reture Sensors</title>
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
</head>