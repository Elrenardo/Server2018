<?php
require 'vendor/autoload.php';

class base_pdo extends SRVG\Module
{

	static const $bdd = null;

	//Start fonction
	public function Start( $route, $config, $next )
	{

		//BDD connection
		try {
		    $dbh = new PDO('mysql:host=localhost;dbname=demo', 'root', '');
		} catch (PDOException $e) {
		    print "Erreur !: " . $e->getMessage() . "<br/>";
		    die();
		}

		//save BDD
		base_pdo::$bdd = $dbh;
				
		//ok
		$next->next();
	}
}