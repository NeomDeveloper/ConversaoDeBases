<?php

namespace Interfaces;

use Bases\Explicacao;

interface Base
{
    /**
     * Base constructor.
     * @param string $valor
     */
    public function __construct(string $valor);

    /**
     * @param string $valor
     * @return bool
     */
    public function validar(string $valor): bool;

    /**
     * @return string
     */
    public static function nome_base(): string;

    /**
     * @param string $base
     * @return mixed
     */
    public function converter_para(string $base): Explicacao;

    /**
     * @return array
     */
    public static function valor_aceitos(): array;

    public static function base_por_numero(): int;
}