<?php
//including the database connection file
include_once("config.php");
 
//fetching data in descending order (lastest entry first)
//$result = mysql_query("SELECT * FROM users ORDER BY id DESC"); // mysql_query is deprecated
$result = mysqli_query($mysqli, "SELECT * FROM users ORDER BY id DESC"); // using mysqli_query instead
?>
 
<html>
<head>
<!-- CSS -->
	<style type="text/css">
	div {
		margin-bottom: 20px;
		font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
		border-collapse: collapse;
		width: 100%;
		
	}
	h1 {
    color: black;
	font: georgian;
    text-align: center;
	}
	th,td {
	    border: 1px solid #ddd;
	    padding: 8px;
	    height: 50px;
	    padding: 15px;
            text-align: left;
		
	}

	
	table {
    		border-collapse: collapse;
		width: 50%;
		height: 50px;
		padding: 15px;
    	margin-left: auto;
		margin-right: auto;
		
	}   
	</style>	
    <title>Homepage</title>
</head>
 
<body>
	
	<h1> Index</h1>
 
    <table width='80%' border=0>
        <tr bgcolor='#CCCCCC' font-weight:bold>
            <td>First Name</td>
            <td>Last Name</td>
            <td>Date of Birth</td>
            <td>Country</td>
            <td>Email</td>
            <td>Phone Number</td>
            <td>Update</td>
        </tr>
        <?php 
        //while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
        while($res = mysqli_fetch_array($result)) {         
            echo "<tr>";
            echo "<td>".$res['f_name']."</td>";
            echo "<td>".$res['l_name']."</td>";
            echo "<td>".$res['birthdate']."</td>";
            echo "<td>".$res['country']."</td>";
            echo "<td>".$res['email']."</td>";
            echo "<td>".$res['tel']."</td>"; 			
            echo "<td><a href=\"edit.php?id=$res[id]\">Edit</a> | <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";        
        }
        ?>
    </table>
	<br/><br/>
	<a href="add.html"
	style="margin: 0 auto; display:block; text-align: center"
	>Add New Data</a>
	
	
</body>
</html>