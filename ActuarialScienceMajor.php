<?php
$dbhost = "us-cdbr-azure-east-c.cloudapp.net";
$dbuser = "bb4ff2b5583709";
$dbpass = "63ce33fa";
$conn = mysql_connect($dbhost, $dbuser, $dbpass);
$dbname = 'team1webapp';

echo "<p>Select a Course</p>";
mysql_select_db($dbname, $conn) or die ("Error selecting specified database on mysql server: ".mysql_error());
$mmquery= 'SELECT course_number FROM ActuarialScience_major';
$mmresult= mysql_query($mmquery) or die ("Query to get data from firsttable failed: ".mysql_error());
echo '<form method = "post" action= "ActuarialScienceMajor.php" >';
echo "<select name = actuarialsciencem>";
while ($mmrow=mysql_fetch_array($mmresult)){
    $mmTitle = $mmrow["course_number"];
    echo "<option>
        $mmTitle
    </option>";
}

echo "</select>";// Closing of list box
echo "<input type='submit' value = 'submit the form'/>";
echo "</form>";
echo "<p> Fall courses </p>";
$mmfallquery= 'SELECT course_number FROM ActuarialScience_major WHERE Fall_2016 = "Yes" ';
$mmresultfall= mysql_query($mmfallquery) or die ("Query to get data from firsttable failed: ".mysql_error());
echo "<select name = cismfall>";
while ($mmfallrow=mysql_fetch_array($mmresultfall)){
    $mmTitlefall = $mmfallrow["course_number"];
    echo "<option>
        $mmTitlefall
    </option>";
}
echo "</select>";// Closing of list box
echo "<p> Spring courses </p>";
$mmfallquery= 'SELECT course_number FROM ActuarialScience_major WHERE Spring_2017 = "Yes" ';
$mmresultfall= mysql_query($mmfallquery) or die ("Query to get data from firsttable failed: ".mysql_error());
echo "<select name = cismfall>";
while ($mmfallrow=mysql_fetch_array($mmresultfall)){
    $mmTitlefall = $mmfallrow["course_number"];
    echo "<option>
        $mmTitlefall
    </option>";
}
echo "</select>";// Closing of list box
echo '<form method = "post" action= "index.php" >';
echo "<input type='submit' value = 'back'/>";
echo "</form>";
getResult();

function getResult(){
    $sqlform = "SELECT * FROM actuarialscience_major WHERE course_number LIKE '". $_POST['actuarialsciencem']."'";
    $result_form =mysql_query($sqlform);
    while ($allrow=mysql_fetch_array($result_form)){
        $allnumber = $allrow["course_number"];
        $allTitle = $allrow["course_title"];
        $alldescript = $allrow["course_description"];
        $allrequirement = $allrow["requirement"];
        $allelective = $allrow["elective"];
        $alldept = $allrow["course_dept"];
        $allprereq= $allrow["course_prereq"];
        $fall= $allrow["Fall_2016"];
        $spring= $allrow["Spring_2017"];

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
                <td><b>Course Number</b><br />$allnumber</td>
                <td><b>Course Title</b><br />$allTitle</td>
                <td><b>Course Description</b><br />$alldescript</td>
                <td><b>Requirement</b><br />$allrequirement</td>
                <td><b>Elective</b><br />$allelective</td>
                <td><b>Course Department</b><br />$alldept</td>
                <td><b>Course Prerequisite</b><br />$allprereq</td>
                <td><b>Available in Fall</b><br />$fall</td>
                <td><b>Available in Spring</b><br />$spring</td>
            </tr>";
        echo "</table>";

       /* echo "<br>";
        echo "$allnumber "."| ";
        echo "$allTitle "."| ";
        echo "$alldescript " ."| ";
        echo "$allrequirement " ."| ";
        echo "$allelective " ."| ";
        echo "$alldept " ."| ";
        echo "$allprereq " ."| ";
        */
    }
}
?>