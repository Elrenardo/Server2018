<?php
/**
 * @author    Teysseire Guillaume
 * @version   1.0
 * @date      26/05/2018
 * @update    26/05/2018
 * @brief     SRVG/Config configuration static
 */

namespace SRVG;
class Config
{
	//Get path build path.php
	public static $path;
	//Storage path
	const storage = 'storage';

	//Get Srv Addr
	public static function getURL()
	{
		return $_SERVER['HTTP_HOST'].'/'.Config::$path;
	}

	//Get Url Storage
	public static function getStorageUrl()
	{
		return Config::getURL().'/'.Config::storage.'/';
	}
}