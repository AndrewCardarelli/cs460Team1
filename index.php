<?php
 //echo '<body background ="Plain Background1.jpg">';
 echo '<link href="StyleSheet1.css" rel="stylesheet">';
 echo '<br> <br> <br> <br>';
 include 'connectDatabase.php';
 connectDatabase();
 echo "<p><b><font face= 'arial black' size='4'>Select a Department</b></font></p>";
 //mysql_select_db($dbname, $conn) or die ("Error selecting specified database on mysql server: ".mysql_error());
 $mmquery= 'SELECT dept_name FROM dept_table';
 // $mmquery= 'SELECT dept_name FROM dept_table';
 $mmresult= mysql_query($mmquery) or die ("Query to get data from firsttable failed: ".mysql_error());
 //echo '<form method = "post" action= "StartPage.php" >';
 echo '<form method = "post" action= "index.php" >';
 echo "<select name = dept>";
 while ($mmrow=mysql_fetch_array($mmresult)){
     $mmTitle = $mmrow["dept_name"];
     echo "<option>
        $mmTitle
    </option>";
 }
 echo "</select>";
 
 echo '<form method = "post" action= "Script2">';
 echo "<input type='submit' value = 'find contact'/>";
 echo "</form>";
getContact();
 
 echo "<p><b><font face= 'arial' size='4' color = 'white'>Majors</b></font></p>";
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

 echo "<p><b><font face= 'arial' size='4' color = 'white'>Minors</b></font></p>";
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

  echo "<p><b><font face= 'arial black' size='4'>Search by course number</b></font></p>";
 echo '<form action="show.php" method="post">' ;
 echo '<input type="text" value="" name="a" class="textfield_effect" maxlength="10" onfocus="this.value='; 
 echo "'";
 echo '">';
 echo '<input type="submit" value="Submit" />'; 
 echo '</form>';

 $submittedValue = '';
 if (isset($_POST["depart_name"])) {
     $submittedValue = $_POST["depart_name"];
 }
 function getContact(){
    $sqlform = "SELECT * FROM dept_table WHERE dept_name LIKE '". $_POST['dept']."'";
    $result_form =mysql_query($sqlform);
    while ($allrow=mysql_fetch_array($result_form)){
        $dept_name = $allrow["dept_name"];
        $dept_chair = $allrow["dept_chair"];
        $office = $allrow["dept_office"];
        $email = $allrow["dept_email"];
        $phone = $allrow["dept_phone"];

  echo "<style>
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
th, td {
    padding: 5px;
}";
        echo "</style>";
        echo "<table>
            <tr>
                <td BGCOLOR='#ffffff'><b>Department</b><br />$dept_name</td>
                <td BGCOLOR='#ffffff'><b>Department Chair</b><br />$dept_chair</td>
                <td BGCOLOR='#ffffff'><b>Office Location</b><br />$office</td>
                <td BGCOLOR='#ffffff'><b>Email</b><br />$email</td>
                <td BGCOLOR='#ffffff'><b>Phone Number</b><br />$phone</td>
       
            </tr>";
        echo "</table>";

    }
}
echo '</body>';
 ?>
