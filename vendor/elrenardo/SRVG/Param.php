<?php
/**
 * @author    Teysseire Guillaume
 * @version   1.0
 * @date      26/05/2018
 * @update    26/05/2018
 * @brief     SRVG/Param des routes
 */

namespace SRVG;
class Param
{
	private $name;
	private $uaddr;
	private $tabparam;

	private $tabModule;


	function __construct( $name, $uaddr, $param )
	{
		$this->name  = $name;
		$this->uaddr = $uaddr;
		$this->param = $param;
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
	* @return array param
	*/
	public function getParam()
	{
		return $this->param;
	}

	/**
	* @brief execute module
	* @return string uaddr
	*/
	public function getUAddr()
	{
		return $this->uaddr;
	}


	//Definir les module
	public function setModule( $tab_module)
	{
		$this->tabModule = $tab_module;
	}

	public function getModule()
	{
		return $this->tabModule;
	}


}