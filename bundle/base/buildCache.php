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


$PATH_FIND = '../';
$PATH_TMP  = '../../';


echo 'Build cache module: <br/>';
foreach (glob_recursive("module/*.php") as $filename)
{
	echo 'Add module => '.basename($filename).'<br/>';
	copy($filename,  $PATH_TMP.'tmp/'.basename($filename));
}


echo '<br/><br/>Build cache route: <br/>';
foreach (glob_recursive($PATH_FIND."*.route") as $filename)
{
	echo 'Add route => '.basename($filename).'<br/>';
	copy($filename,  $PATH_TMP.'tmp/'.basename($filename));
}