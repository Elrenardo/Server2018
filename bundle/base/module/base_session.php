<?php


class base_session extends SRVG\Module
{
	const GRP_NAME = '__srv.grp';

	function base_session()
	{
		//demarrage session
		session_start();
		$_SESSION[ base_session::GRP_NAME] = ['PUBLIC'];
	}
	
	//Start fonction
	public function Start( $param, $config, $next )
	{
		//verificartion des groupes
		if(!empty($config))
		if( gettype($config) == 'array')
		{
			foreach ($config as &$value)
			if( !in_array( $value, $_SESSION[ base_session::GRP_NAME]))
			{
				SRVG\Error::e403();
				exit();
			}
		}
		
		//ok
		$next->next();
	}


	public static function setTimeSession( $time )
	{
		session.gc_maxlifetime( $time );
	}


	//add groupe
	public static function addGrp( $name )
	{
		if (!in_array( $name, $_SESSION[ base_session::GRP_NAME]))
			array_push( $_SESSION[ base_session::GRP_NAME], $name );
	}
}