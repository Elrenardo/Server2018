<?php
/**
 * @author    Teysseire Guillaume
 * @version   1.0
 * @date      26/05/2018
 * @update    26/05/2018
 * @brief     SRVG/Module pattern pour les modules a extends
 */

namespace SRVG;
class Module
{

	/**
	* @brief path du fichier php à charger
	* @param $param = SRVG/Param
	* @return SRVG/Param
	*/
	public function Start( $param, $config, $next )
	{
		//next module
		$next->next();
	}
}