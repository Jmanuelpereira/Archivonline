<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
<script language="javascript">

// Guardamos el nombre del navegador utilizado
var navegador = navigator.appName;

/* Definimos el valor de la variable booleana que nos permite mostrar u 
ocultar el mensaje de alerta una vez que el texto es copiado al portapapeles */
var mensaje = true; // Valores posibles: true (se muestra), false (se oculta)

// Creamos la función para escribir el enlace que ejecuta el copiado
function compatible () {

	// Si el navegador es IE se ejecuta
	if (navegador == "Microsoft Internet Explorer") {
		//Escribimos el enlace en el objeto ID portapapeles
		document.getElementById('portapapeles').innerHTML = '<a href="javascript:void(0)"'+
		'onclick="copiaPortapapeles()"> Copiar texto al portapapeles </a>';
	}
	
	// De otra manera no escribimos nada
	else {
	}

} // Fin de la función compatible()

// Creamos la función para copiar el texto al portapapeles
function copiaPortapapeles () {

	// Seleccionamos el texto que vamos a copiar
	document.getElementById("texto").select();
	// Copiamos el texto al portapapeles de windows
	window.clipboardData.setData("Text", document.getElementById("texto").value);
	// Si mensaje es true se ejecuta
	if (mensaje) {
		// Mostramos el mensaje de alerta
		alert('Texto copiado al portapapeles!!!');
	}

} // Fin de la función copiaPortapapeles()

// Ejecutamos la función a la carga de la página
window.onload = compatible;

</script>
</head>



<!-- Creamos un objeto DIV para escribir el enlace que nos permite copiar 
el texto al portapapeles. -->
<DIV id="portapapeles"></DIV>


<P>
<!-- Creamos un cuadro, el cual tendrá el texto que vamos a copiar. -->
<input type="button" onclick="document.write('<p>Una alerta por escrito</p>');" />
</P>




</div>
</body>
</html>