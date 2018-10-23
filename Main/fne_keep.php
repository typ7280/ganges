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

if(isset($_GET['tlend'])){
	$tledn=$_GET['tlend'];
}else{
	$tledn="";
}

$sql="UPDATE transactions SET tstatus='0' WHERE sid='$sid' AND mid='$mid' AND tlend='$tlend'";
	require('mysql/connect.php');
if($result==1){
    $msg="Late Return is success";
    $v1=1;
}else{
    $msg="Late Return is failed";
    $v1=0;
}
	require('mysql/unconn.php');


?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html: charset=utf-8"/>
<title>Late Return Sensor</title>
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