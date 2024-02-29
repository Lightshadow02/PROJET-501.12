<?php

require('classes/Functions.php');

$badges = getAllPrivee("badges");

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="style.css"/>
	</head>
	<body>
		<?php $check = "no";
		foreach($badges as $value) {
			if($value['numero'] == $_GET['uid']){
				$check = "yes";
			}
		}
		echo $check;?>
	</body>
</html>
