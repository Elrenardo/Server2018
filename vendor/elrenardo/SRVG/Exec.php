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
			$file = './module/'.$module["name"].'.php';

			//verifier si le fichier existe
			if( !file_exists($file))
			{
				echo 'Module lost !';
				exit();
			}

			//include fichier
			require_once( $file);

			//Création de l'object chargé
			$obj = new $module["name"]();
			//Exécution
			$rep = $obj->Start( $rep, $module["config"] );
			//Arret si pas de retour
			if( is_null($rep))
				exit();
		}
	}
}