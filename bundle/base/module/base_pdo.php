<?php
require 'vendor/autoload.php';

class base_pdo extends SRVG\Module
{

	static $pdo = null;

	//Start fonction
	public function Start( $route, $config, $next )
	{

		$bdd  = 'contain_paranormal';
		$user = 'root';
		$pass = '';

		//BDD connection
		try {
		    $dbh = new PDO('mysql:host=localhost;dbname='.$bdd, $user, $pass);
		} catch (PDOException $e) {
		    print "Erreur !: " . $e->getMessage() . "<br/>";
		    die();
		}

		//save BDD
		base_pdo::$pdo = $dbh;
		$route->addData('pdo',$dbh);
				
		//ok
		$next->next();
	}
}