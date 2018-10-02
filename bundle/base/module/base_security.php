<?php


class base_security extends SRVG\Module
{

	public static $_COOKIE;
	public static $_GET;
	public static $_POST;
	public static $_FILES;
	public static $_INPUT;
	public static $_ALLINPUT;

	function __construct()
	{
		base_security::$_COOKIE   = [];
		base_security::$_GET      = [];
		base_security::$_POST     = [];
		base_security::$_FILES    = [];
		base_security::$_INPUT    = [];
		base_security::$_ALLINPUT = [];
	}

	//Start fonction
	public function Start( $route, $config, $next )
	{

		base_security::$_GET      = $this->secu( $_GET);
		base_security::$_COOKIE   = $this->secu( $_COOKIE);
		base_security::$_POST     = $this->secu( $_POST);
		base_security::$_FILES    = $_FILES;
		base_security::$_INPUT    = $this->secu( file_get_contents("php://input") );
		base_security::$_ALLINPUT = array_merge( base_security::$_GET, base_security::$_POST, base_security::$_INPUT); //All Input

		//ok
		$next->next();
	}


	//secu var
	private function secu( $var )
	{
		$ret = array();

		if( gettype($var) == 'array' )
		 $ret = array_map('htmlspecialchars', $var);

		return $ret;
	}
}