<?php
/**
 * @author    Teysseire Guillaume
 * @version   1.0
 * @date      28/05/2018
 * @update    28/05/2018
 * @brief     SRVG/Error gestion des erruer
 */

namespace SRVG;
class Error
{

	public static function e200()
	{
		$err = $_SERVER['SERVER_PROTOCOL'] . ' 200 OK';
		header($err, true, 200);
		print($err);
		
		exit();
	}

	public static function e400()
	{
		$err = $_SERVER['SERVER_PROTOCOL'] . ' 400 Bad Request';
		header($err, true, 400);
		print($err);
		exit();
	}

	public static function e403()
	{
		$err = $_SERVER['SERVER_PROTOCOL'] . ' 403 Not Found';
		header($err, true, 403);
		print($err);
		exit();
	}

	public static function e404()
	{
		$err = $_SERVER['SERVER_PROTOCOL'] . ' 404 Not Found';
		header($err, true, 404);
		print($err);
		exit();
	}

	public static function e500()
	{
		$err = $_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error';
		header($err, true, 500);
		print($err);
		exit();
	}



	//!!Special !!
	public static function e901()
	{
		$err = $_SERVER['SERVER_PROTOCOL'] . ' 901 Json Route Error';
		header($err, true, 901);
		print($err);
		exit();
	}
	public static function e902()
	{
		$err = $_SERVER['SERVER_PROTOCOL'] . ' 902 Module lost';
		header($err, true, 902);
		print($err);
		exit();
	}
}