<?php
echo '<body background ="Course Information1.jpg">';
include 'connectDatabase.php';
connectDatabase();
echo "<p><font face= 'verdana'>Select a Course</font></p>";
//mysql_select_db($dbname, $conn) or die ("Error selecting specified database on mysql server: ".mysql_error());
$mmquery= 'SELECT course_number FROM cfa_major';
$mmresult= mysql_query($mmquery) or die ("Query to get data from firsttable failed: ".mysql_error());
echo '<form method = "post" action= "CFAMajor.php" >';
echo "<select name = cfam>";
while ($mmrow=mysql_fetch_array($mmresult)){
    $mmTitle = $mmrow["course_number"];
    echo "<option>
        $mmTitle
    </option>";
}

echo "</select>";// Closing of list box
echo "<input type='submit' value = 'submit the form'/>";
echo "</form>";
getResult();
echo "<p><font face= 'verdana'>Fall courses</font></p>";
$mmfallquery= 'SELECT course_number FROM cfa_major WHERE Fall_2016 = "Yes" ';
$mmresultfall= mysql_query($mmfallquery) or die ("Query to get data from firsttable failed: ".mysql_error());
echo "<select name = cismfall>";
while ($mmfallrow=mysql_fetch_array($mmresultfall)){
    $mmTitlefall = $mmfallrow["course_number"];
    echo "<option>
        $mmTitlefall
    </option>";
}
echo "</select>";// Closing of list box
echo "<p><font face= 'verdana'>Spring courses</font></p>";
$mmfallquery= 'SELECT course_number FROM cfa_major WHERE Spring_2017 = "Yes" ';
$mmresultfall= mysql_query($mmfallquery) or die ("Query to get data from firsttable failed: ".mysql_error());
echo "<select name = cismfall>";
while ($mmfallrow=mysql_fetch_array($mmresultfall)){
    $mmTitlefall = $mmfallrow["course_number"];
    echo "<option>
        $mmTitlefall
    </option>";
}
echo "</select>";// Closing of list box

echo "<p><font face= 'verdana'> Required courses</font></p>";
$mmfallquery= 'SELECT course_number FROM cfa_major WHERE Requirement = "Y" ';
$mmresultfall= mysql_query($mmfallquery) or die ("Query to get data from firsttable failed: ".mysql_error());
echo "<select name = cismfall>";
while ($mmfallrow=mysql_fetch_array($mmresultfall)){
    $mmTitlefall = $mmfallrow["course_number"];
    echo "<option>
        $mmTitlefall
    </option>";
}
echo "</select>";// Closing of list box

echo "<p><font face= 'verdana'>Elective courses</font></p>";
$mmfallquery= 'SELECT course_number FROM cfa_major WHERE elective = "Y" ';
$mmresultfall= mysql_query($mmfallquery) or die ("Query to get data from firsttable failed: ".mysql_error());
echo "<select name = cismfall>";
while ($mmfallrow=mysql_fetch_array($mmresultfall)){
    $mmTitlefall = $mmfallrow["course_number"];
    echo "<option>
        $mmTitlefall
    </option>";
}
echo "</select>";// Closing of list box

function getResult(){
    $sqlform = "SELECT * FROM cfa_major WHERE course_number LIKE '". $_POST['cfam']."'";
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
    table-layout: fixed;
    width: 150px;
    border: 1px solid black;
    border-collapse: collapse;
}
th, td {
    padding: 5px;
}";
        echo "</style>";
        echo "<table>
            <tr>
                <td BGCOLOR='#2270b5'><b>Course Number</b><br />$allnumber</td>
                <td BGCOLOR='#2270b5'><b>Course Title</b><br />$allTitle</td>
                <td BGCOLOR='#2270b5'><b>Course Description</b><br />$alldescript</td>
                <td BGCOLOR='#2270b5'><b>Requirement</b><br />$allrequirement</td>
                <td BGCOLOR='#2270b5'><b>Elective</b><br />$allelective</td>
                <td BGCOLOR='#2270b5'><b>Course Department</b><br />$alldept</td>
                <td BGCOLOR='#2270b5'><b>Course Prerequisite</b><br />$allprereq</td>
                <td BGCOLOR='#2270b5'><b>Available in Fall</b><br />$fall</td>
                <td BGCOLOR='#2270b5'><b>Available in Spring</b><br />$spring</td>
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

  echo '<form method = "post" action= "https://www.bentley.edu/files/2015/10/01/Major%3DBSFA.pdf">';
  echo "<input type='submit' value = 'Degree Requirement Summary'/>";
  echo "</form>";

echo '<form method = "post" action= "index.php" >';
echo "<input type='submit' value = 'back'/>";
echo "</form>";
echo "</body>";
?>