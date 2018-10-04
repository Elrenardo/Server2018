<?php


class base_cmdParse extends SRVG\Module
{

	const VAR_NAME_CMD = 'cmd';

	//Start fonction
	public function Start( $route, $config, $next )
	{
		//get commande via base security
		$cmd = base_security::$_ALLINPUT[ VAR_NAME_CMD ];

		//Création parsing commande
		$c = CmdInput( $cmd );
		//Add DATA
		$route->addData(VAR_NAME_CMD, $c );

		//ok
		$next->next();
	}
}



class CmdInput
{
	private $cmd = '';

	private $name = '';
	private $options = [];
	private $paras = '';

	//parsing de la commande
	function __construct( $cmd )
	{
		$this->cmd = $cmd;

		//couper la commande
		$p= explode(' ',$this->cmd);

		//verifier si une commande existe
		if(!isset($p[0]))
			return;

		//get nom commande
		$this->name = $p[0];

		//recherche option et paramettre
		$para = [];
		$nb = count($p);
		for( var $i=1; $i<$nb; $i++)
		{
			$b = $p[$i];
			//option ?
			if( $b[0] == '-')
				array_push( $this->options, substr($b));
			//sinon param
			else
				$paras .= $b;
		}
	}


	//renvoi le nom
	public function getName()
	{
		return $this->name;
	}

	//renvoi les options
	public function getOptions()
	{
		return $this->options;
	}

	//renvoi les paramettres
	public function getParameter()
	{
		return $this->paramettre;
	}
}