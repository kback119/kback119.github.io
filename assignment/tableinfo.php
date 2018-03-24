<html>
	<head>
	
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
		height: 50px;
		padding: 15px;
    	margin-left: auto;
		margin-right: auto;
		
	}
	tr:nth-child(even){background-color: #f2f2f2;}
	tr:hover {background-color: #ddd;}
	
	th {
	    padding-top: 12px;
	    padding-bottom: 12px;
	    text-align: left;
	    background-color: #CCCCCC;
	    color: black;
	}
	</style>
		<title>Table Information</title>
		<?php 
			require_once 'config.php';
			$conn = new mysqli($databaseHost, $databaseUsername, $databasePassword, $databaseName);
			if ($conn->connect_errno) {
				printf("Connect failed: %s\n", $conn->connect_error);
				exit();
			} 
			$query = "select * from users";
			$result = $conn->query($query);
			$finfo = $result->fetch_fields();
			$rows = $result->num_rows;
			function transType($t) {
				switch ($t) {
					case '3':
						return 'Long';
						break;
					case '253':
						return 'Varchar';
						break;
					default:
						return 'Error';
						break;
				}
			}
		?>
	</head>
	<body>
		<div class="content">
			<div class="container">
				<div class="row">
				<h1>Table Data</h1>
				<?php if ($result): ?>
					<section class="col-sm-6 col-sm-offset-3">
					<table class="small table table-condensed table-striped">
						<thead>
							<tr><th>Field Name</th><th class="text-right">Length</th><th class="text-right">Data Type</th></tr>
						</thead>
					<tbody>
					<?php foreach ($finfo as $r): ?>
						<tr><td><?=$r->name?></td><td class="text-right"><?=$r->length?></td><td class="text-right"><?=transType($r->type)?></td></tr>
					<?php endforeach ?>
					</tbody>
					</table>
					</br>
					<blockquote><h4 style="margin: 0 auto; display:block; text-align: center">There are <?=$rows?> rows in the Index table.</h4></blockquote>
					</br>
					<a href="add.html" class="btn btn-info pull-right"
					style="margin: 0 auto; display:block; text-align: center">Add a New User</a>
					</section>
				<?php endif ?>
				</div>
			</div>
		</div>
	</body>
</html>