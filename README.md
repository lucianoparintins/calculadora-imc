[![PHP Version](https://img.shields.io/badge/php-8.0-blue.svg)](https://php.net)
# Calculadora de IMC em PHP

Este projeto é um exemplo de estudo de uma **Calculadora de Índice de Massa Corporal (IMC)**. Desenvolvido em PHP puro, ele foi estruturado para demonstrar práticas modernas de desenvolvimento, incluindo o uso de Docker para criação de um ambiente consistente, Composer para gerenciamento de dependências e PHPUnit para testes automatizados.

O objetivo principal é servir como um material didático para quem está aprendendo sobre a integração dessas ferramentas em um projeto PHP.

## 📋 Tabela de Conteúdos

1.  Tecnologias Utilizadas
2.  Estrutura do Projeto
3.  Começando
4.  Executando os Testes

## ✨ Tecnologias Utilizadas

- **PHP 8.0**: Linguagem de programação principal.
- **Docker & Docker Compose**: Para criar e orquestrar os contêineres da aplicação e dos testes.
- **Composer**: Gerenciador de dependências para o PHP.
- **PHPUnit**: Framework para a execução de testes unitários.

## 📂 Estrutura do Projeto

A estrutura de diretórios foi pensada para ser simples e escalável, separando as responsabilidades:

```
calculadora-imc/
├── src/                      # Contém o código-fonte da aplicação.
│   └── CalcularIMCService.php
├── tests/                    # Contém os testes automatizados.
│   └── CalcularIMCServiceTest.php
├── .gitignore                # Arquivos e diretórios a serem ignorados pelo Git.
├── composer.json             # Define as dependências do projeto.
├── Dockerfile                # Define a imagem Docker para a aplicação principal.
├── Dockerfile-tests          # Define a imagem Docker específica para rodar os testes.
├── docker-compose.yml        # Orquestra os serviços (contêineres) da aplicação.
└── README.md                 # Este arquivo.
```

## 🚀 Começando

Siga os passos abaixo para configurar e executar o ambiente de desenvolvimento localmente.

### Pré-requisitos

Antes de começar, garanta que você tenha as seguintes ferramentas instaladas em sua máquina:

- Docker
- Docker Compose
- Git

### Instalação e Execução

1.  **Clone o repositório:**
    ```bash
    git clone https://github.com/lucianoparintins/calculadora-imc.git
    cd calculadora-imc
    ```

2.  **Suba os contêineres com Docker Compose:**
    Este comando irá construir as imagens (se ainda não existirem) e iniciar os serviços em segundo plano (`-d`).
    ```bash
    docker compose up -d --build
    ```

3.  **Acesse a aplicação:**
    Após a execução do comando, a aplicação estará disponível no seu navegador através do seguinte endereço:
    http://localhost:8000

## 🧪 Executando os Testes

Os testes unitários garantem a qualidade e o comportamento esperado da classe de serviço `CalcularIMCService`. Para executá-los, utilizamos um contêiner Docker dedicado.

### Opção 1: Execução Direta (Recomendado)

O `docker-compose.yml` foi configurado para gerenciar o serviço de testes. Para rodar a suíte de testes, execute o seguinte comando. Ele iniciará um contêiner temporário, rodará os testes e o removerá em seguida (`--rm`).

```bash
docker compose run --rm tests
```

### Opção 2: Construindo e Executando Manualmente

Se preferir executar os testes de forma isolada, sem o Docker Compose, siga os passos:

1.  **Construa a imagem de testes:**
    O comando abaixo cria uma imagem Docker chamada `calculadora-imc-tests` usando as definições do `Dockerfile-tests`.
    ```bash
    docker build -t calculadora-imc-tests -f Dockerfile-tests .
    ```

2.  **Execute os testes:**
    Este comando cria um contêiner temporário a partir da imagem, executa o PHPUnit e remove o contêiner (`--rm`) após a finalização.
    ```bash
    docker run --rm calculadora-imc-tests
    ```