<?php
session_start();
for($i=0;$i < 24;$i++){
	for($j=0;$j < 10;$j++){
		$_SESSION["main"][$i][$j] = 0;
	}
}
$_SESSION["fl"] = 1;
//var_dump($_SESSION["main"]);
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="css/css.css">
  <title>Document</title>
</head>
<body>
	<div id="main">
	</div>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="js/script.js"></script>
</body>
</html>
