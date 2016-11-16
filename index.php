<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
    <title>CS460CourseFinder</title>

</head>

<body>
    <p>CIS Major.</p>
    <?php

   
    $dbhost = "us-cdbr-azure-east-c.cloudapp.net";
    $dbuser = "bb4ff2b5583709";
    $dbpass = "63ce33fa";
   $conn = mysql_connect($dbhost, $dbuser, $dbpass);

   if(! $conn ) {
       die('Could not connect: ' . mysql_error());
   }
   $dbname = 'team1webapp';


   mysql_select_db($dbname, $conn) or die ("Error selecting specified database on mysql server: ".mysql_error());
   $mmquery= 'SELECT course_number FROM cis_major';
   $mmresult= mysql_query($mmquery) or die ("Query to get data from firsttable failed: ".mysql_error());
   echo '<form method = "post" action= "index.php" >';
   echo "<select name = cism>";
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



   echo "<p>Marketing Minor.</p>";
   $mmquery= 'SELECT course_number FROM marketing_minor';
   $mmresult= mysql_query($mmquery) or die ("Query to get data from firsttable failed: ".mysql_error());
   echo "<select name = mm>";
   while ($mmrow=mysql_fetch_array($mmresult)){
       $mmTitle = $mmrow["course_number"];
       echo "<option>
        $mmTitle
    </option>";
   }
   echo "</select>";// Closing of list box

   echo "<p>Politics Minor.</p>";
   $mmquery= 'SELECT course_number FROM politics_minor';
   $mmresult= mysql_query($mmquery) or die ("Query to get data from firsttable failed: ".mysql_error());
   echo "<select name = mm>";
   while ($mmrow=mysql_fetch_array($mmresult)){
       $mmTitle = $mmrow["course_number"];
       echo "<option>
        $mmTitle
    </option>";
   }
   echo "</select>";// Closing of list box

   $option = isset($_POST['cism']) ? $_POST['cism']: false;
   if ($option) {
       //echo $_POST['cism'];
   }
   else {
       //echo "task option is required";
       exit;
   }

   function getResult(){
       //$sqlall= "SELECT * FROM cis_major";
       $sqlform = "SELECT * FROM cis_major WHERE course_number LIKE '". $_POST['cism']."'";
       //echo $sqlform."\n";
       //echo $sqlall;
       $result_form =mysql_query($sqlform);
       //$result_all =mysql_query($sqlall);
       while ($allrow=mysql_fetch_array($result_form)){
           $allnumber = $allrow["course_number"];
           $allTitle = $allrow["course_title"];
           $alldescript = $allrow["course_description"];
           $allrequirement = $allrow["requirment"];
           $allelective = $allrow["elective"];
           $alldept = $allrow["course_dept"];
           $allprereq= $allrow["course_prereq"];
           echo "<br>";
           echo "$allnumber "."| ";
           echo "$allTitle "."| ";
           echo "$alldescript " ."| ";
           echo "$allrequirement " ."| ";
           echo "$allelective " ."| ";
           echo "$alldept " ."| ";
           echo "$allprereq " ."| ";
       }
       //echo $result_all."\n";
       //echo $result_form;
       //return $result_form;

   }

    ?>
</body>
</html>
