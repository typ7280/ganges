<form action="lnd_save.php" method="post" name="brw_form" target="_self">
<input name="mid" type="hidden" value="<?php echo($mid);?>"> 
<!-- Sensor Reservation : --> <input name="sid" type="text" placeholder="Type Sensor ID...">
<!-- <input name="submit" type="submit" value="Search" placeholder="Type Sensor ID..." > -->
<input name="submit" type="submit" value="Search"> 

</form>
<style>
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
/*.box
{
   position: absolute;
   top: 50%;
   left: 50%;
   width: 500px;
   transform:  translate(-50%,-50%);
}*/
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
	width: 250px;
	height: 40px;
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
	height: 40px;
	border: none;
	outline: none;
	cursor: pointer;
	background: #ffc107;
}
input[type="submit"]:hover
{
	background: #11A0FF;
}
</style>