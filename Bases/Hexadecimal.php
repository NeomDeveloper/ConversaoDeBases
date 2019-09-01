<?php

namespace Bases;

class Hexadecimal extends Base
{
    public static function base_por_numero(): int
    {
        return 16;
    }

    /**
     * @return array
     */
    public static function valor_aceitos(): array
    {
        // https://www.mathportal.org/calculators/numbers-calculators/decimal-binary-hexadecimal-converter.php
        return ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'A', 'B', 'C', 'D', 'E', 'F'];
    }

    /**
     * @return string
     */
    public static function nome_base(): string
    {
        return "Hexadecimal";
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
    public function converterParaDecimal(): Decimal
    {
        return new Decimal(
            $this->converterBases(Decimal::base_por_numero())
        );
    }

    /**
     * @return Explicacao
     * @throws \Exception
     */
    public function converterParaBinarioComExplicacao(): Explicacao
    {
        return new Explicacao(
            $this, $this->converterParaBinario(),
            $this->converterParaBinario()->getValor(),
            'Explicando como converter hexadecimal para binário'
        );
    }

    /**
     * @return Explicacao
     * @throws \Exception
     */
    public function converterParaDecimalComExplicacao(): Explicacao
    {
        return new Explicacao(
            $this, $this->converterParaDecimal(),
            $this->converterParaDecimal()->getValor(),
            'Explicando como converter hexadecimal para decimal'
        );
    }

}