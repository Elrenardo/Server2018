<?php


class base_noDuplicate extends SRVG\Module
{

	const b_noDup = 'b_noDup';

	//Start fonction
	public function Start( $route, $config, $next )
	{
		//si pas d eparam on passe
		if(count(base_security::$_ALLINPUT) == 0 )
		{
			//ok
			$next->next();
			exit();
		}

		//data
		$name = base_noDuplicate::b_noDup.$route->getName();
		$json = json_encode (base_security::$_ALLINPUT);

		//verifier si ca correspond
		if( isset($_SESSION[$name]))
		if( $_SESSION[$name] == $json)
			SRVG\Error::e403();

		//save
		$_SESSION[$name] = $json;

		//ok
		$next->next();
	}
}