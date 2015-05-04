<?php
/* counter */

if(!isset($_SESSION['counter'])){
	$datei = fopen("countlog.txt","r");
	$count = fgets($datei,1000);
	fclose($datei);
	$count=$count + 1 ;
	$datei = fopen("countlog.txt","w");
	fwrite($datei, $count);
	fclose($datei);
	$_SESSION['counter']= time()+1800;
}

if(($_SESSION['counter'] < time()) && isset($_SESSION['counter']))
{
	//opens countlog.txt to read the number of hits
	$datei = fopen("countlog.txt","r");
	$count = fgets($datei,1000);
	fclose($datei);
	$count=$count + 1 ;
	$datei = fopen("countlog.txt","w");
	fwrite($datei, $count);
	fclose($datei);
}

?>