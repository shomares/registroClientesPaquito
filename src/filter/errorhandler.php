<?php
class CustomHandler {
   public function __invoke($request, $response, $args) {
        return $response
            ->withStatus(500)
            ->withHeader('Content-Type', 'application/json')
            ->write("{'Message': 'Error no controlado'}");
   }
}
