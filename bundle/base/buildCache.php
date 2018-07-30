<?php

// Does not support flag GLOB_BRACE        
function glob_recursive($pattern, $flags = 0)
{
 $files = glob($pattern, $flags);
 foreach (glob(dirname($pattern).'/*', GLOB_ONLYDIR|GLOB_NOSORT) as $dir)
 {
   $files = array_merge($files, glob_recursive($dir.'/'.basename($pattern), $flags));
 }
 return $files;
}


 function rrmdir($dir) {
   if (is_dir($dir)) {
     $objects = scandir($dir);
     foreach ($objects as $object) {
       if ($object != "." && $object != "..") {
         if (filetype($dir."/".$object) == "dir") rmdir($dir."/".$object); else unlink($dir."/".$object);
       }
     }
     reset($objects);
     rmdir($dir);
   }
 }
 





$PATH_FIND = '../';
$PATH_TMP  = '../../tmp/';

//suppresion cache
echo 'Suppression cache ! <br/><br/>';
rrmdir($PATH_TMP);
mkdir($PATH_TMP);


echo 'Build cache module: <br/>';
$file = scandir($PATH_FIND);
for($i=0; $i<count($file); $i++)
{
	foreach (glob_recursive($PATH_FIND.$file[$i]."/module/*.php") as $filename)
	{
		echo 'Add module => '.basename($filename).'<br/>';
		copy($filename,  $PATH_TMP.basename($filename));
	}
}


echo '<br/><br/>Build cache route: <br/>';
foreach (glob_recursive($PATH_FIND."*.route") as $filename)
{
	echo 'Add route => '.basename($filename).'<br/>';
	copy($filename,  $PATH_TMP.basename($filename));
}