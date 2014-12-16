<head>
    <meta charset="UTF-8">
</head> 
<?php

    $valorSaque = 230;
    $retirada = '';
    $validadorLaco = true;
    $i = 0;

    // - Notas
    $notasDisponiveis[0] = 100;
    $notasDisponiveis[1] = 50;
    $notasDisponiveis[2] = 20;
    $notasDisponiveis[3] = 10;

    $tamanhoArray = count($notasDisponiveis);
    
    if ($valorSaque>0) {
        echo "valor inicial: ".$valorSaque.'<hr />';
        while ($validadorLaco == true) {
            if ($i>$tamanhoArray) {
                $validadorLaco == false;
            }else{
                if ($valorSaque>=$notasDisponiveis[$i]) { // Se o valor do saque, for maior ou igual as notas disponiveis, continua com o mesmo valor de cédula
                    $valorSaque = $valorSaque - $notasDisponiveis[$i];
                    $retirada = $retirada . '|' . $notasDisponiveis[$i];
                }elseif ($valorSaque<$notasDisponiveis[$i]) { // Se o valor do saque, for menor do que a nota disponivel atualmente, ele troca de nota.
                    if (($i+1)==$tamanhoArray) { //se a proxima cedula for maior que o tamanho disponivel
                        $validadorLaco = false;
                    }
                    else { // Se ainda possivel, ele passa para a proxima cedula
                        $i = $i + 1;
                    }
                }elseif ($valorSaque==0) {
                    $validadorLaco = false;
                }
            }
        }

        if ($valorSaque == 0) {
            echo "<br />Saque realizado com sucesso. Notas emitidas: ".$retirada;
        }else{
            echo "Não foi possivel a retirada das cedulas devido ao valor ser inválido.";
        }

    }else{
        echo "O numero digitado não é um valor permitido.";
    }


?>