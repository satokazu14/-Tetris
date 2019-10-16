<?php
session_start();

$fl = 0;




$min = 0;
$max = 6;
$kind = rand($min, $max);

switch ($kind) {
    case 0:
        $_SESSION["kind"] = 0;
        $_SESSION["main"][0][5] = 1;
        $_SESSION["main"][1][5] = 1;
        $_SESSION["main"][2][5] = 1;
        $_SESSION["main"][3][5] = 1;
        break;

    case 1:
        $_SESSION["kind"] = 1;
        $_SESSION["main"][0][4] = 1;
        $_SESSION["main"][1][4] = 1;
        $_SESSION["main"][0][5] = 1;
        $_SESSION["main"][1][5] = 1;
        break;

    case 2:
        $_SESSION["kind"] = 2;
        $_SESSION["main"][1][5] = 1;
        $_SESSION["main"][2][4] = 1;
        $_SESSION["main"][2][5] = 1;
        $_SESSION["main"][2][6] = 1;
        break;

    case 3:
        $_SESSION["kind"] = 3;
        $_SESSION["main"][1][5] = 1;
        $_SESSION["main"][2][4] = 1;
        $_SESSION["main"][2][5] = 1;
        $_SESSION["main"][3][4] = 1;
        break;

    case 4:
        $_SESSION["kind"] = 4;
        $_SESSION["main"][1][4] = 1;
        $_SESSION["main"][2][4] = 1;
        $_SESSION["main"][2][5] = 1;
        $_SESSION["main"][3][5] = 1;
        break;

    case 5:
        $_SESSION["kind"] = 5;
        $_SESSION["main"][1][5] = 1;
        $_SESSION["main"][2][5] = 1;
        $_SESSION["main"][3][5] = 1;
        $_SESSION["main"][3][6] = 1;
        break;

    case 6:
        $_SESSION["kind"] = 6;
        $_SESSION["main"][1][5] = 1;
        $_SESSION["main"][2][5] = 1;
        $_SESSION["main"][3][4] = 1;
        $_SESSION["main"][3][5] = 1;
        break;
}



$data = array(
    'fl' => $fl
);

echo json_encode($data);
exit;
