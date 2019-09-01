<?php

namespace Bases;

class Decimal extends Base
{
    /**
     * @return int
     */
    public static function base_por_numero(): int
    {
        return 10;
    }

    /**
     * @return array
     */
    public static function valor_aceitos(): array
    {
        return [0, 1, 2, 3, 4, 5, 6, 7, 8, 9];
    }

    /**
     * @return string
     */
    public static function nome_base(): string
    {
        return "Decimal";
    }

    /**
     * @param string $valor
     * @return bool
     */
    public function validar(string $valor): bool
    {
        foreach (str_split($valor) as $campo_valor) {
            if (!is_numeric($campo_valor)) {
                return false;
            }
        }

        return parent::validar($valor);

    }

    /**
     * @param string $valor
     * @return Decimal
     * @throws \Exception
     */
    public function converterParaBinario(): Binario
    {
        return new Binario(
            $this->converterBases(Binario::base_por_numero())
        );
    }

    /**
     * @return Hexadecimal
     * @throws \Exception
     */
    public function converterParaHexadecimal(): Hexadecimal
    {
        return new Hexadecimal(
            $this->converterBases(Hexadecimal::base_por_numero())
        );
    }

    /**
     * @param string $valor
     * @return Decimal
     * @throws \Exception
     */
    public function converterParaBinarioComExplicacao(): Explicacao
    {
        return new Explicacao(
            $this, $this->converterParaBinario(),
            $this->converterParaBinario()->getValor(),
            'Explicar como converter decimal para binário'
        );
    }

    /**
     * @return Hexadecimal
     * @throws \Exception
     */
    public function converterParaHexadecimalComExplicacao(): Explicacao
    {
        return new Explicacao(
            $this, $this->converterParaHexadecimal(),
            $this->converterParaHexadecimal()->getValor(),
            'Explicar como converter decimal para hexadecimal'
        );
    }

}