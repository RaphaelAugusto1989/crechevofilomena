<?php
    require 'config.php';
    require 'connection.php';
    require 'database.php';

    date_default_timezone_set('America/Sao_Paulo');

    //LÊ DADOS DO BANCO
    $criancaEvento = DBRead ("crianca_evento", "WHERE send_email = '0'", "*");

    foreach ($criancaEvento as $key => $cri) {
       // echo '<br>';
        //print_r($cri); exit;
        $idCrianca = $cri['id_crianca'];   
        $idCliente = $cri['id_cliente'];
        $idEvento = $cri['id_evento'];

        $nascimento = $cri['nascimento'];
        $dataHoje = date('Y-m-d');
        $idade = $dataHoje - $nascimento;

        $clienteEvento = DBRead ("clientes", "WHERE id_cli = '$idCliente'", "*");
        
        $Evento = DBRead ("agenda", "WHERE id_agenda = '$idEvento'", "*");

        foreach ($clienteEvento as $c => $cli) {

       
            foreach ($Evento as $e => $ev) {
                $data = explode('-', $ev['data']);
                $dataEvento = $data[2].'/'.$data[1].'/'.$data[0];

                $data = date('D', strtotime($rd['data']));

                $semana = array(
                    'Sun' => 'Domingo',
                    'Mon' => 'Segunda-Feira',
                    'Tue' => 'Terca-Feira',
                    'Wed' => 'Quarta-Feira',
                    'Thu' => 'Quinta-Feira',
                    'Fri' => 'Sexta-Feira',
                    'Sat' => 'Sábado'
                );

                if ($ev['valor'] == '0') {
                    $valorEvento = 'Grátis!';
                } else {
                    $valorEvento = 'R$ '.number_format($ev['valor'], 2, ',', '.');
                }

                $Nome = $cli['nome_cli'];
				$To = $cli['email_cli'];
                $Subject = "Confirmação de Evento ";

                $Message = "<html lang='pt-br'>
                                <body style='font-family: arial; font-size: 14px; background-color: #D3D3D3; padding: 20px 0 20px 0;'>
                                    <div style='margin: 0 auto; border: 0 solid; width: 70%; padding: 20px; border: 1px solid #000000; background-color: #ffffff;'>
                                        <div style='text-align: center;'>
                                            <img src='https://triobagunca.com.br/img/logo-trio.png' style='width: 10%; min-width: 110px;'>
                                        </div>
                                        <div>
                                            <p>O Trio Bagunça confirma:</p>
                                            <p>Você acaba de garantir passagem para o Espaço Bagunça!</p>
                                            <p>Fique atento às informações sobre a data e o horário de início e fim das atividades.</p>
                                            <p>Atenção, este ingresso não dá direito a reembolso, então caso a criança informada não possa ir, você tem tem até 24 horas do evento para colocar outra criança em seu lugar, ou então, reagendar para uma atividade futura de igual valor.</p>
                                            <p>O não cumprimento deste passo acarretará na perda do valor.</p>
                                            <p>Nossa loja possui muita diversão e segurança, acompanhe tudo pelo sistema de câmera na recepção, caso deseje.
                                            <p>O espaço das atividades é exclusivo para as crianças. Contamos com banheiro privativo na própria loja, sistema de energia elétrica inteligente a prova de choque, cozinha completa para refeições quando a atividade assim estabelecer e muito mais!</p>
                                            <p>Venha conhecer e se apaixonar por essa nova forma de brincar.</p>
                                            <br>
                                            <br>  
                                        </div>
                                        <div style='width: 100%; border: 1px solid #000000; border-radius: 10px;'>
                                            <img src='https://triobagunca.com.br/img/logo-trio.png' style='width: 11%; min-width: 110px; float: right; margin: 10px;'>
                                            <div style='font-size: 20px; font-weight: bold; text-align: center; padding: 20px;'>".$ev['evento']."</div>
                                            <div style='width: auto; margin: 5px; padding: 0 20px 0 20px;'><b>Responsável:</b> ".$cli['nome_cli']." <span style='margin-left: 35px;'><b>CPF:</b> ".$cli['cpf_cli']."</span></div>
                                            <div style='width: auto; margin: 5px; padding: 0 20px 0 20px;'><b>Nome da Criança:</b> ".$cri['nome_crianca']." <span style='margin-left: 35px;'><b>Idade:</b> ".$idade."</span></div>
                                            <div style='width: 100%; border-top: 1px solid #000000; border-bottom: 1px solid #000000; padding: 10px 0 10px 0; text-align: center; font-size: 20px;'>
                                            ".$dataEvento." - ".$semana[$data]." das ".$ev['hora_inicio']." as ".$ev['hora_termino']." 
                                            </div>
                                            <div style='width: auto; margin: 5px; padding: 0 20px 0 20px;'><b>Local:</b> ".$ev['local']."</div>
                                            <div style='width: auto; margin: 5px; padding: 0 20px 0 20px;'><b>Valor:</b> ".$valorEvento."</div>
                                        </div>
                                    </div>
                                </body>
                            </html>";

                    //É necessário indicar que o formato do e-mail é html
                    $Headers  = 'MIME-Version: 1.0' . "\r\n";
                    $Headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
                    $Headers .= 'From: '."Trio Bagunça <noreply@triobagunca.com.br>";
                    //$Headers .= "Bcc: $EmailPadrao\r\n";
                        
                    $Enviado = mail($To, $Subject, $Message, $Headers);

                    if ($Enviado) {
                        echo "Enviado com sucesso para ".$cli['nome_cli']."<br>";

                        $ok = array (
                            'send_email' => '1'
                          );
                          
                        $altera = DBUpDate('crianca_evento', $ok, "	id_crianca = '".$idCrianca ."'");
                    } else {
                        echo "NENHUM E-MAIL ENVIADO!";
                    }
            }
        }
    }
?>