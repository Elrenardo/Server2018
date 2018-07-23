<?php


/*
JSON FORMAT
{
	'type':'SELECT/UPDATE/DELETE',
	'select':["NAME1","NAME2","NAME3"],
	'table':'TABLE NAME',
	'where':[
		{
			"nam":"NAME",
			"cop":">=",
			"val":"toto"
		},
		...
	],
	'dupli':0
}
*/


class ucrud_main extends SRVG\Module
{
	
	//Start fonction
	public function Start( $param, $config, $next )
	{
		//verifier l'existence du paramettre JSON
		if(!isset( base_security::$_ALLINPUT['json']))
		{
			SRVG\Error::e400();
			return;
		}

		//get JSON format
		$json = json_decode(base_security::$_ALLINPUT['json'],  true );
		if(!empty($json))
		{
			//ok
			SRVG\Error::e400();
			return;
		}

		//start crud
		$this->selectCrud( $json );
		
		//ok
		$next->next();
	}



	//Selection du CRUD
	private function selectCrud( $json )
	{
		switch($json['type'])
		{
			case 'select':
				select($json);
			break;
			case 'update':
				update($json);
			break;
			case 'delete':
				delete($json);
			break;
		};
	}
}







function select( $json )
{

}



function update( $json)
{

}



function delete( $json )
{
	$req = QB::table( $json["table"] );
	
	//build where
	$nb = count($json['where']);
	for($i=0; $i<$nb; $i++)
	{
		$t = $json['where'][$i];
		$req = $req->where( $t['nam'], $t['cop'], $t['val'] );
	}

	//exec
	$req->delete();
}