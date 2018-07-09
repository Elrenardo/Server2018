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
	//Module Path
	const module = 'tmp';
	//Route path
	const route = 'tmp';
	//Route extension file
	const routeExt = 'route';
	//Bundle Dir
	const bundle = 'bundle';
	
	//Get Srv Addr
	public static function getURL()
	{
		return $_SERVER['HTTP_HOST'].'/'.Config::$path;
	}
}