<?php

print_r(loop(64));

function loop($var){
    for ($i=1; $i <= $var ; $i++) { 
        if ($i % 8 == 0) {
            echo $i." "."<br>";
        }else{
            echo $i." ";
        }
    }
}