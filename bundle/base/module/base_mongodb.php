<?php
require 'vendor/autoload.php';

class base_mongodb extends SRVG\Module
{

	//http://pecl.php.net/package/mongodb/1.5.1/windows

	public static $bdname = "test";



	public static $driver;
	public static $datatable;
	
	//Start fonction
	public function Start( $route, $config, $next )
	{
		// Create a connection, once only.
		base_mongodb::$driver = new MongoDB\Client("mongodb://localhost:27017");
		base_mongodb::$datatable = base_mongodb::$driver->{base_mongodb::$bdname};
		
		//ok
		$next->next();
	}
}