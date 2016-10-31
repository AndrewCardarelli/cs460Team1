<?php

$dbhost = "us-cdbr-azure-southcentral-f.cloudapp.net";
$dbuser = "bca23ab3a077fd";;
$dbpass = "585a705f";
$conn = mysql_connect($dbhost, $dbuser, $dbpass);

if(! $conn ) {
    die('Could not connect: ' . mysql_error());
}

echo 'Connected successfully';

?>