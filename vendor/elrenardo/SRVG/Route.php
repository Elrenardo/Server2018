<?php
/**
 * @author    Teysseire Guillaume
 * @version   1.0
 * @date      26/05/2018
 * @update    26/05/2018
 * @brief     SRVG/Route gestion des routes
 */

namespace SRVG;
class Route
{

	/**
	* @brief path du fichier php à charger
	* @param $name nom de la route
	* @return array info route
	*/
	public static function getRoute( $route )
	{
		//verifier JSON route file
		$file = './'.Config::route.'/'.$route->getName().'.json';
		if( !file_exists($file))
			Error::e404();

		$string = file_get_contents($file);
		$json_a = json_decode($string, true);
		if(is_null($json_a))
			Error::e901();

		$route->setModule( $json_a);
	}
}