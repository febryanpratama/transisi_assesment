<?php 

function encrypt($data){
    $huruf = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
    $input = strtoupper($data);
    $data_array = str_split($input);
    $plus = true;
    $result = '';
    $x = 1;
    $y = 0;
    for ($i=0; $i < count($data_array); $i++) { 
        $y = array_search($data_array[$i], $huruf);
        if ($plus == true) {
            $result .= $huruf[$y+$x];
            $plus = false;
        } else {
            $xe = $y-$x;
            if ($xe < 0) {
                $xe = count($huruf) + ($xe);
            }
            $result .= $huruf[$xe];
            $plus = true;
        }
        $x++;
    }
  return $result;
}

echo encrypt('DFHKNQ');