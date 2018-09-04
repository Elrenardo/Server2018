<?php
include 'path.php';



foreach (glob_recursive($PATH_TMP."*.route") as $filename)
{
	$file = basename($filename);
	echo '<b>File => '.$file.'</b><br/>';
	
	$json = json_decode(file_get_contents( $PATH_TMP.$file), true);
	
	echo '<pre>';
	var_dump($json);
	echo '</pre>';

	echo '<hr/>';

}