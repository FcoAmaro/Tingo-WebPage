<!-- ?php
if(empty($_POST['name'])      ||
   empty($_POST['email'])	  ||
   empty($_POST['message'])   ||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
   echo "Argumentos no provistos!";
   return false;
   }
   
$name = strip_tags(htmlspecialchars($_POST['name']));
$email_address = strip_tags(htmlspecialchars($_POST['email']));
$message = strip_tags(htmlspecialchars($_POST['message']));
   
// Create the email and send the message
$to = 'cisc.amaro@gmail.com'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
$email_subject = "Website Contact Form:  $name";
$email_body = "Ha recibido un nuevo mensaje a su sitio web\n\n"."Detalles:\n\nNombre: $name\n\nEmail: $email_address\n\nMensaje:\n$message";
$headers = "From: noresponder@tingoid.com\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
$headers .= "Reply-To: $email_address";   
mail($to,$email_subject,$email_body,$headers);
return true;         
?> -->

<?php
	$nombre = $_POST["name"];
	$correo = $_POST["email"];
	$consulta = $_POST["message"];
	$header = 'From: ' . $correo . " \r\n";
	$header .= "X-Mailer: PHP/" . phpversion() . " \r\n";
	$header .= "Mime-Version: 1.0 \r\n";
	$header .= "Content-Type: text/plain";
	$mensaje = "Mensaje enviado por " . $nombre . " \r\n";
	$mensaje .= "Su e-mail es: " . $correo . " \r\n";
	$mensaje .= "Mensaje: " . $consulta . " \r\n";
	$mensaje .= "Enviado el " . date('d/m/Y', time());
	$para = "cisc.amaro@gmail.com";
	$asunto = "Contacto desde formulario tingoid.cl";
	$estado = mail($para, $asunto, utf8_decode($mensaje), $header);

	return $estado;
	
	
?>