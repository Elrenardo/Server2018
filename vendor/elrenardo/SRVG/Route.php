<?php
/**
 * @author    Teysseire Guillaume
 * @version   1.0
 * @date      26/05/2018
 * @update    02/10/2018
 * @brief     SRVG/Route gestion d'une routes
 */

namespace SRVG;
class Route
{
	private $name;  // Correpond au nom de la route qui sera utilisé
	private $uaddr; //Contient le complétement de route demandé
	private $data;  //Data crée par les modules

	private $tabModule;//Liste des modules a exécuter


	function __construct( $name, $uaddr )
	{
		$this->name  = $name;
		$this->uaddr = $uaddr;
	}


	/**
	* @brief execute module
	* @return string name
	*/
	public function getName()
	{
		return $this->name;
	}


	/**
	* @brief execute module
	* @return string uaddr
	*/
	public function getUAddr()
	{
		return $this->uaddr;
	}



	/**
	* @brief Défini la liste ds modules
	*/
	public function setModule( $tab_module)
	{
		$this->tabModule = $tab_module;
	}

	/**
	* @brief renvoi la liste des modules
	* @return array string
	*/
	public function getModule()
	{
		return $this->tabModule;
	}


	/**
	* @brief Ajouter une data
	* @param $name string
	* @param $value void
	*/
	public function addDate( $name, $value )
	{
		$this->data[ $name ] = $value;
	}



	/**
	* @brief renvoi une data
	* @return void or null
	*/
	public function getData( $name )
	{
		if(isset($this->data[ $name ]))
			return $this->data[ $name ];
		return null;
	}
}