<?php
/**
 * @author    Teysseire Guillaume
 * @version   1.0
 * @date      26/05/2018
 * @update    26/05/2018
 * @brief     SRVG/App Main router
 */

namespace SRVG;
class App
{
	public static function Start()
	{
		//Création du gestionnaire de path
		$path = new Path();

		//Parsing route et paramettres
		$route = $path->getRouteConfig();

		//Get Information route
		Route::getRoute( $route );

		//Appelle des modules
		Exec::run( $route );
	}
}