<?php
require 'vendor/autoload.php';

class base_pdo extends SRVG\Module
{

	private static $pdo = null;

	//Start fonction
	public function Start( $route, $config, $next )
	{	
		//ok
		$next->next();
	}


	public static function get()
	{
		return $this->pdo;
	}
}


//Class Auto Gestion BDD
class PdoBdd
{
	static $datatable = 'contain_paranormal';
	static $user      = 'root';
	static $pass      = '';

	//storage BDD
	private static $bdd = null;

	//connection
	private static function connect()
	{
		//BDD connection
		try {
		    $dbh = new PDO('mysql:host=localhost;dbname='.PdoBdd::$datatable, PdoBdd::$user, PdoBdd::$pass);
		} catch (PDOException $e) {
		    print "Erreur !: " . $e->getMessage() . "<br/>";
		    die();
		}

		//save
		PdoBdd::$bdd = $dbh;
	}


	//get BDD
	public static function get()
	{
		if(is_null(PdoBdd::$bdd))
			PdoBdd::connect();
		return PdoBdd::$bdd;
	}
}