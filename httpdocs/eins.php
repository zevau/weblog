<?php
session_start();
$color = "blue";
$_SESSION["bg-color"] = $color;
?>
<!DOCTYPE html>

<html>
<head>
<title> Session Eins</title>
	<style>
		body {
			background-color: <?php echo $color;?>;
		}
	</style>
</head>
<body>
</body>

</html>
