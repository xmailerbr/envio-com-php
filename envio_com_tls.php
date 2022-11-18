<?php
///requer a classe PHPMailer (faça o download da classe aqui mesmo no GitHub)
require("class.phpmailer.php");

///em modo de teste, ative a exibição de erros
ini_set('display_errors', 1);
error_reporting(E_ERROR);

/////inicia o envio
$mail = new PHPMailer(true); 

$usuario_smtp = 'USUARIO';  //usuario smtp - fornecido em sua conta
$senha_smtp = 'SUASENHA'; //senha smtp - fornecida em sua conta
$servidor_smtp = 'HOSTDECONEXAO';  //host de conexão SMTP - fornecido em sua conta

try {
    //Server settings
    $mail->SMTPDebug = 2; //ativa debug da classe
    $mail->isSMTP(); //define como SMTP
    $mail->Host = $servidor_smtp;  //especifique o servidor/host
    $mail->SMTPAuth = true;   //sempre utilize a autenticação ativada
    $mail->Username = $usuario_smtp;   //usuario SMTP
    $mail->Password = $senha_smtp; //senha SMTP
    $mail->SMTPSecure = 'tls';  //false para envio sem SSL
    $mail->Port = 587; //porta para conectar - use 25 ou 587

    //Remetente
    $mail->setFrom('ENDERECO-DE-EMAIL', 'NOME DA SUA EMPRESA'); //informe o email do remetente - pode ser qualquer endereço de email do seu domínio configurado
    //Responder para    
    $mail->AddReplyTo('ENDERECO-DE-EMAIL-DE-RESPOSTA'); //aqui você pode informar um endereço de email para resposta
    //Destinatário    
    $mail->addAddress('EMAIL-DO-DESTINATARIO'); //defina o email do destinatário - quem vai receber a mensagem

    //Content
    $mail->isHTML(true);  //ative caso queira enviar mensagem no formato HTML
    $mail->Subject = 'Enviando mensagem teste sem SSL';
    $mail->Body    = 'Esta é uma mensagem de teste via PHPMailer, com TLS'; //mensagem
    $mail->AltBody = 'Esta é uma mensagem de teste via PHPMailer, com TLS'; //mensagem alternativa = opcional

    $mail->send();
    echo 'Mensagem enviada com sucesso de: '.$mail->Username;
    } catch (Exception $e) {
        echo 'Erro ao enviar. Mailer Error: ', $mail->ErrorInfo;
	}
////////////////////////////
