<?php 
session_start();
$color = $_SESSION["bg-color"];
?>
<!DOCTYPE html>

<html>
<head>
<title> Session Zwei</title>
	<style>
		body {
			background-color: <?php echo $color;?>;
		}
	</style>
</head>
<body>
</body>

</html>
