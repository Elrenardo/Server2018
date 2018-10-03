<?php
/**
 * @author    Teysseire Guillaume
 * @version   1.0
 * @date      26/05/2018
 * @update    02/10/2018
 * @brief     SRVG/Path gestion des paths fichier
 */

namespace SRVG;
class Path
{
	private $path;
	
	/**
	* @brief  fonction de construction
	*/
	function __construct()
	{
		$buffer = explode('/',$_SERVER['PHP_SELF']);
		array_pop( $buffer );//enlever le "index.php"
		$buffer = implode('/',$buffer );
		$buffer = substr($buffer,1);//enlever le premier "/"
		$buffer = $buffer.'/';

		$this->path =  $buffer;
		//global
		Config::$path = $buffer;
	}



	/**
	* @brief renvoi le path d'éxécution
	* @return string;
	*/
	public function getPath()
	{
		return $this->path;
	}



	/**
	* @brief renvoi un array contenant les infos de la route
	* @return string;
	*/
	public function getRoute()
	{
		$t = explode( $this->path, $_SERVER["REQUEST_URI"] );
		$t = explode( '/', $t[1]);

		//formatage
		$name = $t[0];
		array_shift($t);
		$addr = implode('/', $t);

		//enlever paramettre
		$name = explode('?',$name)[0];

		//Si vide alors INDEX
		if( $name == '')
			$name = 'index';

		//Si contient un "." alors fichier INDEX
		if( strpos($name,'.') !== false)
		{
			$addr = $name;
			$name = 'index';
		}

		//Uddr, enlever le ?
		$addr = explode('?', $addr)[0];

		//Obj route
		return new Route( $name, $addr );
	}
}