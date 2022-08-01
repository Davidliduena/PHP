<?php

$item=200;
$numeroVotos=5000;
 
$percent = round($item/$numeroVotos*100);
 
if ($percent<=100){
 
	echo $percent;
}
else {
	echo "100";
 
}

?>