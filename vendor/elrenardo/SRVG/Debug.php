<?php
/**
 * @author    Teysseire Guillaume
 * @version   1.0
 * @date      30/07/2018
 * @update    30/07/2018
 * @brief     SRVG/Debug debug class
 */

namespace SRVG;
class Debug
{

	public static function var_dump( $var )
	{
		print '<pre>';
		var_dump($var);
		print '</pre>';
	}
}