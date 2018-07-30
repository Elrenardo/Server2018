<?php


/*
DATABASE : In URL
JSON : in param
*/

class ucrud_parse extends SRVG\Module
{
	
	//Start fonction
	public function Start( $param, $config, $next )
	{
		$p = [];

		$p['table'] = $param->getUAddr();



		//get JSON format
		//verifier l'existence du paramettre JSON
		if(!isset( base_security::$_ALLINPUT['json']))
		{
			SRVG\Error::e400();
			return;
		}
		//decode json
		$p['json'] = json_decode( htmlspecialchars_decode(base_security::$_ALLINPUT['json']),  true );
		if(!empty($json))
		{
			//ok
			SRVG\Error::e400();
			return;
		}

		//get table
		$p['req'] = base_mongodb::$datatable->{ $p['table'] };


		//add params mongodb
		$param->mongodb = $p;
		//SRVG\Debug::var_dump( $param->mongodb );
		
		//ok
		$next->next();
	}
}