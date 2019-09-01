<?php

require_once __DIR__ . "/vendor/autoload.php";

if (!isset($_GET['valor'])) {
    print response_error("valor é obrigatório", []);
    exit;
}

if (!isset($_GET['base_valor'])) {
    print response_error("base de valor é obrigatório", []);
    exit;
}

if (!isset($_GET['base_conversao'])) {
    print response_error("base de conversão é obrigatório", []);
    exit;
}

$valor = $_GET['valor'];
$base_valor = $_GET['base_valor'];
$base_conversao = $_GET['base_conversao'];

if (!in_array($base_valor, array_keys(\Bases\Base::BASES))) {
    print response_error("base de valor está errada!", [
        'bases_aceitas' => implode(" e ", array_keys(\Bases\Base::BASES))
    ]);
    exit;
}

if (!in_array($base_conversao, array_keys(\Bases\Base::BASES))) {
    print response_error("base de conversão está errada!", [
        'bases_aceitas' => implode(" e ", array_keys(\Bases\Base::BASES))
    ]);
    exit;
}

try {
    $resposta = \Bases\Base::getClass($base_valor, $valor)
        ->converter_para($base_conversao);

    print response_success(
        [
            'resposta' => $resposta->getResposta(),
            'explicacao' => $resposta->getExplicacao()
        ]
    );

    exit;

} catch (Exception $exception) {
    print response_error($exception->getMessage(), []);

    exit;
}

function response_success(array $dados)
{
    return json_encode(
        [
            'status' => 'success',
            'response' => $dados
        ]
    );
}

function response_error(string $erro, array $dados)
{
    return json_encode(
        [
            'status' => 'fail',
            'erro' => $erro,
            'response' => $dados
        ]
    );
}