<?php


class base_noDuplicate extends SRVG\Module
{

	const b_noDup = 'b_noDup';

	//Start fonction
	public function Start( $param, $config, $next )
	{
		//data
		$name = base_noDuplicate::b_noDup.$param->getName();
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