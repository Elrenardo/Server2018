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

		$b = new ExecNext( $route, $tabModule, 0 );
		$b->next();
	}
}


namespace SRVG;
class ExecNext
{
	private $posi = 0;
	private $tabModule = [];
	private $route;


	public function __construct( $_route, $_tabModule, $_nb )
	{
		$this->route = $_route;
		$this->posi = $_nb;
		$this->tabModule = $_tabModule;
	}


	public function next()
	{
		//limite verification
		if( $this->posi == count($this->tabModule))
			return;

		//get module
		$module = $this->tabModule[ $this->posi ];

		//fichier lien
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


		$b = new ExecNext( $this->route, $this->tabModule, $this->posi+1 );

		//Exécution
		$obj->Start( $this->route, $configModule, $b );
	}
}