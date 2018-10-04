<?php
include 'path.php';

//suppresion cache
echo 'Suppression cache ! <br/><br/>';
//tout supprimé
if(file_exists($PATH_TMP))
	removeDirectory($PATH_TMP);

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
$lien = $PATH_FIND."/bundle/";
$liste = scandir($lien);
$nb = count($liste);
for( $i=0; $i<$nb; $i++)
{
	$b = $liste[$i];
	if( ($b!='.') && ($b!='..') )
	if( file_exists($lien.$b.'/src/'))
	{
		echo $b.'<br/>';
		recurse_copy($lien.$b.'/src/',  $PATH_TMP.'src/' );
	}
}