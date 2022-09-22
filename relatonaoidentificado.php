<?php
    header('Content-Type: text/html; charset=UTF-8');
    date_default_timezone_set('America/Sao_Paulo');

    require_once ('src/PHPMailer.php');
    require_once ('src/SMTP.php');
    require_once ('src/Exception.php');

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    $Email = isset($_POST['conf-email']) ? $_POST['conf-email'] : 'Não Informado';
    $Telefone = isset($_POST['conf-tel']) ? $_POST['conf-tel'] : 'Não Informado';
    $Celular = isset($_POST['conf-cel']) ? $_POST['conf-cel'] : 'Não Informado';
    $Relato = isset($_POST['TipodoRelato']) ? $_POST['TipodoRelato'] : 'Não Informado';
    $Local = isset($_POST['LocaldoRelato']) ? $_POST['LocaldoRelato'] : 'Não Informado';
    $Descricao = isset($_POST['DescricaoRelato']) ? $_POST['DescricaoRelato'] : 'Não Informado';
    $Anexo = $_FILES['AnexarArquivo'];

    $data= date('d/m/Y H:i:s');

if($Relato && $Local && $Descricao){
        
        $mail = new PHPMailer ();
    
        $mail->CharSet = 'UTF-8';
        $mail->isSMTP();
        $mail->Host = 'smtp.mail.outlook.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'aleef_soouza@hotmail.com';
        $mail->Password = '20838078Ah';
        $mail->SMTPSecure = 'ssl'; 
        $mail->Port = 587;
        $mail->SMTPDebug  = 1;

        $mail->setFrom('aleef_soouza@hotmail.com');
        $mail->addAddress('alef.silva@viasudeste.com');

        $mail->addAttachment($Anexo['tmp_name'], $Anexo['name']);

        $mail->isHTML(true);
        $mail->Subject = "Relato: {$Relato}";
        $mail->Body = "<strong>Segue os dados Relato:</strong><br><br>

                        E-mail: {$Email}<br>

                        Relato: {$Relato}<br>
                        Local: {$Local}<br><br>

                        Descrição: {$Descricao}<br><br>

                        <strong>Para qualquer problema ou dúvida, por favor mandar e-mail para: ti@viasudeste.com</strong>";
                        
        $mail->AltBody = "Segue os dados Relato:<br><br>

        E-mail: {$Email}<br>

        Relato: {$Relato}<br>
        Local: {$Local}<br><br>

        Descrição: {$Descricao}<br><br>

        Para qualquer problema ou dúvida, por favor mandar e-mail para: ti@viasudeste.com";

        if ($mail->send()) {
            echo "<strong>Relato enviado com sucesso!</strong>";
        } else {
                echo "<strong>Relato não foi enviado! Por favor tente novamente mais tarde!</strong>";
        } 
    }else {
        echo "<strong>Relato não enviado, por favor preencher campos necessários!</strong>";
    }
