<?php

class CalcularIMCService
{
    /**
     * Calcula o Índice de Massa Corporal (IMC).
     *
     * @param float $peso Peso em quilogramas.
     * @param float $altura Altura em metros.
     * @return float|null O valor do IMC ou nulo se os dados forem inválidos.
     */
    public static function calcular(float $peso, float $altura): ?float
    {
        // Evita divisão por zero ou valores inválidos
        if ($altura <= 0 || $peso <= 0) {
            return null;
        }

        return $peso / ($altura * $altura);
    }
}
