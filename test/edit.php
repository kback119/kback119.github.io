<?php
// including the database connection file
include_once("config.php");
 
if(isset($_POST['update']))
{    
    $id = $_POST['id'];
    
    $f_name=$_POST['f_name'];
    $l_name=$_POST['l_name'];
    $bday=$_POST['bday'];
    $email=$_POST['email'];
    $tel=$_POST['tel'];
    $text=$_POST['text'];      
    
    // checking empty fields
    if(empty($f_name) || empty($l_name) || empty($u_bday)
		empty($u_email) || empty($u_tel) || empty($u_message)) {            
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
    } else {    
        //updating the table
        $result = mysqli_query($mysqli, "UPDATE users SET f_name='$f_name',l_name='$l_name',
		u_bday='$u_bday', u_email='$u_email', u_tel='$u_tel', u_message='$u_message' WHERE id=$id");
        
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
    $u_bday = $res['u_bday'];
    $u_email = $res['u_email'];
    $u_tel = $res['u_tel'];
    $u_message = $res['u_message'];
}
?>
<html>
<head>    
    <title>Edit Data</title>
</head>
 
<body>
    <a href="index.php">Home</a>
    <br/><br/>
    
    <form name="form1" method="post" action="edit.php">
        <table border="0">
            <tr> 
                <td>First Name:</td>
                <td><input type="text" name="f_name" value="<?php echo $f_name;?>"></td>
            </tr>
            <tr> 
                <td>Last Name:</td>
                <td><input type="text" name="l_name" value="<?php echo $l_name;?>"></td>
            </tr>
            <tr> 
                <td>Date of Birth:</td>
                <td><input type="date" name="u_bday" value="<?php echo $u_bday;?>"></td>
            </tr>
            <tr> 
                <td>Email:</td>
                <td><input type="email" name="u_email" value="<?php echo $u_email;?>"></td>
            </tr>
            <tr> 
                <td>Phone number:</td>
                <td><input type="tel" name="u_tel" value="<?php echo $u_tel;?>"></td>
            </tr>
            <tr> 
                <td>Introduce yourself:</td>
                <td><input type="text" name="u_message" value="<?php echo $u_message;?>"></td>
            </tr>
			
            <tr>
                <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>