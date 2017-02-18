<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

// Register orm

require '../vendor/autoload.php';
require '../src/require.php';
require '../generated-conf/config.php';

$app = new \Slim\App ();


//Error Handler-----------
$c = $app->getContainer();
$c['errorHandler'] = function ($c) {
	return new CustomHandler();
};



$app->get ( '/hello/{name}', function (Request $request, Response $response) {
	$name = $request->getAttribute ( 'name' );
	$response->getBody ()->write ( "Hello, $name" );
	return $response;
} );

$app->get ( '/paises', function ($req, $res, $args) {
	
	$service = service::getInstance ();
	$dao = $service->getDaoService ();
	$body = $res->getBody ();
	$body->write ( $dao->getPaises ()->toJSON () );
	return $res->withHeader ( 'Content-type', 'application/json' )->withBody ( $body );
} );

$app->get ( '/tipos', function ($req, $res, $args) {
	$service = service::getInstance ();
	$dao = $service->getDaoService ();
	$body = $res->getBody ();
	$body->write ( $dao->getTipos()->toJSON () );
	return $res->withHeader ( 'Content-type', 'application/json' )->withBody ( $body );
} );

$app->get ( '/estados/{pais}', function (Request $request, Response $response) {
	$pais = $request->getAttribute ( 'pais' );
	$service = service::getInstance ();
	$dao = $service->getDaoService ();
	$body = $response->getBody ();
	$body->write ( $dao->getEstados ( $pais )->toJSON () );
	return $response->withHeader ( 'Content-type', 'application/json' )->withBody ( $body );
} );

$app->post ( '/register', function (Request $req, Response $res, $args) {
	$service = service::getInstance ();
	$dao = $service->getDaoService ();
	$formulario = $req->getParsedBody ();
	$dao->save ( $formulario['data'] );
	return $res->withHeader ( 'Content-type', 'application/json' )->getBody ()->write ( json_encode ( $um->GetAll () ) );
} );




$app->run ();