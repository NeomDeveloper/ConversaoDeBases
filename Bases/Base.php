<?php


namespace Bases;


abstract class Base implements \Interfaces\Base
{
    const BASES = [
        "DECIMAL" => Decimal::class,
        "BINARIO" => Binario::class,
        "HEXADECIMAL" => Hexadecimal::class,
    ];

    private $valor;

    /**
     * Base constructor.
     * @param string $valor
     * @throws \Exception
     */
    public function __construct(string $valor)
    {
        if ($this->validar($valor)) {
            $this->valor = $valor;
        } else {
            throw new \Exception("Valor '" . $valor . "' não aceito como '" . $this::nome_base() . "'");
        }
    }

    public function validar(string $valor): bool
    {
        foreach (str_split($valor) as $campo_valor) {
            if (!in_array(strtoupper($campo_valor), $this::valor_aceitos())) {
                return false;
            }
        }

        return true;
    }

    /**
     * @param string $base
     * @param string $valor
     * @return Base
     */
    public static function getClass(string $base, string $valor): self
    {
        $class = self::BASES[$base];
        return new $class($valor);
    }

    /**
     * @param string $base
     * @return Explicacao
     * @throws \Exception
     */
    public function converter_para(string $base): Explicacao
    {
        if (!in_array($base, array_keys(self::BASES))) {
            throw new \Exception("Base [$base] errada! =/");
        }

        $nome_funcao = "converterPara" . ucfirst(strtolower($base)) . "ComExplicacao";
        return $this->$nome_funcao();
    }

    /**
     * @return string
     */
    public function getValor(): string
    {
        return $this->valor;
    }

    /**
     * @param int $valor
     * @return string
     */
    protected function converterBases(int $valor)
    {
        return base_convert($this->getValor(), $this::base_por_numero(), $valor);
    }

}