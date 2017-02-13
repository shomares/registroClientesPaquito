<?php
use beans\beans\EstadoQuery;
use beans\beans\Pais;
use beans\beans\PaisQuery;
use beans\beans\Cliente;
use beans\beans\Cuestionario;
use beans\beans\Direccion;
use beans\beans\Factura;
class daoPropel implements idao {
	function save(dtoFormularioCliente $formulario) {
		$con = Propel::getWriteConnection ( ClienteTableMap::DATABASE_NAME );
		$con->beginTransaction ();
		try {
			$registro = new Cliente ();
			$registro->setApellidopaterno ( $formulario->apellidoPaterno );
			$registro->setApellidomaterno ( $formulario->apellidoMaterno );
			$registro->setNombre ( $formulario->nombre );
			$registro->setCelular ( $formulario->celular );
			$registro->setEmail ( $formulario->email );
			$registro->setInstitucion ( $formulario->institucion );
			
			$cuestionario = new Cuestionario ();
			$cuestionario->setConcursoprecongreso ( $formulario->preCongreso );
			$cuestionario->setConcursotrancongreso ( $formulario->transCongreso );
			$cuestionario->setCompartir ( $formulario->compartir );
			$cuestionario->save ( $con );
			
			$direccion = new Direccion ();
			$direccion->setCalle ( $formulario->calle );
			$direccion->setColonia ( $formulario->colonia );
			$direccion->setCp ( $formulario->cp );
			$direccion->setCalle ( $formulario->calle );
			$direccion->setEstado ( $formulario->estado );
			$direccion->save ( $con );
			
			if (isset ( $formulario->dtoFactura )) {
				$factura = new Factura ();
				$factura->setRfc ( $formulario->dtoFactura->RFC );
				$factura->setNombre ( $formulario->dtoFactura->nombre );
				$factura->setApellidopaterno ( $formulario->dtoFactura->apellidoPaterno );
				$factura->setApellidomaterno ( $formulario->dtoFactura->apellidoMaterno );
				$factura->setEmail ( $formulario->dtoFactura->email );
				$factura->setNocuenta ( $formulario->dtoFactura->noCuenta );
				$factura->setTelefono ( $formulario->dtoFactura->telefono );
				
				$direccionfac = new Direccion ();
				$direccionfac->setCalle ( $formulario->dtoFactura->calle );
				$direccionfac->setColonia ( $formulario->dtoFactura->colonia );
				$direccionfac->setCp ( $formulario->dtoFactura->cp );
				$direccionfac->setCalle ( $formulario->dtoFactura->calle );
				$direccionfac->setEstado ( $formulario->dtoFactura->estado );
				$direccionfac->save ( $con );
				$factura->setDireccionIddireccion ( $direccionfac->getIddireccion () );
				$registro->setFacturaIdfactura ( $factura->getIdfactura () );
			}
			$registro->setCuestionarioIdcuestionario ( $cuestionario->getIdcuestionario () );
			$registro->setDireccionIddireccion ( $direccion->getIddireccion () );
			$registro->save ( $con );
			$factura->save ( $con );
			$con->commit();
		} catch ( Exception $e ) {
			$con->rollback();
		}
	}
	function getPaises() {
		$salida = PaisQuery::create ()->limit ( 1000 )->find ();
		return $salida;
	}
	function getEstados($pais) {
		$salida = EstadoQuery::create ()->filterByPaisIdpais ( $pais )->find ();
		return $salida;
	}
}