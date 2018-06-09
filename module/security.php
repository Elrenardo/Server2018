<?php


class security extends SRVG\Module
{

	//Start fonction
	public function Start( $param, $config )
	{
		$_GET    = array_map('htmlspecialchars', $_GET);
		$_COOKIE = array_map('htmlspecialchars', $_COOKIE);
		$_POST   = array_map('htmlspecialchars', $_POST);

		//ok
		return $param;
	}
}