<?php
use beans\beans\EstadoQuery;
use beans\beans\Pais;
use beans\beans\PaisQuery;
use beans\beans\Cliente;
use beans\beans\Cuestionario;
use beans\beans\Direccion;
use beans\beans\Factura;
use beans\beans\TipoQuery;
use Propel\Runtime\Propel;
use beans\beans\Map\ClienteTableMap;
use beans\beans\ClienteQuery;
use Propel\Runtime\ActiveQuery\Criteria;
class daoPropel implements idao {
	
	function save($formulario) {
		$con = Propel::getWriteConnection ( ClienteTableMap::DATABASE_NAME );
		// $con = Propel::getWriteConnection ( ClienteTableMap::DATABASE_NAME );
		$con->beginTransaction ();
		try {
			$registro = new Cliente ();
			$registro->setApellidopaterno ( $formulario ['apellidoPaterno'] );
			$registro->setApellidomaterno ( $formulario ['apellidoMaterno'] );
			$registro->setNombre ( $formulario ['nombre'] );
			$registro->setCelular ( $formulario ['celular'] );
			$registro->setTelefono($formulario ['telConsultorio']);
			$registro->setEmail ( $formulario ['email'] );
			$registro->setInstitucion ( $formulario ['institucion'] );
			
			$cuestionario = new Cuestionario ();
			$cuestionario->setConcursoprecongreso ( $formulario ['preCongreso'] );
			$cuestionario->setConcursotrancongreso ( $formulario ['transCongreso'] );
			
			if ($formulario ['compartir'] == "true") {
				$cuestionario->setCompartir ( true );
			} else {
				$cuestionario->setCompartir ( false );
			}
			
			$cuestionario->save ( $con );
			
			$direccion = new Direccion ();
			$direccion->setCalle ( $formulario ['calle'] );
			$direccion->setColonia ( $formulario ['colonia'] );
			$direccion->setCp ( $formulario ['cp'] );
			$direccion->setCalle ( $formulario ['calle'] );
			$direccion->setEstadoIdestado($formulario ['estado'] );
			$direccion->save ( $con );
			
			$daoFactura = $formulario ['dtoFactura'];
			
			if ($daoFactura != null) {
				$factura = new Factura ();
				$factura->setRfc ( $daoFactura ['rfc'] );
				$factura->setNombre ( $daoFactura ['nombre'] );
				$factura->setApellidopaterno ( $daoFactura ['apellidoPaterno'] );
				$factura->setApellidomaterno ( $daoFactura ['apellidoMaterno'] );
				$factura->setEmail ( $daoFactura ['email'] );
				$factura->setNocuenta ( $daoFactura ['noCuenta'] );
				$factura->setTelefono ( $daoFactura ['telefono'] );
				
				$direccionfac = new Direccion ();
				$direccionfac->setCalle ( $daoFactura ['dtoFactura'] );
				$direccionfac->setColonia ( $daoFactura ['colonia'] );
				$direccionfac->setCp ( $daoFactura ['cp'] );
				$direccionfac->setCalle ( $daoFactura ['calle'] );
				$direccionfac->setEstadoIdestado( $daoFactura ['estado'] );
				$direccionfac->save ( $con );
				$factura->setDireccionIddireccion ( $direccionfac->getIddireccion () );
				$factura->save ( $con );
				$registro->setFacturaIdfactura ( $factura->getIdfactura () );
			}
			$registro->setCuestionarioIdcuestionario ( $cuestionario->getIdcuestionario () );
			$registro->setDireccionIddireccion ( $direccion->getIddireccion () );
			$registro->setTipoIdtipo($formulario['tipo']);
			$registro->save ( $con );
			$con->commit ();
		} catch ( Exception $e ) {
			$con->rollback ();
			throw  $e;
		}
	}
	function getPaises() {
		$salida = PaisQuery::create ()->limit ( 1000 )->find ();
		return $salida;
	}
	function getTipos() {
		$salida = TipoQuery::create ()->limit ( 1000 )->find ();
		return $salida;
	}
	function getEstados($pais) {
		$salida = EstadoQuery::create ()->filterByPaisIdpais ( $pais )->find ();
		return $salida;
	}
	
	
	/*
	 * 
	 * 
	 */
	
	function consultaClientes ($fechaInicio, $fechaFin){
		$c =  new Criteria();
		if($fechaInicio!=null){
			$c->add("fechaRegistro", $fechaInicio, Criteria::GREATER_EQUAL);
		}
		if($fechaFin!=null){
			$c->add("fechaRegistro", $fechaInicio, Criteria::LESS_EQUAL);
		}
		$query= ClienteQuery::create($c)
		->joinWithCuestionario()
		->joinWithDireccion()
		->joinWithFactura()
		->joinWithTipo()->find();
		return $query;
	}
	
	
}