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
		return new service();
	}   
	
	
	function getDaoService(){
		return new daoPropel();
		
	}
	
}