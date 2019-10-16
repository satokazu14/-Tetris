<?php
session_start();

for($i=23;$i >= 0;$i--){
    $fl = 0;
	while($fl == 0){
        if($_SESSION["main"][$i][0] == 2 && $_SESSION["main"][$i][1] == 2 && $_SESSION["main"][$i][2] == 2 && $_SESSION["main"][$i][3] == 2 && $_SESSION["main"][$i][4] == 2 && $_SESSION["main"][$i][5] == 2 && $_SESSION["main"][$i][6] == 2 && $_SESSION["main"][$i][7] == 2 && $_SESSION["main"][$i][8] == 2 && $_SESSION["main"][$i][9] == 2){
            for($j=$i - 1;$j >= 4;$j--){
                for($k=0;$k < 10;$k++){
                    $_SESSION["main"][$j + 1][$k] = $_SESSION["main"][$j][$k];
                }
            }
        }
        else{
            $fl = 1;
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
    'main' => $main);

echo json_encode($data);
exit;
