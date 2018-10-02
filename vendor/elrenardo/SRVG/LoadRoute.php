<?php
/**
 * @author    Teysseire Guillaume
 * @version   1.0
 * @date      26/05/2018
 * @update    02/10/2018
 * @brief     SRVG/LoadRoute chargement des fichiers routes
 */

namespace SRVG;
class LoadRoute
{

	/**
	* @brief path du fichier php à charger
	* @param $name nom de la route
	* @return array info route
	*/
	public static function load( $route )
	{
		//verifier JSON route file
		$file = './'.Config::route.'/'.$route->getName().'.'.Config::routeExt;

		//fichier existe
		if( !file_exists($file))
			Error::e404();

		//charger le fichier
		$string = file_get_contents($file);

		//decodage du json
		$json_a = json_decode($string, true);
		if(is_null($json_a))
			Error::e901();

		//set route module
		$route->setModule( $json_a);
	}
}