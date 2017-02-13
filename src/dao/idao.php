<?php
interface idao{
	function save(dtoFormularioCliente $formulario);
	function getPaises();
	function getEstados($pais);
}