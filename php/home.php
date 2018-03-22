<html>

<head></head>

<body>
<?php
$post = array(
	'title' => $GET['title'], 
	'body' => $GET['body']
);
echo "<h1>".$post['title']."</h1>";
echo "<p>".$post['body']."</p>";
echo "<hr />";
?>

</body>

</html>
