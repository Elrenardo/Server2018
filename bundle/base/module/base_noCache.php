<?php

class base_noCache extends SRVG\Module
{
	public function Start( $param, $config, $next )
	{
		header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
		header("Cache-Control: post-check=0, pre-check=0", false);
		header("Pragma: no-cache");

		//ok
		$next->next();
	}
}