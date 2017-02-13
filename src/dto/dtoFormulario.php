<?php
class dtoFormularioGeneral{
	public $nombre;
	public $apellidoPaterno;
	public $apellidoMaterno;
	public $email;
	public $calle;
	public $colonia;
	public $cp;
	public $estado;
	
}
class dtoFormularioCliente extends dtoFormularioGeneral{
	public $telConsultorio;
	public $celular;
	public $institucion;
	public $tipo;
	public $compartir;
	public $preCongreso;
	public $transCongreso;
	
	/**
	 * Contains the result of the dtoFactura
	 * @var dtoFactura
	 */
	public $dtoFactura; 
}
class dtoFactura extends dtoFormularioGeneral
{
	public $RFC;
	public  $telefono;
	public $noCuenta;
}


