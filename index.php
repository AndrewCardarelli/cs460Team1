<?php

 $dbhost = "us-cdbr-azure-east-c.cloudapp.net";
 $dbuser = "bb4ff2b5583709";
 $dbpass = "63ce33fa";
 $conn = mysql_connect($dbhost, $dbuser, $dbpass);
 $dbname = 'team1webapp';

 echo "<p>Select a Department</p>";
 mysql_select_db($dbname, $conn) or die ("Error selecting specified database on mysql server: ".mysql_error());
 $mmquery= 'SELECT dept_name FROM dept_table';
 // $mmquery= 'SELECT dept_name FROM dept_table';
 $mmresult= mysql_query($mmquery) or die ("Query to get data from firsttable failed: ".mysql_error());
 //echo '<form method = "post" action= "StartPage.php" >';
 echo '<form method = "post" action= "index.php" >';
 echo "<select name = $dept>";
 while ($mmrow=mysql_fetch_array($mmresult)){
     $mmTitle = $mmrow["dept_name"];
     echo "<option>
        $mmTitle
    </option>";
 }
 
 echo '<form method = "post" action= "Script2">';
 echo "<input type='submit' value = 'submit the form'/>";
 echo "</form>";
 
 echo "<p> <b>Majors</b> </p>";
 echo '<form method = "post" action= "CISMajor.php">';
 echo "<input type='submit' value = 'CIS Major'/>";
 echo "</form>";
 
 echo '<form method = "post" action= "CFAMajor.php">';
 echo "<input type='submit' value = 'CFA Major'/>";
 echo "</form>";

 echo '<form method = "post" action= "EcoFiMajor.php">';
 echo "<input type='submit' value = 'EcoFi Major'/>";
 echo "</form>";

 echo '<form method = "post" action= "ActuarialScienceMajor.php">';
 echo "<input type='submit' value = 'Actuarial Science Major'/>";
 echo "</form>";

 echo "<p> <b>Minors</b> </p>";
 echo '<form method = "post" action= "PoliticsMinor.php">';
 echo "<input type='submit' value = 'Politics Minor'/>";
 echo "</form>";
 
 echo '<form method = "post" action= "MarketingMinor.php">';
 echo "<input type='submit' value = 'Marketing Minor'/>";
 echo "</form>";

 echo '<form method = "post" action= "PhilosophyMinor.php">';
 echo "<input type='submit' value = 'Philosophy Minor'/>";
 echo "</form>";

 echo '<form method = "post" action= "IDCCMinor.php">';
 echo "<input type='submit' value = 'IDCC Minor'/>";
 echo "</form>";

 echo '<form method = "post" action= "PsychologyMinor.php">';
 echo "<input type='submit' value = 'Psychology Minor'/>";
 echo "</form>";

 $submittedValue = '';
 if (isset($_POST["depart_name"])) {
     $submittedValue = $_POST["depart_name"];
 }
 
 ?>
