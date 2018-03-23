<html>
<head>
    <title>Add Data</title>
</head>
 
<body>
<?php
//including the database connection file
include_once("config.php");
 
if(isset($_POST['Submit'])) {    
    $f_name = $_POST['f_name'];
    $l_name = $_POST['l_name'];
    $bday = $_POST['bday'];
	$email = $_POST['email'];
    $tel = $_POST['tel'];
    $text = $_POST['text'];
        
    // checking empty fields
    if(empty($f_name) || empty($l_name) || empty($bday)
		empty($email) || empty($tel) || empty($text) ) {                
        if(empty($f_name)) {
            echo "<font color='red'>First Name field is empty.</font><br/>";
        }
		if(empty($l_name)) {
            echo "<font color='red'>Last Name field is empty.</font><br/>";
        }
        if(empty($bday)) {
            echo "<font color='red'>Birthday field is empty.</font><br/>";
        }
        if(empty($email)) {
            echo "<font color='red'>Email field is empty.</font><br/>";
        }
        if(empty($tel)) {
            echo "<font color='red'>Telephone field is empty.</font><br/>";
        }
        
        if(empty($text)) {
            echo "<font color='red'>Text field is empty.</font><br/>";
        }
        
        //link to the previous page
        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
    } else { 
        // if all the fields are filled (not empty)             
        //insert data to database
        $result = mysqli_query($mysqli, "INSERT INTO users(f_name,l_name,
		bday,email, tel, text) VALUES('$f_name','$l_name','$bday',
		'$email','$tel','$text')");
        
        //display success message
        echo "<font color='green'>Data added successfully.";
        echo "<br/><a href='index.php'>View Result</a>";
    }
}
?>
</body>
</html>