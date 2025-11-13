<?php

// Declara o namespace para organizar os testes
namespace Tests;

// Importa a classe TestCase do PHPUnit e a classe que será testada
use PHPUnit\Framework\TestCase;
use CalcularIMCService;

// Inclui o arquivo da classe a ser testada, caso não esteja usando um autoloader
require_once __DIR__ . '/../src/CalcularIMCService.php';

class CalcularIMCServiceTest extends TestCase
{
    /**
     * Testa o cálculo do IMC com valores válidos e espera um resultado correto.
     */
    public function testCalcularDeveRetornarOValorCorretoComDadosValidos(): void
    {
        // Cenário: Peso 80kg, Altura 1.80m
        $peso = 80;
        $altura = 1.80;
        $imcEsperado = 24.691358024691358; // 80 / (1.80 * 1.80)

        // Execução
        $imcCalculado = CalcularIMCService::calcular($peso, $altura);

        // Verificação (Assert)
        $this->assertEquals($imcEsperado, $imcCalculado, "O IMC calculado para um cenário válido está incorreto.");
    }

    /**
     * Testa o cálculo do IMC quando a altura é zero e espera um retorno nulo.
     */
    public function testCalcularDeveRetornarNuloQuandoAlturaForZero(): void
    {
        // Cenário
        $peso = 80;
        $altura = 0;

        // Execução e Verificação
        $this->assertNull(
            CalcularIMCService::calcular($peso, $altura),
            "A função deveria retornar nulo quando a altura é zero."
        );
    }

    /**
     * Testa o cálculo do IMC quando o peso é zero e espera um retorno nulo.
     */
    public function testCalcularDeveRetornarNuloQuandoPesoForZero(): void
    {
        // Cenário
        $peso = 0;
        $altura = 1.80;

        // Execução e Verificação
        $this->assertNull(
            CalcularIMCService::calcular($peso, $altura),
            "A função deveria retornar nulo quando o peso é zero."
        );
    }

    /**
     * Testa o cálculo do IMC com valores negativos e espera um retorno nulo.
     */
    public function testCalcularDeveRetornarNuloComValoresNegativos(): void
    {
        // Cenário 1: Peso negativo
        $this->assertNull(CalcularIMCService::calcular(-80, 1.80));

        // Cenário 2: Altura negativa
        $this->assertNull(CalcularIMCService::calcular(80, -1.80));
    }
}
