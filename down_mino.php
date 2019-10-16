<?php
session_start();

for($i=0;$i < 24;$i++){
	for($j=0;$j < 10;$j++){
		$bu[$i][$j] = $_SESSION["main"][$i][$j];
	}
}

$fl = 0;

if ($_SESSION["main"][3][0] == 2 || $_SESSION["main"][3][1] == 2 || $_SESSION["main"][3][2] == 2 || $_SESSION["main"][3][3] == 2 || $_SESSION["main"][3][4] == 2 || $_SESSION["main"][3][5] == 2 || $_SESSION["main"][3][6] == 2 || $_SESSION["main"][3][7] == 2 || $_SESSION["main"][3][8] == 2 || $_SESSION["main"][3][9] == 2) {
    $fl = 2;
}

for($i=23;$i >= 0;$i--){
	for($j=0;$j < 10;$j++){
        if($bu[$i][$j] == 1){
            if($i == 23){
                $bu[$i][$j] = 2;
                $fl = 1;
            }
            elseif($bu[$i + 1][$j] == 2){
                $bu[$i][$j] = 2;
                $fl = 1;
            }
            else{
                $bu[$i][$j] = 0;
                $bu[$i + 1][$j] = 1;
            }
        }
	}
}

if($fl == 1){
    for($i=23;$i >= 0;$i--){
        for($j=0;$j < 10;$j++){
            if($_SESSION["main"][$i][$j] == 1){
                $_SESSION["main"][$i][$j] = 2;
            }
        }
    }
}
else{
    for($i=23;$i >= 0;$i--){
        for($j=0;$j < 10;$j++){
            $_SESSION["main"][$i][$j] = $bu[$i][$j];
        }
    }
}

$main = "";
$main.= '<table border="1" width="300" height="600">';
for($i=4;$i < 24;$i++){
    $main.= '<tr>';
    for($j=0;$j < 10;$j++){
        if($_SESSION["main"][$i][$j] == 0){
            $main.= '<td class="w"></td>';
        }
        else{
            $main.= '<td class="b"></td>';
        }
    }
    $main.= '</tr>';
}
$main.= '</table>';

$data = array(
    'main' => $main,
    'fl' => $fl);

echo json_encode($data);
exit;
?>
