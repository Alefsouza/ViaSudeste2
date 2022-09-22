<?php
    header('Content-Type: text/html; charset=UTF-8');
    date_default_timezone_set('America/Sao_Paulo');

    require_once ('src/PHPMailer.php');
    require_once ('src/SMTP.php');
    require_once ('src/Exception.php');

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    $CargoPretendido = isset($_POST['CargoPretendido']) ? $_POST['CargoPretendido'] : 'Não Informado';
    $EnderecoCandidato = isset($_POST['EndereçodoCandidato']) ? $_POST['EndereçodoCandidato'] : 'Não Informado';
    $CidadeCandidato = isset($_POST['CidadedoCandidato']) ? $_POST['CidadedoCandidato'] : 'Não Informado';
    $EstadoCandidato = isset($_POST['EstadodoCandidato']) ? $_POST['EstadodoCandidato'] : 'Não Informado';
    $CepCandidato = isset($_POST['CepdoCandidato']) ? $_POST['CepdoCandidato'] : 'Não Informado';
    $Indicacao = isset($_POST['Indicacao']) ? $_POST['Indicacao'] : 'Não Informado';
    $TrabalhouNaEmpresa = isset($_POST['Trabalhounaempresa']) ? $_POST['Trabalhounaempresa'] : 'Não Informado';
    $Qualfuncao = isset($_POST['Qualfoiafunção']) ? $_POST['Qualfoiafunção'] : 'Não Informado';
    $Qualperiodo = isset($_POST['Qualfoioperíodo']) ? $_POST['Qualfoioperíodo'] : 'Não Informado';
    $TelefoneCandidato = isset($_POST['TelefonedoCandidato']) ? $_POST['TelefonedoCandidato'] : 'Não Informado';
    $CelularCandidato = isset($_POST['CelulardoCandidato']) ? $_POST['CelulardoCandidato'] : 'Não Informado';
    $EmailCandidato = isset($_POST['E-maildoCandidato']) ? $_POST['E-maildoCandidato'] : 'Não Informado';
    $NomeCandidato = isset($_POST['NomedoCandidato']) ? $_POST['NomedoCandidato'] : 'Não Informado';
    $CategoriaCNH = isset($_POST['CategoriadaCNH']) ? $_POST['CategoriadaCNH'] : 'Não Informado';
    $NumeroCNH = isset($_POST['NúmerodaCNH']) ? $_POST['NúmerodaCNH'] : 'Não Informado';
    $ValidadeCNH = isset($_POST['ValidadedaCNH']) ? $_POST['ValidadedaCNH'] : 'Não Informado';
    $Naturalidade = isset($_POST['NaturalidadedoCandidato']) ? $_POST['NaturalidadedoCandidato'] : 'Não Informado';
    $IdadeCandidato = isset($_POST['IdadedoCandidato']) ? $_POST['IdadedoCandidato'] : 'Não Informado';
    $SexoCandidato = isset($_POST['SexodoCandidato']) ? $_POST['SexodoCandidato'] : 'Não Informado';
    $EstadoCivil = isset($_POST['EstadoCivildoCandidato']) ? $_POST['EstadoCivildoCandidato'] : 'Não Informado';
    $GrauEscolaridade = isset($_POST['GraudeEscolaridadedoCandidato']) ? $_POST['GraudeEscolaridadedoCandidato'] : 'Não Informado';
    $UltimoEmprego = isset($_POST['UltimoEmprego']) ? $_POST['UltimoEmprego'] : 'Não Informado';
    $UltimoCargo = isset($_POST['UltimoCargo']) ? $_POST['UltimoCargo'] : 'Não Informado';
    $EndUltimoEmprego = isset($_POST['Endereçodoultimoemprego']) ? $_POST['Endereçodoultimoemprego'] : 'Não Informado';
    $TelUltimoEmprego = isset($_POST['Telefonedoultimoemprego']) ? $_POST['Telefonedoultimoemprego'] : 'Não Informado';
    $DataAdmissao = isset($_POST['DataAdmissao']) ? $_POST['DataAdmissao'] : 'Não Informado';
    $DataDemissao = isset($_POST['DataDemissao']) ? $_POST['DataDemissao'] : 'Não Informado';
    $SalarioInicial = isset($_POST['SalarioInicial']) ? $_POST['SalarioInicial'] : 'Não Informado';
    $SalarioFinal = isset($_POST['SalarioFinal']) ? $_POST['SalarioFinal'] : 'Não Informado';
    $MotivoSaida = isset($_POST['MotivodaSaida']) ? $_POST['MotivodaSaida'] : 'Não Informado';

    $data= date('d/m/Y H:i:s');

if($CargoPretendido && $EnderecoCandidato && $CidadeCandidato && $EstadoCandidato && $CepCandidato && $TrabalhouNaEmpresa && $CelularCandidato && $EmailCandidato &&
$NomeCandidato && $Naturalidade && $IdadeCandidato && $SexoCandidato && $EstadoCivil && $GrauEscolaridade && $UltimoEmprego && $MotivoSaida){
        
        $mail = new PHPMailer ();
    
        $mail->CharSet = 'UTF-8';
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'aleefsoouza024@gmail.com';
        $mail->Password = 'Alef1234@,.';
        $mail->SMTPSecure = 'tls'; 
        $mail->Port = 587;

        $mail->setFrom('aleefsoouza024@gmail.com');
        $mail->addAddress('alef.silva@viasudeste.com');

        $mail->isHTML(true);
        $mail->Subject = "Currículo - Nome: {$NomeCandidato} - Vaga: {$CargoPretendido}";
        $mail->Body = "<strong>Segue os dados do nosso Candidato:</strong><br><br>

                        Nome: {$NomeCandidato}<br>
                        Cargo que deseja ocupar: {$CargoPretendido}<br>
                        Endereço: {$EnderecoCandidato}<br>
                        Cidade: {$CidadeCandidato}<br>
                        Estado: {$EstadoCandidato}<br>
                        CEP: {$CepCandidato}<br><br>

                        Naturalidade: {$Naturalidade}<br>
                        Idade: {$IdadeCandidato}<br>
                        Sexo: {$SexoCandidato}<br>
                        Estado Civil: {$EstadoCivil}<br>
                        Grau de Escolaridade: {$GrauEscolaridade}<br><br>

                        Telefone: {$TelefoneCandidato}<br>
                        Celular: {$CelularCandidato}<br>
                        E-mail: {$EmailCandidato}<br><br>

                        Indicação: {$Indicacao}<br>
                        Já trabalhou na empresa? {$TrabalhouNaEmpresa}<br>
                        Em qual a função? {$Qualfuncao}<br>
                        Qual foi o período? {$Qualperiodo}<br><br>
                        
                        Qual a categoria da CNH? {$CategoriaCNH}<br>
                        Qual o número da CNH? {$NumeroCNH}<br>
                        Qual a validade da CNH? {$ValidadeCNH}<br><br>
                        
                        Qual foi o último emprego? {$UltimoEmprego}<br>
                        Qual foi o último cargo? {$UltimoCargo}<br>
                        Qual o endereço do último emprego? {$EndUltimoEmprego}<br>
                        Qual o telefone do último emprego? {$TelUltimoEmprego}<br>
                        Qual foi a data de admissão? {$DataAdmissao}<br>
                        Qual foi a data de demissão? {$DataDemissao}<br>
                        Qual foi o salário inicial? {$SalarioInicial}<br>
                        Qual foi o salário final? {$SalarioFinal}<br>
                        Qual foi o motivo da saída? {$MotivoSaida}<br><br>

                        Data: {$data}<br>

                        <strong>Para qualquer problema ou dúvida, por favor mandar e-mail para: ti@viasudeste.com</strong>";
                        
        $mail->AltBody = "Segue os dados do nosso Candidato:<br><br>
                        Nome: {$NomeCandidato}<br>
                        Cargo que deseja ocupar: {$CargoPretendido}<br>
                        Endereço: {$EnderecoCandidato}<br>
                        Cidade: {$CidadeCandidato}<br>
                        Estado: {$EstadoCandidato}<br>
                        CEP: {$CepCandidato}<br><br>

                        Naturalidade: {$Naturalidade}<br>
                        Idade: {$IdadeCandidato}<br>
                        Sexo: {$SexoCandidato}<br>
                        Estado Civil: {$EstadoCivil}<br>
                        Grau de Escolaridade: {$GrauEscolaridade}<br><br>


                        Telefone: {$TelefoneCandidato}<br>
                        Celular: {$CelularCandidato}<br>
                        E-mail: {$EmailCandidato}<br><br>

                        Indicação: {$Indicacao}<br>
                        Já trabalhou na empresa? {$TrabalhouNaEmpresa}<br>
                        Em qual a função? {$Qualfuncao}<br>
                        Qual foi o período? {$Qualperiodo}<br><br>
        
                        Qual a categoria da CNH? {$CategoriaCNH}<br>
                        Qual o número da CNH? {$NumeroCNH}<br>
                        Qual a validade da CNH? {$ValidadeCNH}<br><br>
        
                        Qual foi o último emprego? {$UltimoEmprego}<br>
                        Qual foi o último cargo? {$UltimoCargo}<br>
                        Qual o endereço do último emprego? {$EndUltimoEmprego}<br>
                        Qual o telefone do último emprego? {$TelUltimoEmprego}<br>
                        Qual foi a data de admissão? {$DataAdmissao}<br>
                        Qual foi a data de demissão? {$DataDemissao}<br>
                        Qual foi o salário inicial? {$SalarioInicial}<br>
                        Qual foi o salário final? {$SalarioFinal}<br>
                        Qual foi o motivo da saída? {$MotivoSaida}<br><br>

                        Data: {$data}<br>

                        Para qualquer problema ou dúvida, por favor mandar e-mail para: ti@viasudeste.com";

        if ($mail->send()) {
            echo "<strong>E-mail enviado com sucesso!</strong>";
        } else {
                echo "<strong>E-mail não foi enviado! Por favor tente novamente mais tarde!</strong>";
        } 
    }else {
        echo "<strong>E-mail não enviado, por favor preencher campos necessários!</strong>";
    }
