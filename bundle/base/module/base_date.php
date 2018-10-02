<?php


class base_date extends SRVG\Module
{
	
	//Start fonction
	public function Start( $route, $config, $next )
	{
		print date("Y-m-d H:i:s");
		//ok
		$next->next();
	}
}