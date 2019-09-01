<?php

namespace Bases;

class Binario extends Base
{
    /**
     * @return int
     */
    public static function base_por_numero(): int
    {
        return 2;
    }

    /**
     * @return array
     */
    public static function valor_aceitos(): array
    {
        return [0, 1];
    }

    /**
     * @return string
     */
    public static function nome_base(): string
    {
        return "Binário";
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
    public function converterParaDecimal(): Decimal
    {
        return new Decimal(
            $this->converterBases(Decimal::base_por_numero())
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
     * @return Explicacao
     * @throws \Exception
     */
    public function converterParaDecimalComExplicacao(): Explicacao
    {
        $conversao = $this->converterParaDecimal();

        return new Explicacao(
            $this, $conversao,
            $conversao->getValor(),
            "Explicando como converter binário para decimal!"
        );
    }

    /**
     * @return Explicacao
     * @throws \Exception
     */
    public function converterParaHexadecimalComExplicacao(): Explicacao
    {
        return new Explicacao(
            $this, $this->converterParaHexadecimal(),
            $this->converterParaHexadecimal()->getValor(),
            'Explicando como converter binário para hexadecimal!'
        );
    }

}