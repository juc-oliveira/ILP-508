<?php

require __DIR__."/vendor/autoload.php";

$metodo = $_SERVER['REQUEST_METHOD'];
$caminho = $_SERVER['PATH_INFO'] ?? '/'; //retorna tudo o que está depois do localhost. ex: www.fatec.edu.br/caminho/. entao trará /caminho

$r = new Php\Primeiroprojeto\Router($metodo, $caminho);

#ROTAS

$r->get('/olamundo', function (){
    return "Olá mundo!";
} );

$r->get('/exer1/formulario', function(){
    include("exer1.html");
});

$r->post('/exer1/resposta', function(){
    $valor1 = $_POST['valor1'];
    $valor2 = $_POST['valor2'];
    $soma = $valor1 + $valor2;
    return "A soma é: {$soma}";
});

#ROTAS LISTA DE EXERCÍCIOS 2 - ILP-508
    #Exercício 1
$r->get('/listaExer1/formulario', function(){
    include("listaExer1.html");
});

$r->post('/listaExer1/resposta', function(){
    $valor1 = $_POST['valor1'];
    if($valor1 < 0)
        return "Valor Negativo";
    else if($valor1 == 0)
        return "Valor igual a zero";
    else if($valor1 > 0)
        return "Valor Positivo";
    else
        return "Valor não identificado!";

});

    #EXERCÍCIO 2

$r->get('/listaExer2/formulario', function(){
    include("listaExer2.html");
});

$r->post('/listaExer2/resposta', function(){
    $valor1 = $_POST['valor1'];
    $valor2 = $_POST['valor2'];
    $valor3 = $_POST['valor3'];
    $valor4 = $_POST['valor4'];
    $valor5 = $_POST['valor5'];
    $valor6 = $_POST['valor6'];
    $valor7 = $_POST['valor7'];
    
    
    $vetVlr = array();
    $vetVlr = [$valor1, $valor2, $valor3, $valor4, $valor5, $valor6, $valor7];

    $menorValor = min($vetVlr);

    $posicaoMenor = array_search($menorValor, $vetVlr);

    echo "O menor valor é: $menorValor<br>";
    echo "Ele está na posição: $posicaoMenor<br>";

});

    #EXERCÍCIO 3

$r->get('/listaExer3/formulario', function(){
    include("listaExer3.html");
});

$r->post('/listaExer3/resposta', function(){
    $valor1 = $_POST['valor1'];
    $valor2 = $_POST['valor2'];

    if($valor1 == $valor2){
        $soma = ($valor1 + $valor2) * 3;
    }
    else
        $soma = $valor1 + $valor2;

    echo "Resultado: {$soma}";

});

    #EXERCÍCIO 4

$r->get('/listaExer4/formulario', function(){
    include("listaExer4.html");
});

$r->post('/listaExer4/resposta', function(){
    $valor1 = $_POST['valor1'];
    echo "<h3>Tabuada do $valor1:</h3>";
        for ($i = 0; $i <= 10; $i++) {
            $resultado = $valor1 * $i;
            echo "$valor1 X $i = $resultado <br>";
        }
});


    #EXERCÍCIO 5

$r->get('/listaExer5/formulario', function(){
    include("listaExer5.html");
});

$r->post('/listaExer5/resposta', function() use ($r){
    $valor1 = $_POST['valor1'];
    
    if ($valor1 == 0) {
        $resultado = 1;
    } else {
        $fatorial = 1;
        for ($i = $valor1; $i > 1; $i--) {
            $fatorial *= $i;
        }
        $resultado = $fatorial;
    }

    echo "<h3>O fatorial de {$valor1} é: {$resultado}</h3>";
});

    #EXERCÍCIO 6

$r->get('/listaExer6/formulario', function(){
    include("listaExer6.html");
});

$r->post('/listaExer6/resposta', function() {
    $valor1 = $_POST['valor1'];
    $valor2 = $_POST['valor2'];
    if($valor1 < $valor2){
        echo "$valor1 $valor2";
    }
    else if($valor1 > $valor2){
        echo "$valor2 $valor1";
    }
    else
        echo "números iguais: $valor1";
});

    #EXERCÍCIO 7

$r->get('/listaExer7/formulario', function(){
    include("listaExer7.html");
});

$r->post('/listaExer7/resposta', function() {
    $valor1 = $_POST['valor1'];

    $centimetros = $valor1 * 100;
    echo "$valor1 metros = $centimetros centimetros";


});

    #EXERCÍCIO 8

$r->get('/listaExer8/formulario', function(){
    include("listaExer8.html");
});

$r->post('/listaExer8/resposta', function() {
    $valor1 = $_POST['valor1'];

    $litros = ceil($valor1 / 3);
    $latas = ceil($litros / 18);
    $custo = $latas * 80;

    echo "Orçamento de pintura para área de $valor1 metros quadrados:<br>
        Tinta: $latas latas <br>
        Custo: R$ $custo";

});

    #EXERCÍCIO 9

$r->get('/listaExer9/formulario', function(){
    include("listaExer9.html");
});

$r->post('/listaExer9/resposta', function() {
    $valor1 = $_POST['valor1'];

    $anoAtual = date("Y");
    $idade = $anoAtual - $valor1;
    echo "Sua idade atual é: $idade<br><br>";

    $diasVividos = $idade * 365;
    echo "Você já viveu $diasVividos dias.<br><br>";

    $dtFuturo = 2025 - $valor1;
    echo "Em 2025 você terá $dtFuturo anos.";

});

    #EXERCÍCIO 10

$r->get('/listaExer10/formulario', function(){
    include("listaExer10.html");
});

$r->post('/listaExer10/resposta', function() {
    $valor1 = $_POST['valor1'];
    $valor2 = $_POST['valor2'];

    $imc = number_format(($valor1 / ($valor2 ** 2)),2);
    echo "Seu IMC é: $imc<br><br>";
    echo "Classificação: ";
    
    if($imc < 18.5)
        echo "Magreza<br><br>";
    else if($imc >= 18.5 && $imc <= 24.9)
        echo "Normal<br><br>";
    else if($imc >= 25.0 && $imc <= 29.9)
        echo "Obesidade Grau I - Sobrepeso<br><br>";
    else if($imc >= 30 && $imc <= 39.9)
        echo "Obesidade Grau II<br><br>";
    else
        echo "Obesidade Grau III - Grave<br><br>";

    echo "Para saber mais sobre o assunto <a href='https://superafarma.com.br/calcule-o-seu-imc-calculadora-peso-ideal/'  target='_blank'> clique aqui</a>.";
});



#ROTAS

$r->get('/olapessoa', function (){
    return "Olá Pessoa!";
} );

$r->get('/olapessoa/{nome}', function($params){
    return 'Olá '.$params[1];
});

#ROTAS

$resultado = $r->handler();

if(!$resultado){
    http_response_code(404);
    echo "Página não encontrada!";
    die();
}

echo $resultado($r->getParams());