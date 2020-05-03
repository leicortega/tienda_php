<?php

require('conexion.php');
require '..//PHPMailer/PHPMailerAutoload.php';

$mail = new PHPMailer;
session_start();

extract($_REQUEST);

$conexion = conexion();

$sql = $conexion->prepare('SELECT * from correos where id = :id');
$sql->bindParam(':id', $_REQUEST['id']);
$sql->execute();

$count = $sql->rowCount();

if ($count == 1) {
    $datos = $sql->fetchAll();

    $men = $_REQUEST['respuesta'];

	$mail->isSMTP();                                      // Set mailer to use SMTP
	$mail->Host = 'smtp.gmail.com';                       // Specify main and backup SMTP servers
	$mail->SMTPAuth = true;                               // Enable SMTP authentication
	$mail->Username = 'nextdvp@gmail.com';                // SMTP username
	$mail->Password = '2431*+Next-Dev';                   // SMTP password
	$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 465;                                    // TCP port to connect to
    
    $mail->isHTML(true);

	$mail->setFrom('nextdvp@gmail.com', 'nextdvp@gmail.com');
	$mail->addAddress($datos[0][3], $datos[0][1]);     

	$mail->Subject = 'Respuesta al Asunto: '.$datos[0][4];
	$mail->Body    = $men;

	if(!$mail->send()) {
	    echo 'Error del mensaje: ' . $mail->ErrorInfo;
	} else {
        $sql_update = $conexion->prepare('UPDATE correos set respuesta = :respuesta, responsable = :responsable where id = :id');
        $sql_update->bindParam(':respuesta', $_REQUEST['respuesta']);
        $sql_update->bindParam(':responsable', $_SESSION['user']);
        $sql_update->bindParam(':id', $_REQUEST['id']);
        $sql_update->execute();

        $count_update = $sql_update->rowCount();

        if ($count_update == 1) {
            echo 1;
        } else {
            echo 'Error al editar';
        }
	}

} else {
    echo 0;
}

?>
