<?php
 //echo '<body background ="Course Information.jpg">';
 include 'connectDatabase.php';
 connectDatabase();
echo '<p><b><font face= "verdana">Result:</b></font></p> ';
$a= $_POST["a"];
if ($a == ""){
$a = "default";
}
$searchquery= "SELECT * FROM cis_major WHERE course_number LIKE '%$a%' 
UNION SELECT * FROM cfa_major WHERE course_number LIKE '%$a%'
UNION SELECT * FROM ecofi_major WHERE course_number LIKE '%$a%'
UNION SELECT * FROM actuarialscience_major WHERE course_number LIKE '%$a%'
UNION SELECT * FROM marketing_minor WHERE course_number LIKE '%$a%'
UNION SELECT * FROM philosophy_minor WHERE course_number LIKE '%$a%'
UNION SELECT * FROM psychology_minor WHERE course_number LIKE '%$a%'
UNION SELECT * FROM idcc_minor WHERE course_number LIKE '%$a%'
UNION SELECT * FROM politics_minor WHERE course_number LIKE '%$a%'";


$searchresult = mysql_query($searchquery);
    if (mysql_num_rows($searchresult)== 0)
{
echo "<font face= 'verdana' size='5'>Sorry, no courses found with that course number.</font>";
}
    while ($therow=mysql_fetch_array($searchresult)){
        $coursenumber = $therow["course_number"];
        $courseTitle = $therow["course_title"];
        $coursedescript = $therow["course_description"];
        $courserequirement = $therow["requirement"];
        $courseelective = $therow["elective"];
        $coursedept = $therow["course_dept"];
        $courseprereq= $therow["course_prereq"];
        $fall= $therow["Fall_2016"];
        $spring= $therow["Spring_2017"];
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
                <td BGCOLOR='#2270b5'><b>Course Number</b><br />$coursenumber</td>
                <td BGCOLOR='#2270b5'><b>Course Title</b><br />$courseTitle</td>
                <td BGCOLOR='#2270b5'><b>Course Description</b><br />$coursedescript</td>
                <td BGCOLOR='#2270b5'><b>Requirement</b><br />$courserequirement</td>
                <td BGCOLOR='#2270b5'><b>Elective</b><br />$courseelective</td>
                <td BGCOLOR='#2270b5'><b>Course Department</b><br />$coursedept</td>
                <td BGCOLOR='#2270b5'><b>Course Prerequisite</b><br />$courseprereq</td>
                <td BGCOLOR='#2270b5'><b>Available in Fall</b><br />$fall</td>
                <td BGCOLOR='#2270b5'><b>Available in Spring</b><br />$spring</td>
            </tr>";
        echo "</table>";
    }
    mysql_close ();
echo '<form method = "post" action= "index.php" >';
echo "<input type='submit' value = 'back'/>";
echo "</form>";
//echo "</body>";
?>
