<?php 

$str = "Jakarta adalah ibukota negara Republik Indonesia";

echo "Unigram : ". UniGram($str); 
echo "<br>Bigram : ". Bigram($str); 
echo "<br>Trigram : ". Trigram($str); 


function UniGram($var){
    $data = explode(" ",$var);
    $comma = implode(', ', $data);
    return $comma;
}

function Bigram($var){
    $data = explode(" ",$var);

    $comma = [];
    for ($i=0; $i < count($data) ; $i++) { 
        
        if ($i % 2 == 1) {
            $comma[] = $data[$i].",";
        }else{
            $comma[] = $data[$i];
        }
    }
    return join(' ',$comma);
}
function Trigram($var){
    $data = explode(" ",$var);

    $comma = [];
    for ($i=0; $i < count($data) ; $i++) { 
        
        if ($i % 4 == 2) {
            $comma[] = $data[$i].",";
        }else{
            $comma[] = $data[$i];
        }
    }
    return join(' ',$comma);
}