<?php
// including the database connection file
include_once("config.php");
 
if(isset($_POST['update']))
{    
    $id = mysqli_real_escape_string($mysqli, $_POST['id']);
    
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
    } else {    
        //updating the table
        $result = mysqli_query($mysqli, "UPDATE users SET f_name='$f_name',l_name='$l_name',
		birthdate='$birthdate', country='$country', email='$email', tel='$tel' WHERE id=$id");
        
        //redirectig to the display page. In our case, it is index.php
        header("Location: index.php");
    }
}
?>
<?php
//getting id from url
$id = $_GET['id'];
 
//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM users WHERE id=$id");
 
while($res = mysqli_fetch_array($result))
{
    $f_name = $res['f_name'];
    $l_name = $res['l_name'];
    $birthdate = $res['birthdate'];
	$country = $res['country'];
    $email = $res['email'];
    $tel = $res['tel'];
}
?>
<html>
<head>    
    <title>Edit Data</title>
</head>
 
<body>
    <a href="index.php">Back to Index</a>
    <br/><br/>
    
    <form name="form1" method="post" action="edit.php">
        <table border="0">
            <tr> 
                <td>First Name:</td>
                <td><input type="text" name="f_name" required></td>
            </tr>
            <tr> 
                <td>Last Name:</td>
                <td><input type="text" name="l_name" required></td>
            </tr>
            <tr> 
                <td>Date of Birth:</td>
                <td><input type="date" name="birthdate" required></td>
            </tr>
            <tr> 
                <td>Country:</td>
                <td><input type="text" name="country" required></td>
            </tr>
            <tr> 
                <td>Email:</td>
                <td><input type="email" name="email" required></td>
            </tr>
            <tr> 
                <td>Phone Number:</td>
                <td><input type="tel" name="tel" required></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>