<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./estiloCalculadora.css">
    <title>Calculadora</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- Incluye jQuery -->
</head>
<body>
<?php
include_once 'menu.php';
?>
    <h1>Calculadora</h1>
    <input type="number" id="valor" placeholder="Introduce un número">

    <div class="contenedor">
        <div id="suma">+</div>
        <div id="resta">-</div>
        <div id="multiplicacion">x</div>
        <div id="igual">=</div>
    </div>

    <p id="resultado"></p>
    <ul id="listacarrito"></ul> <!-- Cambié de div a ul para la lista -->

    <script>
        /* -- CALCULADORA SIMPLE CON CARRITO --
        $(document).ready(function() {
            var valor1 = null;
            var operacion = null;
            var resultado = null;
            var carrito = [];

            $('#suma, #resta, #multiplicacion').on('click', function() {
                if (resultado !== null) { 
                    valor1 = resultado; 
                } else {
                    valor1 = parseFloat($('#valor').val());
                }
                operacion = this.id; // Guardar la operación
                $('#valor').val(''); // Limpiar el input para el siguiente valor
            });

            $('#igual').on('click', function() {
                let valor2 = parseFloat($('#valor').val());

                // Realizar operación
                if (operacion === 'suma') {
                    resultado = valor1 + valor2;
                } else if (operacion === 'resta') {
                    resultado = valor1 - valor2;
                } else if (operacion === 'multiplicacion') {
                    resultado = valor1 * valor2;
                }

                $('#resultado').val(resultado); // Mostrar el resultado

                // Crear la descripción de la operación
                let nombreOperacion = `La operación ${valor1} ${operacion === 'suma' ? '+' : operacion === 'resta' ? '-' : 'x'} ${valor2} = ${resultado}`;
                carrito.push({ operacion: nombreOperacion });

                // Actualizar la lista
                var listaCarrito = $('#listacarrito');
                listaCarrito.empty(); // Limpiar lista
                carrito.forEach(function(ValoresArray){
                    listaCarrito.append('<li>' + ValoresArray.operacion + '</li>');
                });
            });
        });
*/

$(document).ready(function(){
    let valorOperacion = [];

    $('.contenedor').on('click',function(){
        let valorActual = parseFloat($('#valor').val());
        if(this.id==='igual' && valorOperacion.length>0){
            if(!isNaN(valorActual)) valorOperacion.push(valorActual);

            let cadena = valorOperacion.join('');
            let resultado = eval(cadena);

            $('#resultado').text(`Resultado ${resultado}`).show();
            $('#valor').val('');
            valorOperacion.length=0;
        }else if (!isNaN(valorActual)){
            valorOperacion.push(valorActual);
            let operador = (this.id==='suma') ? '+':
            (this.id==='resta') ? '-':'*';
            valorOperacion.push(operador);
            $('#valor').val('');
        }
        else{
            alert('Introduce un valor antes de selecciconar una operación');
        }
    });
})


    </script>
<!-- Code injected by live-server -->
<script>
	// <![CDATA[  <-- For SVG support
	if ('WebSocket' in window) {
		(function () {
			function refreshCSS() {
				var sheets = [].slice.call(document.getElementsByTagName("link"));
				var head = document.getElementsByTagName("head")[0];
				for (var i = 0; i < sheets.length; ++i) {
					var elem = sheets[i];
					var parent = elem.parentElement || head;
					parent.removeChild(elem);
					var rel = elem.rel;
					if (elem.href && typeof rel != "string" || rel.length == 0 || rel.toLowerCase() == "stylesheet") {
						var url = elem.href.replace(/(&|\?)_cacheOverride=\d+/, '');
						elem.href = url + (url.indexOf('?') >= 0 ? '&' : '?') + '_cacheOverride=' + (new Date().valueOf());
					}
					parent.appendChild(elem);
				}
			}
			var protocol = window.location.protocol === 'http:' ? 'ws://' : 'wss://';
			var address = protocol + window.location.host + window.location.pathname + '/ws';
			var socket = new WebSocket(address);
			socket.onmessage = function (msg) {
				if (msg.data == 'reload') window.location.reload();
				else if (msg.data == 'refreshcss') refreshCSS();
			};
			if (sessionStorage && !sessionStorage.getItem('IsThisFirstTime_Log_From_LiveServer')) {
				console.log('Live reload enabled.');
				sessionStorage.setItem('IsThisFirstTime_Log_From_LiveServer', true);
			}
		})();
	}
	else {
		console.error('Upgrade your browser. This Browser is NOT supported WebSocket for Live-Reloading.');
	}
	// ]]>
</script>
</body>
</html>
