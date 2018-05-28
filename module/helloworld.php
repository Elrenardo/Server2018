<?php


class helloworld extends SRVG\Module
{
	
	public function Start( $param, $config )
	{
		echo 'Hello World';
		return $param;
	}
}