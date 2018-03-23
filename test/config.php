<?php
 
/*
// mysql_connect("database-host", "username", "password")
$conn = mysql_connect("localhost","root","root") 
            or die("cannot connected");
 
// mysql_select_db("database-name", "connection-link-identifier")
@mysql_select_db("kb_contact",$conn);
*/
 
/**
 * mysql_connect is deprecated
 * using mysqli_connect instead
 */
 
 $databaseHost = 'localhost';
 $databaseName = 'kb_contact';
 $databaseUsername = 'root';
 $databasePassword = '';


 $mysqli = mysqli_connect($databaseHost, $databaseName, $databaseUsername, $databasePassword);
 
}
 
?>

