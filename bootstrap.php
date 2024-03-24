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
    $arrlength = count($vetVlr);
    for($x = 0; $x < $arrlength; $x++)
    {
        function max( array $vetVlr, mixed $valor1, mixed $valor3, mixed $valor4, mixed $valor5, mixed $valor6, mixed $valor7){
            return $vetVlr[$vetVlr['']];
        }
        echo $vetVlr[$x];
        echo "<br>";
    }

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