<?php
/**
 * @author    Teysseire Guillaume
 * @version   1.0
 * @date      26/05/2018
 * @update    02/10/2018
 * @brief     SRVG/App Main router
 */

namespace SRVG;
class App
{

	/**
	* @brief Défini l'encodage en UTF8
	*/
	public static function setUTF8()
	{
		// Indique à PHP que nous allons effectivement manipuler du texte UTF-8
		mb_internal_encoding('UTF-8');
		// indique à PHP que nous allons afficher du texte UTF-8 dans le navigateur web
		mb_http_output('UTF-8');
	}

	/**
	* @brief Execute le traitement d'une route via l'URL
	* @return string;
	*/
	public static function Start()
	{
		//Création du gestionnaire de path
		$path = new Path();

		//Parsing route et paramettres
		$route = $path->getRoute();

		//Get Information route
		LoadRoute::load( $route );

		//Appelle des modules
		Exec::run( $route );
	}
}