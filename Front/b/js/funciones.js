addEventListener('load',inicializarEventos,false);

function inicializarEventos()
{
  cargarPagina('pagina2.php'); 
}

function presionEnlace(e)
{
  e.preventDefault();
  var url=e.target.getAttribute('href');
  cargarPagina(url);     
}


var conexion1;
function cargarPagina(url) 
{
  if(url=='')
  {
    return;
  }
  conexion1=new XMLHttpRequest();
  conexion1.onreadystatechange = procesarEventos;
  conexion1.open("GET", url, true);
  conexion1.send(null);
}

function procesarEventos()
{
  var detalles = document.getElementById("detalles");
  if(conexion1.readyState == 4)
  {
    detalles.innerHTML = conexion1.responseText;
    var ob1=document.getElementById('sig');
    if (ob1!=null)
      ob1.addEventListener('click',presionEnlace,false);
    var ob2=document.getElementById('ant');
    if (ob2!=null)
      ob2.addEventListener('click',presionEnlace,false);
  } 
  else 
  {
    detalles.innerHTML = '<img src="../cargando.gif">';
  }
}


//Muestra un error en la pantalla y vuleve a mostrar el boton de enviar
function ShowError(tx){
	$('#res').addClass('fail');
	$('#res').html(tx);
	$('#load').hide();
	$('#send').show();
}

//Validar email
function ValEmail(mail) {
	var reglas = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
	return reglas.test(mail);
}
	
$('#fc').submit(function(e){
	//Ocultamos el boton de enviar y mostramos el icono animado
	$('#send').hide();
	$('#load').show();
		
	//Prevenir evento por defecto
	e.preventDefault();
	
	//Validando datos
	//Esto solo es una prevalidacion ya que los datos seran validados correctamente en el servidor		
	if($('#name').val().length < 5){//Nombre
		ShowError('El nombre debe tener al menos 5 caracteres.'); 
		return;
	}
	if(!ValEmail($('#mail').val())){//Correo
		ShowError('El correo electronico no es valido.'); 
		return;
	}
	if($('#msj').val().length < 10){//Correo
		ShowError('El mensaje debe tener al menos 20 caracteres.'); 
		return;
	}
	
	$.ajax({
		type: 'POST',
		url: $(this).attr('action'),
		data: $(this).serialize(),
		timeout: 10000,//tiempo maximo de espera 10s
		
		//Funcion al recibir respuesta
		success: function(data){	
			console.info(data);
			//Decodificamos el mensaje en formto json
			var r = JSON.parse(data);
			
			if(r.status=="1")
				//Mensaje enviado y proceaado con exito
				$('#fc').html('<center>El mensaje ha sido enviado</center>');
			else 
				//Mostrando el mensaje de error devuelto por el servidor
				ShowError(r.msj);
		},
		
		//funcion que maneja errores al enviar
		error: function (xhr, ajaxOptions, thrownError){
			console.info(xhr.status);
			if(thrownError=='timeout') 
				ShowError('Tiempo de espera superado'); 
			else 
				ShowError('Se ha producido un error');
		}
	})
});
