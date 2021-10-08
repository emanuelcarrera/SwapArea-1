<?php
require("connection.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

include_once "login.php";

$mailLaboral = $_POST["mailLaboral"]; 

$sqlvaluser = ("SELECT * FROM usuarios WHERE (Mail = '$mailLaboral')");
$result = $conexion->query($sqlvaluser);


$row = mysqli_fetch_array($result);
$existe = mysqli_num_rows($result);
$passUser = md5($row['Contrasenia']);

if ($existe>0) {

//Crea una nueva instancia de mail
$mail = new PHPMailer(true);

try {

	$mail->SMTPDebug = 0;                    
    $mail->isSMTP();                                            //Envia mail usando SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Servidor SMTP de la casilla de mail desde donde se va a enviar el correo
    $mail->SMTPAuth   = true;                                   //Habilita autenticación SMTP
    $mail->Username   = 'swaparea21@gmail.com';                     //Casilla de email desde donde se va a enviar el correo
    $mail->Password   = 'EmaFacu21';                               //Contraseña de la casilla de mail
    //$mail->SMTPSecure = 'tls';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            
    $mail->Port       = 465;                                    //Puerto TCP por el cual se realiza la conexión



    

    //Destinatarios del mail
    $mail->setFrom('swaparea21@gmail.com', 'SwapArea'); //Casilla desde donde se enviará el email
    $mail->addAddress($mailLaboral);     //Casilla Destino a la que se enviará el email
    //$mail->addReplyTo('info@example.com', 'Information');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    //Adjuntos
    //$mail->addAttachment('/var/tmp/file.tar.gz');        
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');   

    //Content
    $mail->isHTML(true);                                  
	$mail->CharSet = 'UTF-8';
    $mail->Subject = "SwapArea Recupero de contraseña"; 
    $mail->Body    = "Estimado usuario, recibimos su solicitud para recuperar su contraseña de acceso a SwapArea. A continuación, le compartimos su contraseña para ingresar al sistema: <b>$passUser</b>";
    //$mail->AltBody = 'este es el cuerpo para enviar mails en formato plano no HTML';

    $mail->send(); 
	
	
	?>
	
						<script>
						$("#container").hide();
						$("#forgotten-container").fadeIn();
						</script>
	
						<script>
						document.getElementById("msjError").innerHTML = '<div id="valdat" class="alert alert-success alert-dismissible fade show" role="alert"><b>Mail enviado!</b> Verifique su correo para recuperar su contraseña.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>'; 
						</script>
						
						<script>
						setTimeout(function() {
												$('#msjError').fadeOut('fast');
											  }, 10000); // <-- time in milliseconds
						</script>
										
				<?php
				
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

    } else {  ?>
			  
						<script>
						$("#container").hide();
						$("#forgotten-container").fadeIn();
						</script>
						
						<script>
						document.getElementById("msjError").innerHTML = '<div class="alert alert-danger alert-dismissible fade show" role="alert"><b>Error!</b> El email ingresado no existe<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>'; 
						</script> 
						
						<script>
						setTimeout(function() {
												$('#msjError').fadeOut('fast');
											  }, 10000); // <-- time in milliseconds
						</script>						
						
						
						<?php } 

?>