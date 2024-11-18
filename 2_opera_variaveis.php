<!-- Usando a função GET -->
<!-- GET: método HTML padão, a requisição é enviada como uma string anexada a URL -->

<!-- Esse programa recebe dois valores pela URL usando o método GET -->
<!-- http://localhost/php-basico-Gabriel/2_opera_variaveis.php?numero1=2&numero2=2 -->
<?php

$numero1 = $_GET['numero1'];
$numero2 = $_GET['numero2'];

// Verifica se os valores foram passados corretamente
if(isset($numero1) && isset($numero2)){
    // convertendo os valores para inteiro
    $numero1 = (int)$numero1;
    $numero2 = (int)$numero2;

    // realizando as operações
    // SOMAR
    $soma = $numero1 + $numero2;
    // SUBTRAIR
    $subtracao = $numero1 - $numero2;
    // MULTIPLICAR
    $multiplicacao = $numero1 * $numero2;
    // DIVIDIR
    $divisao = $numero1 / $numero2;

    // exibir os resultados
    echo "soma: $soma <br>";
    echo "subtração: $subtracao <br>";
    echo "multiplicação: $multiplicacao <br>";
    echo "divisão: $divisao <br>";
}
else{
    echo "ATENÇÃO! por favor, forneça oa valores de numero1 e numero2 pela URL.";
}
?>