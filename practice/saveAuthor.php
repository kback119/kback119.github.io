<?php 
	/*saveAuthor | saves data from sampleForm | 3/5/18*/
	require_once 'liblogin.php';
	$conn = new mysqli($hostname, $user, $pword, $database, 3306, '/Applications/MAMP/tmp/mysql/mysql.sock');
	if ($conn->connect_error) die($conn->connect_error);

	//ss validation goes here
	
	//store post data to array
	$data['f_name'] = $_POST['f_name'];
	$data['l_name'] = $_POST['l_name'];
	$data['address1'] = $_POST['address1'];
	$data['address2'] = $_POST['address2'];
	$data['city'] = $_POST['city'];
	$data['state'] = $_POST['state'];
	$data['zip'] = $_POST['zip'];

	//each array key is a field name; use that to set up query

	if ($_POST['author_id']) {
		$q = "update `authors` set "; 
		foreach ($data as $fldName => $postdata) {
			$q .= $fldName . " = '" . $postdata . "', ";
		}
		$q = substr($q,0,-2);
		$q .= " where author_id = " . $_POST['author_id'];
		$tryit = $conn->query($q);
	} else {
		$q = "insert into `authors` (`";
		$qd = ") values ('";
		foreach ($data as $fldName => $postdata) {
			$q .= $fldName . "`, `";
			$qd .= $postdata . "', '";
		}
		$qstr = substr($q,0,-3) . substr($qd,0,-3) . ");";
		echo $qstr . "<br>";
		$result = $conn->query($qstr);
	}
	header('Location: sampleForm.php');
	$q = "select * from authors";

	$result = $conn->query($q);
	if (!$result) die($conn->error);
	$rows = $result->num_rows;
	echo "There are " . $rows . " rows in the Authors table. <br>";
	echo "<a href='sampleForm.php'>Add another author... </a><br>";
?>