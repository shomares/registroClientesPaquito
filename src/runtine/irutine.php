<?php
use beans\beans\Cliente;
interface irutine {
	function findClientes($fechaInicio = null, $fechaFin = null);
}
class rutineExcel implements irutine {

	
	
	private $columnas = array (
			"id",
			"titulo",
			"nombre_tipo_asistente",
			"nombres",
			"paterno",
			"materno",
			"calle",
			"cp",
			"ciudad",
			"estado",
			"colonia",
			"telefono",
			"celular",
			"email",
			"empresa_institucion",
			"especialidad_cargo",
			"compartir_info",
			"costo_admision",
			"requiere_factura",
			"rfc",
			"nombres_facturacion",
			"direccion_facturacion",
			"cp_facturacion",
			"ciudad_facturacion",
			"estado_facturacion",
			"colonia_facturacion",
			"pais_facturacion",
			"telefono_facturacion",
			"email_facturacion",
			"comentarios",
			"fecha" 
	);
	function findClientes($fechaInicio = null, $fechaFin = null) {
		
		$service = service::getInstance ();
		$IDao= $service->getDaoService ();
		
		$consulta = $IDao->consultaClientes ( $fechaInicio, $fechaFin );
		if (sizeof ( $consulta ) > 0) {
			$objPHPExcel = new PHPExcel ();
			$objPHPExcel->setActiveSheetIndex ( 0 );
			$sheet = $objPHPExcel->getActiveSheet ();
			// Limpiar-------------------------
			$anterior = '';
			$variable = '';
			$column = 'A';
			$i = 1;
			// Columnas
			foreach ( $this->columnas as $columna ) {
				if ($column > 'Z') {
					if ($variable == '') {
						$variable = 'A';
					} else if ($variable > 'Z') {
						$variable = 'A';
					} else {
						$variable ++;
					}
					$column = 'A';
					$anterior = $anterior . $variable;
				}
				$sheet->setCellValue ( $anterior . $column . '1', $columna );
				$column ++;
				$i ++;
			}
			// Limpiar-------------------------
			$anterior = '';
			$variable = '';
			$column = 'A';
			$i = 1;
			// Datos
			foreach ( $consulta as $cliente) {
				if ($column > 'Z') {
					if ($variable == '') {
						$variable = 'A';
					} else if ($variable > 'Z') {
						$variable = 'A';
					} else {
						$variable ++;
					}
					$column = 'A';
					$anterior = $anterior . $variable;
				}
				$sheet->setCellValue ( $anterior . $column . $i, $cliente->getIdcliente () );
				$sheet->setCellValue ( $anterior . $column . $i, '' );
				$sheet->setCellValue ( $anterior . $column . $i, $cliente->getTipo ()->getNombre () );
				$sheet->setCellValue ( $anterior . $column . $i, $cliente->getNombre () );
				$sheet->setCellValue ( $anterior . $column . $i, $cliente->getApellidopaterno () );
				$sheet->setCellValue ( $anterior . $column . $i, $cliente->getApellidomaterno () );
				
				$direccion = $cliente->getDireccion ();
				$sheet->setCellValue ( $anterior . $column . $i, $direccion->getCalle () );
				$sheet->setCellValue ( $anterior . $column . $i, $direccion->getCp () );
				$sheet->setCellValue ( $anterior . $column . $i, '' );
				$sheet->setCellValue ( $anterior . $column . $i, $direccion->getEstado ()->getNombre () );
				$sheet->setCellValue ( $anterior . $column . $i, $direccion->getColonia () );
				$sheet->setCellValue ( $anterior . $column . $i, $cliente->getTelefono () );
				$sheet->setCellValue ( $anterior . $column . $i, $cliente->getCelular () );
				$sheet->setCellValue ( $anterior . $column . $i, $cliente->getEmail () );
				$sheet->setCellValue ( $anterior . $column . $i, $cliente->getInstitucion () );
				$sheet->setCellValue ( $anterior . $column . $i, '' );
				
				$sheet->setCellValue ( $anterior . $column . $i, $cliente->getCuestionario ()->getCompartir () );
				$sheet->setCellValue ( $anterior . $column . $i, '' );
				
				$sheet->setCellValue ( $anterior . $column . $i, $cliente->getFactura () == null );
				
				$factura = $cliente->getFactura ();
				
				if ($factura != null) {
					$sheet->setCellValue ( $anterior . $column . $i, $factura->getRfc () );
					$sheet->setCellValue ( $anterior . $column . $i, $factura->getNombre () );
					$direccion = $factura->getDireccion ();
					$sheet->setCellValue ( $anterior . $column . $i, $direccion->getCalle () );
					$sheet->setCellValue ( $anterior . $column . $i, $direccion->getCp () );
					$sheet->setCellValue ( $anterior . $column . $i, '' );
					
					$estado = $direccion->getEstado ();
					$sheet->setCellValue ( $anterior . $column . $i, $estado->getNombre () );
					$sheet->setCellValue ( $anterior . $column . $i, $direccion->getColonia () );
					$sheet->setCellValue ( $anterior . $column . $i, $estado->getPais ()->getNombre () );
					$sheet->setCellValue ( $anterior . $column . $i, $factura->getTelefono () );
					$sheet->setCellValue ( $anterior . $column . $i, $cliente->getEmail () );
					$sheet->setCellValue ( $anterior . $column . $i, '' );
					$sheet->setCellValue ( $anterior . $column . $i, '' );
				}
				$column ++;
				$i ++;
			}
			
			$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
			return 	$objWriter;
		}
		return null;
	}
}