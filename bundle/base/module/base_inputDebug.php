<?php


class base_inputDebug extends SRVG\Module
{
	
	//Start fonction
	public function Start( $route, $config, $next )
	{

		print '<fieldset><legend>INPUT VAR</legend># GET:<pre>';
		var_dump(base_security::$_GET);
		print '</pre># POST:<pre>';
		var_dump(base_security::$_POST);
		print '</pre># FILES:<pre>';
		var_dump(base_security::$_FILES);
		print '</pre># INPUT:<pre>';
		var_dump(base_security::$_INPUT);
		print '</pre># COOKIE:<pre>';
		var_dump(base_security::$_COOKIE);
		print '</pre></fieldset><br/><fieldset><legend>INPUT ALL VAR</legend><pre>';
		var_dump(base_security::$_ALLINPUT);
		print '</pre>';

		//ok
		$next->next();
	}
}