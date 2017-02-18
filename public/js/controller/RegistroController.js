﻿"use strict";
var RegistroController = function($scope, RegistroFactory) {
	$scope.logoInformacion = "<div style='display:inline-block; width:100%; overflow:hidden'><svg style='float:left; margin-right:10px; margin-left:10px; margin-top:-12px' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' version='1.1' baseProfile='full' width='50' height='50' viewBox='0 0 76.00 76.00' enable-background='new 0 0 76.00 76.00' xml:space='preserve'><path fill='#1075BC' fill-opacity='1' stroke-width='0.2' stroke-linejoin='round' d='M 38,19C 48.4934,19 57,27.5066 57,38C 57,48.4934 48.4934,57 38,57C 27.5066,57 19,48.4934 19,38C 19,27.5066 27.5066,19 38,19 Z M 33.25,33.25L 33.25,36.4167L 36.4166,36.4167L 36.4166,47.5L 33.25,47.5L 33.25,50.6667L 44.3333,50.6667L 44.3333,47.5L 41.1666,47.5L 41.1666,36.4167L 41.1666,33.25L 33.25,33.25 Z M 38.7917,25.3333C 37.48,25.3333 36.4167,26.3967 36.4167,27.7083C 36.4167,29.02 37.48,30.0833 38.7917,30.0833C 40.1033,30.0833 41.1667,29.02 41.1667,27.7083C 41.1667,26.3967 40.1033,25.3333 38.7917,25.3333 Z '/></svg>";
	$scope.logoError = "<div style='display:inline-block; width:100%; overflow:hidden'><svg style='float:left; margin-right:10px; margin-left:10px; margin-top:-12px' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' version='1.1' baseProfile='full' width='50' height='50' viewBox='0 0 76.00 76.00' enable-background='new 0 0 76.00 76.00' xml:space='preserve'><path fill='#E51616' fill-opacity='1' stroke-width='0.2' stroke-linejoin='round' d='M 31.6667,19L 44.3333,19L 57,31.6667L 57,44.3333L 44.3333,57L 31.6667,57L 19,44.3333L 19,31.6667L 31.6667,19 Z M 26.4762,45.0454L 30.9546,49.5238L 38,42.4783L 45.0454,49.5238L 49.5237,45.0454L 42.4783,38L 49.5238,30.9546L 45.0454,26.4763L 38,33.5217L 30.9546,26.4762L 26.4762,30.9546L 33.5217,38L 26.4762,45.0454 Z '/></svg>";
	$scope.logoSuccess = "<div style='display:inline-block; width:100%; overflow:hidden'><svg style='float:left; margin-right:10px; margin-left:10px; margin-top:-12px' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' version='1.1' baseProfile='full' width='50' height='50' viewBox='0 0 76.00 76.00' enable-background='new 0 0 76.00 76.00' xml:space='preserve'><path fill='#00B300' fill-opacity='1' stroke-width='0.2' stroke-linejoin='round' d='M 23.7501,33.25L 34.8334,44.3333L 52.2499,22.1668L 56.9999,26.9168L 34.8334,53.8333L 19.0001,38L 23.7501,33.25 Z '/></svg>";

	$scope.data = {
		dtoFactura : null
	};

	$scope.displayLoading = {
		'display' : 'block'
	};

	$scope.displayNecesitar = {
		'display' : 'none'
	};

	$scope.necesitar = function() {
		if ($scope.necesitarFactura === "true") {
			$scope.displayNecesitar = {
				'display' : 'block'
			};
			$scope.required = true;
		} else {
			$scope.displayNecesitar = {
				'display' : 'none'
			};
			$scope.required = false;
		}

	};

	RegistroFactory.addManejadorEventos("onLoadTipo", function(args) {
		$scope.tipos = args.Tipos;
		RegistroFactory.getPaises();
	});

	RegistroFactory.addManejadorEventos("onLoadPaises", function(args) {
		$scope.paises = args.Paiss;
		$scope.displayLoading = {
			'display' : 'none'
		};
	});

	RegistroFactory.addManejadorEventos("onLoadEstado", function(args) {
		$scope.estados = args.Estados;
		$scope.displayLoading = {
			'display' : 'none'
		};
	});

	RegistroFactory.addManejadorEventos("onLoadEstadoFactura", function(args) {
		$scope.estadosFactura = args.Estados;
		$scope.displayLoading = {
			'display' : 'none'
		};
	});

	RegistroFactory.addManejadorEventos("onError", function(args, func) {
		$scope.End = true;
		$scope.displayLoading = {
			'display' : 'none'
		};
		if (args !== undefined && args !== null) {
			if (args.notificacion !== undefined
					&& (typeof args.notificacion) === "string") {
				alertify.alert($scope.logoError + "<p style='font-size:large'>"
						+ args.notificacion + "</p></div>", function() {
					if (func !== null && func !== undefined) {
						if ((typeof func) === "function")
							func();
					}
				});
			} else if (args.Notificacion !== undefined
					&& (typeof args.Notificacion) === "string") {
				alertify.alert($scope.logoError + "<p style='font-size:large'>"
						+ args.Notificacion + "</p></div>", function() {
					if (func !== null && func !== undefined) {
						if ((typeof func) === "function")
							func();
					}
				});
			} else if (args.Message !== undefined
					&& (typeof args.Message) === "string") {
				alertify.alert($scope.logoError + "<p style='font-size:large'>"
						+ args.Message + "</p></div>", function() {
					if (func !== null && func !== undefined) {
						if ((typeof func) === "function")
							func();
					}
				});
			} else if (args.message !== undefined
					&& (typeof args.message) === "string") {
				alertify.alert($scope.logoError + "<p style='font-size:large'>"
						+ args.message + "</p></div>", function() {
					if (func !== null && func !== undefined) {
						if ((typeof func) === "function")
							func();
					}
				});
			} else if ((typeof args) === "string") {
				alertify.alert($scope.logoError + "<p style='font-size:large'>"
						+ args + "</p></div>", function() {
					if (func !== null && func !== undefined) {
						if ((typeof func) === "function")
							func();
					}
				});
			} else
				alertify.alert($scope.logoError
						+ "<p style='font-size:large'>Error Interno</p></div>",
						function() {
							if (func !== null && func !== undefined) {
								if ((typeof func) === "function")
									func();
							}
						});
		} else
			alertify.alert($scope.logoError
					+ "<p style='font-size:large'>Error Interno</p></div>",
					function() {
						if (func !== null && func !== undefined) {
							if ((typeof func) === "function")
								func();
						}
					});
	});
	RegistroFactory.addManejadorEventos("onRegistra",function(args) {
		alertify.alert($scope.logoInformacion+ "<p style='font-size:large'>Se ha realizado correctamente el registro</p></div>", function(){
			window.location.reload();
		});
	});

	$scope.registrar = function() {
		if ($scope.necesitarFactura === "false")
			$scope.data.dtoFactura = null;
		RegistroFactory.register($scope.data);
	};
	$scope.loadEstado = function() {
		$scope.displayLoading = {
			'display' : 'block'
		};
		RegistroFactory.getEstados($scope.data.pais);
	};
	$scope.loadEstadoFactura = function() {
		$scope.displayLoading = {
			'display' : 'block'
		};
		RegistroFactory.getEstados($scope.data.dtoFactura.pais, true);
	};

	RegistroFactory.getTipos();
};
RegistroController.$inject = [ '$scope', 'RegistroFactory' ];
root.factory('RegistroFactory', RegistroFactory);
root.controller('RegistroController', RegistroController);
