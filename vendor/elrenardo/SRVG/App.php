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
		//Définir le format en UTF-8
		App::setUTF8();

		//Création du gestionnaire de path
		$path = new Path();

		//Parsing route et paramettres
		$route = $path->getRouteConfig();

		//Get Information route
		Route::getRoute( $route );

		//Appelle des modules
		Exec::run( $route );
	}



	private static function setUTF8()
	{
		// Indique à PHP que nous allons effectivement manipuler du texte UTF-8
		mb_internal_encoding('UTF-8');
		// indique à PHP que nous allons afficher du texte UTF-8 dans le navigateur web
		mb_http_output('UTF-8');
	}
}