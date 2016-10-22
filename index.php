<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
    <title>CS460CourseFinder</title>

</head>

<body>
    <p>CIS Major.</p>
    <?php
    $host_name = "test-server-cs-460.database.windows.net";
    $database = "team1cs460"; // Change your database name
    $username = "csadmin@test-server-cs-460";          // Your database user id
    $password = "cs4602017!";          // Your password
    $dbhandle = mssql_connect($host_name, $username, $password)
      or die("Couldn't connect to SQL Server on $host_name");
    ?>
    <select name="Major">
        <?php
        $selected = mssql_select_db($database, $dbhandle) or die("Couldn't open database $database");
        $sql = "SELECT course_number FROM CIS_major";
        $result = mssql_query($sql) or die("Couldn't execute query");
        while ($data=mssql_fetch_array($result, SQLSRV_FETCH_ASSOC)){
            echo "<option value=";
            echo $data['course_number'];
            echo ">";
            echo $data['course_number'];
            echo "</option>";
        }while (mssql_next_result($query));
        mssql_free_result($query);
        mssql_close($selected);
        ?>
    </select>
</body>

</html>
