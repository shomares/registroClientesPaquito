<?php
interface idao{
	function save($formulario);
	function getPaises();
	function getTipos();
	function getEstados($pais);
	
	function consultaClientes ($fechaInicio, $fechaFin);
}