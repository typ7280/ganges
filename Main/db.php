<?php
/* Database connection settings */
$host = 'localhost';
$user = 'root';
$pass = '1234';
$db = 'ganges';
$mysqli = new mysqli($host,$user,$pass,$db) or die($mysqli->error);
