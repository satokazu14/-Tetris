<?php
session_start();

$fl = 0;

for($i=0;$i < 24;$i++){
	for($j=0;$j < 10;$j++){
		$bu[$i][$j] = $_SESSION["main"][$i][$j];
	}
}

switch($_POST['key']){
    case 39:
    for($i=23;$i >= 0;$i--){
        for($j=9;$j >= 0;$j--){
            if($bu[$i][$j] == 1){
                if(!($bu[$i][$j + 1] == 1|| $bu[$i][$j + 1] == 2 || $j == 9 || $fl == 1)){
                    $bu[$i][$j] = 0;
                    $bu[$i][$j + 1] = 1;
                }
                else{
                    $fl = 1;
                }
            }
        }
    }

    if($fl == 1){
        for($i=23;$i >= 0;$i--){
            for($j=0;$j < 10;$j++){
                if($_SESSION["main"][$i][$j] == 1){
                    $_SESSION["main"][$i][$j] = 1;
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
    break;

    case 37:
    for($i=23;$i >= 0;$i--){
        for($j=0;$j < 10;$j++){
            if($bu[$i][$j] == 1){
                if(!($bu[$i][$j - 1] == 1|| $bu[$i][$j - 1] == 2 || $j == 0 || $fl == 1)){
                    $bu[$i][$j] = 0;
                    $bu[$i][$j - 1] = 1;
                }
                else{
                    $fl = 1;
                }
            }
        }
    }

    if($fl == 1){
        for($i=23;$i >= 0;$i--){
            for($j=0;$j < 10;$j++){
                if($_SESSION["main"][$i][$j] == 1){
                    $_SESSION["main"][$i][$j] = 1;
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
    break;

    case 38:
    $x = array(0,0,0,0);
    $y = array(0,0,0,0);
    $cnt = 0;
    $fl = 0;
    for($i=0;$i < 24;$i++){
        for($j=0;$j < 10;$j++){
            if($_SESSION["main"][$i][$j] == 1){
                $y[$cnt] = $i;
                $x[$cnt] = $j;
                $cnt++;
                $_SESSION["main"][$i][$j] = 0;
            }
        }
    }

    if(!($y[3] < 6)){
        switch($_SESSION["kind"]){
            case 0:
            if($y[0] == $y[1] || $y[1] == $y[2] || $y[2] == $y[3]){
                $y[0]--;
                $x[0]++;
                $y[2]++;
                $x[2]--;
                $y[3]+=2;
                $x[3]-=2;
            }
            else{
                $y[0]++;
                $x[0]--;
                $y[2]--;
                $x[2]++;
                $y[3]-=2;
                $x[3]+=2;
            }

            if($x[0] < 0){
                $x[0]++;
                $x[1]++;
                $x[2]++;
                $x[3]++;
            }

            if($x[3] > 9){
                $x[0]-=2;
                $x[1]-=2;
                $x[2]-=2;
                $x[3]-=2;
            }

            if($y[3] > 23){
                $y[0]--;
                $y[1]--;
                $y[2]--;
                $y[3]--;
            }
            break;

            case 2;
            if($y[1] == $y[2] && $y[2] == $y[3]){
                $y[1]++;
                $x[1]++;
            }
            elseif($x[0] == $x[1] && $x[1] == $x[3]){
                $y[0]++;
                $x[0]--;
            }
            elseif($y[0] == $y[1] && $y[1] == $y[0]){
                $y[2]--;
                $x[2]--;
            }
            else{
                $y[3]--;
                $x[3]++;
            }

            for($i=0;$i < 3;$i++){
                if($x[$i] < 0){
                    $x[0]++;
                    $x[1]++;
                    $x[2]++;
                    $x[3]++;
                }

                if($x[$i] > 9){
                    $x[0]--;
                    $x[1]--;
                    $x[2]--;
                    $x[3]--;
                }

                if($y[$i] > 23){
                    $y[0]--;
                    $y[1]--;
                    $y[2]--;
                    $y[3]--;
                }
            }

            break;

            case 3:
            if($x[0] == $x[2] && $x[1] == $x[3]){
                $y[1]--;
                $y[3]--;
                $x[3]+=2;
            }
            else{
                $y[0]++;
                $y[3]++;
                $x[3]-=2;
            }

            for($i=0;$i < 3;$i++){
                if($x[$i] < 0){
                    $x[0]++;
                    $x[1]++;
                    $x[2]++;
                    $x[3]++;
                }

                if($x[$i] > 9){
                    $x[0]--;
                    $x[1]--;
                    $x[2]--;
                    $x[3]--;
                }

                if($y[$i] > 23){
                    $y[0]--;
                    $y[1]--;
                    $y[2]--;
                    $y[3]--;
                }
            }

            break;

            case 4:
            if($x[0] == $x[1] && $x[2] == $x[3]){
                $y[2]--;
                $y[3]--;
                $x[3]-=2;
            }
            else{
                $y[1]++;
                $y[2]++;
                $x[2]+=2;
            }

            for($i=0;$i < 3;$i++){
                if($x[$i] < 0){
                    $x[0]++;
                    $x[1]++;
                    $x[2]++;
                    $x[3]++;
                }

                if($x[$i] > 9){
                    $x[0]--;
                    $x[1]--;
                    $x[2]--;
                    $x[3]--;
                }

                if($y[$i] > 23){
                    $y[0]--;
                    $y[1]--;
                    $y[2]--;
                    $y[3]--;
                }
            }

            break;

            case 5:
            if($x[0] == $x[1] && $x[1] == $x[2]){
                $y[0]++;
                $x[0]++;
                $y[2]--;
                $x[2]--;
                $x[3]-=2;
            }
            elseif($y[0] == $y[1] && $y[1] == $y[2]){
                $y[0]--;
                $x[0]++;
                $y[2]++;
                $x[2]--;
                $y[3]-=2;
            }
            elseif($x[1] == $x[2] && $x[2] == $x[3]){
                $x[0]+=2;
                $y[1]++;
                $x[1]++;
                $x[3]--;
                $y[3]--;
            }
            else{
                $y[0]+=2;
                $y[1]--;
                $x[1]++;
                $x[3]--;
                $y[3]++;
            }

            for($i=0;$i < 3;$i++){
                if($x[$i] < 0){
                    $x[0]++;
                    $x[1]++;
                    $x[2]++;
                    $x[3]++;
                }

                if($x[$i] > 9){
                    $x[0]--;
                    $x[1]--;
                    $x[2]--;
                    $x[3]--;
                }

                if($y[$i] > 23){
                    $y[0]--;
                    $y[1]--;
                    $y[2]--;
                    $y[3]--;
                }
            }

            break;

            case 6:
            if($x[0] == $x[1] && $x[1] == $x[3]){
                $y[0]++;
                $x[0]++;
                $y[2]-=2;
                $y[3]--;
                $x[3]--;
            }
            elseif($y[1] == $y[2] && $y[2] == $y[3]){
                $x[0]+=2;
                $x[1]++;
                $y[1]--;
                $y[3]++;
                $x[3]--;
            }
            elseif($x[0] == $x[2] && $x[2] == $x[3]){
                $y[0]++;
                $x[0]++;
                $y[1]+=2;
                $y[3]--;
                $x[3]--;
            }
            else{
                $y[0]--;
                $x[0]++;
                $y[2]++;
                $x[2]--;
                $x[3]-=2;
            }

            for($i=0;$i < 3;$i++){
                if($x[$i] < 0){
                    $x[0]++;
                    $x[1]++;
                    $x[2]++;
                    $x[3]++;
                }

                if($x[$i] > 9){
                    $x[0]--;
                    $x[1]--;
                    $x[2]--;
                    $x[3]--;
                }

                if($y[$i] > 23){
                    $y[0]--;
                    $y[1]--;
                    $y[2]--;
                    $y[3]--;
                }
            }

            break;
        }
    }

    $fl = 0;

    for($i=0;$i <= $cnt;$i++){
        if($_SESSION["main"][$y[$i]][$x[$i]] == 2){
            $fl = 1;
        }
    }

    if($fl == 1){
        for($i=0;$i < 24;$i++){
            for($j=0;$j < 10;$j++){
                $_SESSION["main"][$i][$j] = $bu[$i][$j];
            }
        }
    }
    else{
        for($i=0;$i <= $cnt;$i++){
            $_SESSION["main"][$y[$i]][$x[$i]] = 1;
        }
    }

    break;
}