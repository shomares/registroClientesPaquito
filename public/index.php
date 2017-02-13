<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require '../vendor/autoload.php';

$app = new \Slim\App ();
$app->get ( '/hello/{name}', function (Request $request, Response $response) {
	$name = $request->getAttribute ( 'name' );
	$response->getBody ()->write ( "Hello, $name" );
	return $response;
} );

$app->get ( '/paises', function ($req, $res, $args) {
	$service = service::getInstance ();
	$dao = $service->getDaoService ();
	return $res->withHeader ( 'Content-type', 'application/json' )->getBody ()->write ( json_encode ( $dao->getPaises () ) );
} );

$app->get ( '/estados/{pais}', function (Request $request, Response $response) {
	$pais = $request->getAttribute ( 'pais' );
	$service = service::getInstance ();
	$dao = $service->getDaoService ();
	return $res->withHeader ( 'Content-type', 'application/json' )
	->getBody ()
	->write ( json_encode ( $dao->getEstados ( pais ) ) );
} );

$app->post ( '/register', function ($req, $res, $args) {
	$service = service::getInstance ();
	$dao = $service->getDaoService ();
	$formulario = $req->getParsedBody ();
	$dao->save ( $formulario );
	return $res->withHeader ( 'Content-type', 'application/json' )
	->getBody ()->
	write ( json_encode ( $um->GetAll () ) );
} );
$app->run ();