<?php

class ucrud_find extends SRVG\Module
{
	
	//Start fonction
	public function Start( $param, $config, $next )
	{

		//req
		$result = $param->mongodb['req']->find( $param->mongodb['json'] );

		//Parse résultat
		$tab = $this->getData( $result );

		//result
		header('Content-Type: application/json');
		print json_encode($tab);
	}




	//parse le résultat en version normal
	private function getData( $result )
	{
		$tab = [];
		foreach ($result as $entry)
		{
			array_push( $tab, $entry );
		}

		return $tab;
	}
}