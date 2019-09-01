<?php


namespace Bases;


class Explicacao
{
    /**
     * @var Base
     */
    private $base_valor;

    /**
     * @var Base
     */
    private $base_conversao;

    /**
     * @var string
     */
    private $resposta;

    /**
     * @var string
     */
    private $explicacao;

    public function __construct(
        Base $base_valor,
        Base $base_conversao,
        string $resposta, string $explicacao
    )
    {
        $this->resposta = $resposta;
        $this->explicacao = $explicacao;
        $this->base_valor = $base_valor;
        $this->base_conversao = $base_conversao;
    }

    /**
     * @return string
     */
    public function getResposta(): string
    {
        return $this->resposta;
    }

    /**
     * @return string
     */
    public function getExplicacao(): string
    {
        return $this->explicacao;
    }

}