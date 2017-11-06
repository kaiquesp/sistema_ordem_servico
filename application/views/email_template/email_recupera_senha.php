<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Redefinição de senha</title>
</head>
<body>
    <?php 
        $hr = date(" H ");

        if($hr >= 12 && $hr<18) {

            $resp = "Boa tarde";}

            else if ($hr >= 0 && $hr <12 ){

            $resp = "Bom dia";}

            else {

            $resp = "Boa noite";
        }
    ?>
	<table style='background-color: #FFFFFF;' width='744' border='0' align='center' cellpadding='0' cellspacing='0'>
        <tbody>
            <tr>
                <td height='20' align='center' valign='middle'>
                    <img src='https://japacar.tecnologia.ws/assets/img/spacer.gif' width='1' height='20'>
                </td>
            </tr>
            <tr>
                <td align='center' valign='top'>
                    <table width='694' border='0' align='center' cellpadding='0' cellspacing='0'>
                        <tbody>
                            <tr>
                                <td align='left'>
                                    <h1>Sistema JapaCar</h1>
                                </td>
                                <td align='right'>
                                    <img src='https://japacar.tecnologia.ws/assets/img/cloud-hosting.png' width='250' height='100' alt='JapaCar'>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td height='20' align='center' valign='middle'>
                    <img src='https://japacar.tecnologia.ws/assets/img/spacer.gif' width='1' height='20'>
                </td>
            </tr>
            <tr>
                <td>
                    <table width='694' border='0' align='center' cellpadding='0' cellspacing='0'>
                        <tbody>
                            <tr>
                                <td height='4' align='center' valign='middle'>
                                    <img src='https://japacar.tecnologia.ws/assets/img/linha_separa_orc.gif' width='694' height='4'>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td height='20' align='center' valign='middle'>
                    <img src='https://japacar.tecnologia.ws/assets/img/spacer.gif' width='1' height='20'>
                </td>
            </tr>
            <tr>
                <td align='center' valign='top'>
                    <table width='694' border='0' align='center' cellpadding='0' cellspacing='0'>
                        <tbody>
                            <tr>
                                <td style='font-family: Trebuchet MS,Verdana,Arial; text-align: justify; color: #5D5E5E; font-size: 16px;'>
                                <p><?php echo $resp; ?> <strong><?php echo $nome; ?></strong>, tudo bem? (<strong>Usuário:</strong> <?php echo $login; ?>)</p>
                                <p>Você não está conseguindo lembrar sua senha? Não se preocupe! </p>
                                
                                <div align="center" style="padding: 20px;">
                                    <a style="padding:12px 53px;text-decoration:none;background-color:#00acc7;border-radius:8px;font-weight:100;font-size:18px;color:#fff; align=center" href='https://www.japacar.tecnologia.ws/home/change_password/<?php echo $random; ?> ' target="_blank">Definir nova senha</a>
                                </div>
                                <p>IP que solicitou a senha: <?php echo $ip; ?></p>

                                <p>Caso a gente tenha entendido errado e você não pediu isso, por favor,desculpe. Basta ignorar esta mensagem, OK? ;)</p>
                                    <table border="0" cellpadding="0" cellspacing="0" style="width:100%;padding:20px;color:#253543;background-color:#e6e7e8">  
                                        <tbody>    
                                            <tr>      
                                                <th style="text-align:center;font-family:Ubuntu,sans-serif;font-weight:bold;font-size:20px" colspan="2">       
                                                    <p style="margin:5px 0 15px">Veja como criar uma senha segura! ;)</p>      
                                                </th>    
                                            </tr>    
                                            <tr>      
                                                <td><p style="margin:10px 0">• Utilize letras maiúsculas, minúsculas e caracteres especiais.</p></td>    
                                            </tr>    
                                            <tr>      
                                                <td><p style="margin:10px 0">• Evite utilizar data de nascimento, número de telefone, nomes, placa do carro ou afins.</p></td>    
                                            </tr>    
                                            <tr>      
                                                <td><p style="margin:10px 0">• Não crie uma senha sequencial (exemplo: 12345678).</p></td>    
                                            </tr>    
                                            <tr>      
                                                <td><p style="margin:10px 0">• Você gosta de futebol? Nós também! Mas não utilize o nome do seu time na senha.</p></td>    
                                            </tr>    
                                            <tr>      
                                                <td><p style="margin:10px 0">• Não defina uma nova senha parecida com a anterior.</p></td>    
                                            </tr>  
                                        </tbody>
                                    </table>
                                    <table>
                                        <tr>
                                            <td align='left' valign='top'><img src='https://japacar.tecnologia.ws/assets/img/meio_ambiente.png' width='283' height='38'>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td height='20' align='center' valign='middle'>
                    <img src='https://japacar.tecnologia.ws/assets/img/spacer.gif' width='1' height='20'>
                </td>
            </tr>
            <tr>
                <td>
                    <table width='694' border='0' align='center' cellpadding='0' cellspacing='0'>
                        <tbody>
                            <tr>
                                <td height='4' align='center' valign='middle'>
                                    <img src='https://japacar.tecnologia.ws/assets/img/linha_separa_orc.gif' width='694' height='4'>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td height='20' align='center' valign='middle'>
                    <img src='https://japacar.tecnologia.ws/assets/img/spacer.gif' width='1' height='20'>
                </td>
            </tr>
	    </tbody>
	</table>
</body>
</html>