<?php
include 'path.php';

//suppresion cache
echo 'Suppression cache ! <br/><br/>';
//tout supprimé
rrmdir($PATH_TMP.'src');
rrmdir($PATH_TMP);

//cration dossier cache
mkdir($PATH_TMP);
//création SRC
mkdir($PATH_TMP.'src');


echo '## Build cache module: <br/>';
foreach (glob_recursive($PATH_FIND."/bundle/*/module/*.php") as $filename)
{
	echo 'Add module => '.basename($filename).'<br/>';
	copy($filename,  $PATH_TMP.basename($filename));
}


echo '<br/><br/>## Build cache route: <br/>';
foreach (glob_recursive($PATH_FIND."/bundle/*/route/*.route") as $filename)
{
	echo 'Add route => '.basename($filename).'<br/>';
	copy($filename,  $PATH_TMP.basename($filename));
}


echo '<br/><br/>## Build src cache: <br/>';
foreach (glob_recursive($PATH_FIND."/bundle/*/src/*.php") as $filename)
{
	echo 'Add src => '.basename($filename).'<br/>';
	copy($filename,  $PATH_TMP.'src/'.basename($filename));
}