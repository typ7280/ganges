<?php
/* Displays user information and some useful messages */
session_start();

// Check if user is logged in using the session variable
if ( $_SESSION['logged_in'] != 1 ) {
  $_SESSION['message'] = "You must log in before viewing your profile page!";
  header("location: error.php");    
}
else {
    // Makes it easier to read
    $mid = $_SESSION['mid'];
    $mname = $_SESSION['mname'];
    $email = $_SESSION['email'];
    $active = $_SESSION['active'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>GANGES: WATER QUALITY EVALUATION</title>
  <!-- Table Style -->
  <style type="text/css">
  body
{
	margin: 0;
	padding: 0;
	background: url(bg.jpg);
	background-size: cover;
	font-family: Arial;
}
h1
{
  margin: 0 0 10px;
  padding: 0;
  color: #fff;
  font-size: 24px;
}
input
{
	position: relative;
	display: inline-block;
	font-size: 20px;
	box-sizing: border-box;
	transition: .5s;
}
input[type="text"]
{
	background: #D8D8D8;
	width: 300px;
	height: 50px;
	border: none;
	outline: none; 
	padding: 0 25px;	
	border-radius: 25px 0 0 25px; 
}
input[type="submit"]
{
	position: relative;
	left:  -5px;
	border-radius: 0 25px 25px 0;
	width: 150px;
	height: 50px;
	border: none;
	outline: none;
	cursor: pointer;
	background: #ffc107;
}
input[type="submit"]:hover
{
	background: #ff5722;
}

/*Pop Up CSS*/

@charset "UTF-8";
@import url(https://fonts.googleapis.com/css?family=Open+Sans:300,400,700);
/*
body {
  font-family: 'Open Sans', sans-serif;
  font-weight: 300;
  line-height: 1.42em;
  color:#A7A1AE;
  background-color:#1F2739;
}
*/
.container th h1 {
	font-weight: bold;
	font-size: 1em;
  	text-align: center;
  	color: #FFFFFF;
}

.container td {
	  font-weight: normal;
	  font-size: 1em;
  -webkit-box-shadow: 0 2px 2px -2px #0E1119;
	   -moz-box-shadow: 0 2px 2px -2px #0E1119;
	        box-shadow: 0 2px 2px -2px #0E1119;
}

.container {
	  text-align: center;
	  overflow: hidden;
	  width: 80%;
	  margin: auto;
  display: table;
  padding: 0 0 8em 0;
}

.container td, .container th {
		padding-bottom: 2%;
	  padding-top: 2%;
  padding-left:2%;  
}

/* Background-color of the odd rows */
.container tr:nth-child(odd) {
	  background-color: #D4FFFF;
}

/* Background-color of the even rows */
.container tr:nth-child(even) {
	  background-color: #F4FFFA;
}

.container th {
	  background-color: #1F2739;
}

.container td:first-child { color: #FB667A; }

.container tr:hover {
   background-color: #FFE187;
-webkit-box-shadow: 0 6px 6px -6px #0E1119;
	   -moz-box-shadow: 0 6px 6px -6px #0E1119;
	        box-shadow: 0 6px 6px -6px #0E1119;
}

/*.container td:hover {
  background-color: #FFC107;
  color: #403E10;
  font-weight: bold;
  
  box-shadow: #7F7C21 -1px 1px, #7F7C21 -2px 2px, #7F7C21 -3px 3px, #7F7C21 -4px 4px, #7F7C21 -5px 5px, #7F7C21 -6px 6px;
  transform: translate3d(6px, -6px, 0);
  
  transition-delay: 0s;
	  transition-duration: 0.4s;
	  transition-property: all;
  transition-timing-function: line;
}

@media (max-width: 800px) {
.container td:nth-child(4),
.container th:nth-child(4) { display: none; }*/
}	

  </style>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="profile.php">GANGES SYSTEM</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="profile.php">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Dashboard</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-wrench"></i>
            <span class="nav-link-text">Reservation Systems</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseComponents">
            <li>
              <a href="navbar.php">All Members List</a>
            </li>
            <li>
              <a href="card.php">Detail of Each Member</a>
            </li>
          </ul>
        </li>
      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
		<!--<span class="d-lg-noon">  -->
      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle mr-lg-2" id="messagesDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-fw fa-envelope"></i> <span class="noti-alert">Messages <span class="badge badge-pill badge-primary">12 New</span> </span> <span class="indicator text-primary d-none d-lg-block"> <i class="fa fa-fw fa-circle"></i> </span> </a>
          <div class="dropdown-menu" aria-labelledby="messagesDropdown">
            <h6 class="dropdown-header">New Messages:</h6>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <strong>David Miller</strong>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">Hey there! This new version of SB Admin is pretty awesome! These messages clip off when they reach the end of the box so they don't overflow over to the sides!</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <strong>Jane Smith</strong>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">I was wondering if you could meet for an appointment at 3:00 instead of 4:00. Thanks!</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <strong>John Doe</strong>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">I've sent the final files over to you for review. When you're able to sign off of them let me know and we can discuss distribution.</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item small" href="#">View all messages</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle mr-lg-2" id="alertsDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-fw fa-bell"></i>
            <span class="noti-alert">Alerts
              <span class="badge badge-pill badge-warning">6 New</span>
            </span>
            <span class="indicator text-warning d-none d-lg-block">
              <i class="fa fa-fw fa-circle"></i>
            </span>
          </a>
          <div class="dropdown-menu" aria-labelledby="alertsDropdown">
            <h6 class="dropdown-header">New Alerts:</h6>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <span class="text-success">
                <strong>
                  <i class="fa fa-long-arrow-up fa-fw"></i>Status Update</strong>
              </span>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <span class="text-danger">
                <strong>
                  <i class="fa fa-long-arrow-down fa-fw"></i>Status Update</strong>
              </span>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <span class="text-success">
                <strong>
                  <i class="fa fa-long-arrow-up fa-fw"></i>Status Update</strong>
              </span>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item small" href="#">View all alerts</a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-fw fa-sign-out"></i>Logout</a>
        </li>
      </ul>
    </div>
  </nav>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">My Dashboard</li>
      </ol>

      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-area-chart"></i> Click on a picture to check the graph</div>
        <div class="card-body" align="center">
          <!-- <a href="https://thingspeak.com/channels/545049"><img src="img/graph.png"  width="780px" height="420px">  -->
         <a href="https://thingspeak.com/channels/575731"><img src="img/graph.png"  width="780px" height="420px"> 

          <!-- <canvas id="myAreaChart" width="100%" height="30" a href="https://thingspeak.com/channels/545049" ></canvas> -->
        </div>


    <br /><h2 align="center">Graph </h2><br>
	<table align="center">
	<tr algin="center">
	 <td align="center"><iframe width="450" height="260" style="border: 1px solid #cccccc;" src="https://thingspeak.com/channels/575731/charts/1?bgcolor=%23fff&color=%2312F6CE&dynamic=true&max=14&min=0&results=10&title=PH&type=spline&xaxis=Time&yaxis=pH"></iframe>
</td>
	<!--  <td></td> -->
  	<td align="center"><iframe width="450" height="260" style="border: 1px solid #cccccc;" src="https://thingspeak.com/channels/575731/charts/2?bgcolor=%23ffffff&color=%2312ACF6&dynamic=true&max=20&min=0&results=10&title=DO&type=spline&xaxis=Time&yaxis=mg%2FL"></iframe>
	</td>
    <tr></tr> 
	<td align="center"><iframe width="450" height="260" style="border: 1px solid #cccccc;" src="https://thingspeak.com/channels/575731/charts/3?bgcolor=%23ffffff&color=%23FBA942&dynamic=true&max=100&min=-10&results=10&title=Temperature&type=spline&xaxis=Time&yaxis=Celsius"></iframe>
	</td>
	<td align="center"><iframe width="450" height="260" style="border: 1px solid #cccccc;" src="https://thingspeak.com/channels/575731/charts/4?bgcolor=%23ffffff&color=%23DC74FF&dynamic=true&max=3000&min=0&results=10&title=Turbidity&type=spline&xaxis=Time&yaxis=NTU"></iframe>

	</td>
  	</tr>
 </table>

<br> <br /><h2 align="center"> Lastest Value </h2><br>
 <!-- <?php

   	$pH = file_get_contents('https://api.thingspeak.com/channels/575731/fields/1/last.txt');
    $DO = file_get_contents('https://api.thingspeak.com/channels/575731/fields/2/last.txt');
    $Temp = file_get_contents('https://api.thingspeak.com/channels/575731/fields/3/last.txt');
    $Turbidity = file_get_contents('https://api.thingspeak.com/channels/575731/fields/4/last.txt');

 echo "pH is = ".$pH."<br>";
 echo "Dislove Oxeygen is = ".$DO."<br>";
 echo "Temperature is = ".$Temp."<br>";  
 echo "Turbidity is = ".$Turbidity;
?> -->

<table class="container">
	<thead>

		<tr>
			<th><h1>Factor</h1></th>
			<th><h1>Values</h1></th>	
		</tr>
	</thead>

<?php

   	$pH = file_get_contents('https://api.thingspeak.com/channels/575731/fields/1/last.txt');
    $DO = file_get_contents('https://api.thingspeak.com/channels/575731/fields/2/last.txt');
    $Temp = file_get_contents('https://api.thingspeak.com/channels/575731/fields/3/last.txt');
    $Tur = file_get_contents('https://api.thingspeak.com/channels/575731/fields/4/last.txt');
 ?>

	<tbody>
		<tr>
			<td>pH</td>
			<td><?php echo($pH); ?></td>			
		</tr>
		<tr>
			<td>Dissolved Oxygen</td>
			<td><?php echo($DO); ?></td>		
		</tr>
		<tr>
			<td>Temperature</td>
			<td><?php echo($Temp); ?></td>		
		</tr>
    <tr>
			<td>Turbidity</td>
			<td><?php echo($Tur); ?></td>
		</tr>
	</tbody>

</table>

        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
      </div>
      <div class="row">
        <div class="col-lg-8">
    </div> 
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright © Your Website 2018</small>
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <!--  <a href="logout.php"><button class="button button-block" name="logout"/>Log Out</button></a>
           <a class="btn btn-primary" href="login.php">Logout</a> -->
           <a href="logout.php"><button class="btn btn-primary" name="logout">Logout</button>
          </div>
        </div>
      </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="js/sb-admin-datatables.min.js"></script>
    <script src="js/sb-admin-charts.min.js"></script>
  </div>
</body>

</html>
