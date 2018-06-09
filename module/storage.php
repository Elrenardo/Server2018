<?php


class storage extends SRVG\Module
{

	//Default file
	const default_file = 'index.html';
	
	//Start fonction
	public function Start( $param, $config )
	{
		//Verifier le default file
		$fichier = $param->getUAddr();
		if( $fichier == '')
			$fichier = storage::default_file;

		//Build Addr
		$file = 'http://'.SRVG\Config::getStorageUrl().$param->getName().'/'.$fichier;
		$path = './'.SRVG\Config::storage.'/'.$param->getName().'/'.$fichier;

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
		return $param;
	}
}