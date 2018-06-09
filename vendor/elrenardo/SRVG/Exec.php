<?php
/**
 * @author    Teysseire Guillaume
 * @version   1.0
 * @date      26/05/2018
 * @update    26/05/2018
 * @brief     SRVG/Exec execution des module
 */

namespace SRVG;
class Exec
{


	/**
	* @brief execute module
	*/
	public function run( $route )
	{
		$tabModule = $route->getModule();
		$rep = $route;

		//Exécute les ctrl
		$nb = count($tabModule);
		for( $i=0; $i<$nb; $i++)
		{
			$module = $tabModule[$i];

			$file = './'.Config::module.'/'.$module["name"].'.php';

			//verifier si le fichier existe
			if( !file_exists($file))
				Error::e902();

			//include fichier
			require_once( $file);

			//Création de l'object chargé
			$obj = new $module["name"]();

			//get configuration module si existe
			$configModule = null;
			if(isset($module["config"]))
				$configModule = $module["config"];

			//Exécution
			$rep = $obj->Start( $rep, $configModule );

			//Arret si pas de retour
			if( is_null($rep))
				Error::e200();
		}
	}
}