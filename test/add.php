<html>
<head>
    <title>Add Data</title>
</head>
 
<body>
<?php

include_once("config.php");
 
if(isset($_POST['Submit'])) {    
    $f_name = $_POST['f_name'];
    $l_name = $_POST['l_name'];
    $u_bday = $_POST['u_bday'];
	$u_email = $_POST['u_email'];
    $u_tel = $_POST['u_tel'];
    $u_message = $_POST['u_message'];
        
    // checking empty fields
    if(empty($f_name) || empty($l_name) || empty($u_bday)
		empty($u_email) || empty($u_tel) || empty($u_message) ) {                
        if(empty($f_name)) {
            echo "<font color='red'>First Name field is empty.</font><br/>";
        }
		if(empty($l_name)) {
            echo "<font color='red'>Last Name field is empty.</font><br/>";
        }
        if(empty($u_bday)) {
            echo "<font color='red'>Birthday field is empty.</font><br/>";
        }
        if(empty($u_email)) {
            echo "<font color='red'>Email field is empty.</font><br/>";
        }
        if(empty($u_tel)) {
            echo "<font color='red'>Telephone field is empty.</font><br/>";
        }
        
        if(empty($u_message)) {
            echo "<font color='red'>Text field is empty.</font><br/>";
        }
        
        //link to the previous page
        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
    } 
	else { 
        // if all the fields are filled (not empty)             
        //insert data to database
        $result = mysqli_query($mysqli, "INSERT INTO users(f_name,l_name,
		u_bday,u_email, u_tel, u_message) VALUES('$f_name','$l_name','$u_bday',
		'$u_email','$u_tel','$u_message')");
        
        //display success message
        echo "<font color='green'>Data added successfully.";
        echo "<br/><a href='index.php'>View Result</a>";
    }
}
?>
</body>
</html>