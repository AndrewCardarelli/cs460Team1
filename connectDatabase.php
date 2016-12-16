<?php
function connectDatabase() {
  $dbhost = "us-cdbr-azure-east-c.cloudapp.net";
  $dbuser = "bb353f4c99277d";
  $dbpass = "fd6f554d";
  $conn = mysql_connect($dbhost, $dbuser, $dbpass);
  $dbname = 'team1cs460final';
  mysql_select_db($dbname, $conn) or die ("Error selecting specified database on mysql server: ".mysql_error());
}
 ?>