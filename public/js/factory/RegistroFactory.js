"use strict";
var RegistroFactory = function ($http) {
    return new RegistroService($http);
};
var RegistroService= function ($http) {
    this.$http = $http;
    this.onLoadPaises = new Eventos("onLoadPaises");
    this.onLoadEstadoFactura = new Eventos("onLoadEstadoFactura");

    this.onLoadEstado = new Eventos("onLoadEstado");
    this.onRegistra= new Eventos("onRegistra");
    this.onError= new Eventos("onError");
    this.onLoadTipo= new Eventos("onLoadTipo");
    
    this.Config = Settings.getInstance();
};
RegistroService.prototype = new ConEventos();
RegistroService.prototype.getPaises = function () {
    var root = this;
    root.$http.get(root.Config.rootURL + "/paises").success(function (response) {
        var salida = response;
        root.onLoadPaises.onEvent(response);
    }).error(function (args, status) {
        if (status === 401) {
            root.onError.onEvent("Ha expirado la sesión", function () {
                window.location.reload();
            });
        } else root.onError.onEvent(args, function () {
            //window.location.reload();
        });
    });
};
RegistroService.prototype.getEstados = function (idPais, factura) {
    var root = this;
    root.$http.get(root.Config.rootURL + "/estados/" + idPais).success(function (response) {
        var salida = response;
        if(factura==null ||factura==undefined  )
        	root.onLoadEstado.onEvent(response);
        else
        	root.onLoadEstadoFactura.onEvent(response);
    }).error(function (args, status) {
        if (status === 401) {
            root.onError.onEvent("Ha expirado la sesión", function () {
                //window.location.reload();
            });
        } else root.onError.onEvent(args, function () {
            //window.location.reload();
        });
    });
};

RegistroService.prototype.getTipos= function () {
    var root = this;
    root.$http.get(root.Config.rootURL + "/tipos").success(function (response) {
        var salida = response;
        root.onLoadTipo.onEvent(response);
    }).error(function (args, status) {
        if (status === 401) {
            root.onError.onEvent("Ha expirado la sesión", function () {
                //window.location.reload();
            });
        } else root.onError.onEvent(args, function () {
            //window.location.reload();
        });
    });
};
RegistroService.prototype.onLoadEstadoFactura= function(idPais){
	  root.$http.get(root.Config.rootURL + "/estados/" + idPais).success(function (response) {
	        var salida = response;
	        root.onLoadEstadoFactura.onEvent(response);
	    }).error(function (args, status) {
	        if (status === 401) {
	            root.onError.onEvent("Ha expirado la sesión", function () {
	                window.location.reload();
	            });
	        } else root.onError.onEvent(args, function () {
	            //window.location.reload();
	        });
	    });
};

RegistroService.prototype.register= function(registro){
    var root = this;
    root.$http.post(root.Config.rootURL + "/register", {data: registro}).success(function (response) {
        var salida = response;
        root.onRegistra.onEvent(response);
    }).error(function (args, status) {
        if (status === 401) {
            root.onError.onEvent("Ha expirado la sesión", function () {
                //window.location.reload();
            });
        } else root.onError.onEvent(args, function () {
            //window.location.reload();
        });
    });
};



RegistroService.$inject = ['$http'];