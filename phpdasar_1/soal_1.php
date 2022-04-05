<?php

$nilain = array(72,65,73,78,75,74,90,81,87,65,55,69,72,78,79,91,100,40,67,77,86);

echo "Data : 72,65,73,78,75,74,90,81,87,65,55,69,72,78,79,91,100,40,67,77,86";

echo "<br><br>Nilai Rata-rata: ".substr(array_sum($nilain)/count($nilain),0,6);
echo "<br><br>Nilai Tertinggi: ".max($nilain);
echo "<br><br>Nilai Terendah: ".min($nilain);

