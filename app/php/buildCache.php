<?php
include 'path.php';

//suppresion cache
echo 'Suppression cache ! <br/><br/>';
rrmdir($PATH_TMP);
mkdir($PATH_TMP);


echo 'Build cache module: <br/>';
foreach (glob_recursive($PATH_FIND."/bundle/*.php") as $filename)
{
	echo 'Add module => '.basename($filename).'<br/>';
	copy($filename,  $PATH_TMP.basename($filename));
}


echo '<br/><br/>Build cache route: <br/>';
foreach (glob_recursive($PATH_FIND."*.route") as $filename)
{
	echo 'Add route => '.basename($filename).'<br/>';
	copy($filename,  $PATH_TMP.basename($filename));
}