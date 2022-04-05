<?php 
$str = "TranSISI";
$arr = str_split($str);

$count_lower = [];

for ($i=0; $i < count($arr); $i++) { 
    $status = Ctype($arr[$i]);
    
    if ($status == true) {
        $count_lower[] = $arr[$i];
    }
}

function Ctype($testcase){
    // 
    if(ctype_lower($testcase)){
        return true;
    }else{
        return false;
    }
}

echo "Lowercase dari String " . $str." sebanyak ".count($count_lower);