<?php

class cubeGame_upd extends SRVG\Module
{
	public function Start( $param, $config, $next )
	{
		$get = base_security::$_GET;

		if(!isset($get['name']))
		{
			echo 'false';
			return;
		}
		if(!isset($get['posiX']))
		{
			echo 'false';
			return;
		}
		if(!isset($get['posiY']))
		{
			echo 'false';
			return;
		}

		//get var
		$name   = $get['name'];
		$posi_x = $get['posiX'];
		$posi_y = $get['posiY'];


		//read file
		$file = file_get_contents('');
		echo 'true';
	}
}