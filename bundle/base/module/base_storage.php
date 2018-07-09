<?php


class base_storage extends SRVG\Module
{
	//Storage path
	const storage = 'storage';

	//Default file
	const default_file = 'index.html';
	
	//Start fonction
	public function Start( $param, $config, $next )
	{
		//Verifier le default file
		$fichier = $param->getUAddr();
		if( $fichier == '')
			$fichier = base_storage::default_file;

		//verif config
		if( empty($config))
			$config = SRVG\Config::bundle;


		//Build Addr
		$file = 'http://'.SRVG\Config::getURL().'/'.$config.'/'.$param->getName().'/'.$fichier;
		$path = './'.$config.'/'.$param->getName().'/'.$fichier;

		//fichier existe ?
		if( !file_exists($path))
			SRVG\Error::e404();

		//get header file
		$ret =  get_headers( $file );
		foreach ($ret as $key => $value){
			header($value);
		}

		//read file
		print file_get_contents( $path );

		//ok
		$next->next();
	}
}