<html>
<head>
    <title>Registration</title>
</head>
 
<body>
<?php
//including the database connection file
include_once("config.php");




if(isset($_POST['Submit'])){

    $f_name = mysqli_real_escape_string($mysqli, $_POST['f_name']);
    $l_name = mysqli_real_escape_string($mysqli, $_POST['l_name']);
    $birthdate = mysqli_real_escape_string($mysqli, $_POST['birthdate']);
    $country = mysqli_real_escape_string($mysqli, $_POST['country']);
    $email = mysqli_real_escape_string($mysqli, $_POST['email']);
    $tel = mysqli_real_escape_string($mysqli, $_POST['tel']);

  if($f_name =="") {
    $errorMsg=  "error : You did not enter a first name.";
    $code= "1" ;
  }
  if($l_name =="") {
    $errorMsg=  "error : You did not enter a last name.";
    $code= "1" ;
  }
  if($country =="") {
    $errorMsg=  "error : You did not enter a last name.";
    $code= "1" ;
  }
  elseif($tel == "") {
    $errorMsg=  "error : Please enter number.";
    $code= "2";
  }
  //check if the number field is numeric
  elseif(is_numeric(trim($tel)) == false){
    $errorMsg=  "error : Please enter numeric value.";
    $code= "2";
  }
  elseif(strlen($tel)<10){
    $errorMsg=  "error : Number should be ten digits.";
    $code= "2";
  }
  //check if email field is empty
  elseif($email == ""){
    $errorMsg=  "error : You did not enter a email.";
    $code= "3";
} //check for valid email 
elseif(!preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $email)){
  $errorMsg= 'error : You did not enter a valid email.';
  $code= "3";
}
else{
  echo "Success";
  //final code will execute here.
}

}


 
if(isset($_POST['Submit'])) {    
    $f_name = mysqli_real_escape_string($mysqli, $_POST['f_name']);
    $l_name = mysqli_real_escape_string($mysqli, $_POST['l_name']);
    $birthdate = mysqli_real_escape_string($mysqli, $_POST['birthdate']);
    $country = mysqli_real_escape_string($mysqli, $_POST['country']);
    $email = mysqli_real_escape_string($mysqli, $_POST['email']);
    $tel = mysqli_real_escape_string($mysqli, $_POST['tel']);
        
    // checking empty fields
    if(empty($f_name) || empty($l_name) || empty($birthdate) ||
		empty($country) || empty($email) || empty($tel)) {                
        
		if(empty($f_name)) {
            echo "<font color='red'>First Name field is empty.</font><br/>";
        }
        
        if(empty($l_name)) {
            echo "<font color='red'>Last Name field is empty.</font><br/>";
        }
        
        if(empty($birthdate)) {
            echo "<font color='red'>Date of Birth field is empty.</font><br/>";
        }
		
        if(empty($country)) {
            echo "<font color='red'>Country field is empty.</font><br/>";
        }
        
        if(empty($email)) {
            echo "<font color='red'>Email field is empty.</font><br/>";
        }
        
        if(empty($tel)) {
            echo "<font color='red'>Telephone field is empty.</font><br/>";
        }
	
        //link to the previous page
        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
    } else { 
        // if all the fields are filled (not empty)             
        //insert data to database
        $result = mysqli_query($mysqli, "INSERT INTO users(f_name,l_name,birthdate, country, email, tel)
		VALUES('$f_name','$l_name','$birthdate','$country','$email','$tel')");
        
        //display success message
        echo "<font color='green'>Data added successfully.";
        echo "<br/><a href='index.php'>View Result</a>";
    }
}



?>

</body>
</html>