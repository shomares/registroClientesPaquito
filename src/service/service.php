<?php

class service{
	/**
	 * Contains the result of the dtoFactura
	 * @var idao
	 */
	private $daoService;
	
	/**
	 * Contains the result of the dtoFactura
	 * @var service
	 */
	private  static  $service;

	private function __construct(){
	}
	static function getInstance(){
		if($service==null)
			$service= new service();
		return $service;
	}   
	
	
	function getDaoService(){
		if($daoService==null)
			$daoService= new daoPropel();
		return $daoService; 
		
	}
	
}