<?php
include 'recommendation.php';
$htable=new hashtable;
$rec=populateHashtable($htable,23);

for($i=0; $i<count($rec); $i++)
	echo $rec[$i].' ';
?>