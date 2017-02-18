<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

// Register orm

require '../vendor/autoload.php';
require '../src/require.php';
require '../generated-conf/config.php';

$app = new \Slim\App ();

// Error Handler-----------
$c = $app->getContainer ();
$c ['errorHandler'] = function ($c) {
	return new CustomHandler ();
};

$app->get ( '/hello/{name}', function (Request $request, Response $response) {
	$name = $request->getAttribute ( 'name' );
	$response->getBody ()->write ( "Hello, $name" );
	return $response;
} );

$app->group ( '/registro', function () use ($app) {
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
		$body->write ( $dao->getTipos ()->toJSON () );
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
		$dao->save ( $formulario ['data'] );
		return $res->withHeader ( 'Content-type', 'application/json' )->getBody ()->write ( json_encode ( $um->GetAll () ) );
	} );
} );

$app->group ( '/administrador', function () use ($app) {
	$app->get ( '/consultarClientes', function (Request $req, Response $res, $args) {
		$service = service::getInstance ();
		$rutine = $service->getRutina();
		$formulario = $req->getParsedBody ();
		$formulario= $formulario ['data'] ;
		$result= $rutine->findClientes( $formulario['fechaInicio'], $formulario['fechaFin']);
		if($result==null){
			//404
		}else{
			$dir= __DIR__ . '/ejemplo2.xls';
			$result->save($dir);
			$fh = fopen($dir, 'rb');
			$stream = new \Slim\Http\Stream($fh); // create a stream instance for the response body
			return $response->withHeader('Content-Type', 'application/force-download')
			->withHeader('Content-Type', 'application/vnd.ms-excel')
			->withHeader('Content-Disposition', 'attachment; filename="' . basename($dir) . '"')
			->withBody($stream); // all stream contents will be sent to the response
		}
	} );
});
	




$app->run ();