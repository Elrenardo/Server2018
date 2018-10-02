<?php


class base_bdd extends SRVG\Module
{
	
	//Start fonction
	public function Start( $route, $config, $next )
	{
		// Create a connection, once only.
		$config = array(
            'driver'    => 'mysql', // Db driver
            'host'      => 'localhost',
            'database'  => 'test',
            'username'  => 'root',
            'password'  => '',
            'charset'   => 'utf8'
        );

		new \Pixie\Connection('mysql', $config, 'QB');
		
		//ok
		$next->next();
	}
}