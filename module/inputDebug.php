<?php


class inputDebug extends SRVG\Module
{


	
	//Start fonction
	public function Start( $param, $config )
	{

		print '<pre>';
		var_dump($_GET);
		print '</pre><pre>';
		var_dump($_COOKIE);
		print '</pre><pre>';
		var_dump($_POST);
		print '</pre>';

		//ok
		return $param;
	}
}