# PHP Access Logs

Um script PHP simples e eficaz para registrar o acesso de usuários aos módulos da sua aplicação, ideal para monitoramento e auditoria de segurança.

## Visão Geral

Este projeto foi desenvolvido para oferecer uma solução leve e de fácil implementação para o rastreamento de atividades de usuários em sistemas PHP. Ele permite registrar quem acessou, o que foi acessado e quando, salvando os dados em um arquivo de log para análise posterior. A simplicidade do script o torna uma ferramenta poderosa para desenvolvedores que buscam adicionar uma camada extra de segurança e monitoramento sem introduzir dependências complexas.

## Objetivos do Projeto

O principal objetivo do `PHP Access Logs` é resolver a necessidade de um sistema de log de acesso que seja:

* **Simples de integrar:** Adicione a funcionalidade de log com poucas linhas de código.
* **Leve e performático:** Não sobrecarrega a aplicação com processos complexos.
* **Claro e informativo:** Gera logs legíveis e com as informações essenciais para auditoria.

## Principais Funcionalidades

* **Registro de Acesso:** Captura o nome do usuário (logado ou visitante), o módulo acessado e o timestamp exato do acesso.
* **Geração de Logs:** Cria e atualiza um arquivo de log (`logs.txt`) com cada novo registro de acesso.
* **Orientado a Objetos:** A estrutura em classe (`accessLogs`) torna o código organizado, reutilizável e fácil de manter.
* **Flexibilidade:** Pode ser facilmente adaptado para registrar informações adicionais, como endereço IP, tipo de requisição (GET, POST), entre outros.

## Tecnologias e Boas Práticas

* **Linguagem:** PHP 7+
* **Paradigma:** Programação Orientada a Objetos (POO)
* **Boas Práticas:**
    * **Encapsulamento:** As propriedades da classe são privadas, e o acesso é feito por meio de métodos públicos, garantindo a integridade dos dados.
    * **Código Limpo:** A estrutura do código é clara e concisa, facilitando o entendimento e a manutenção.
    * **Reusabilidade:** A classe `accessLogs` foi projetada para ser facilmente instanciada e utilizada em qualquer parte de um projeto PHP.

## Arquitetura e Estrutura

A solução é centralizada na classe `accessLogs.php`, que pode ser incluída em qualquer parte do projeto. A estrutura de diretórios sugerida para o funcionamento padrão é:

```
seu-projeto/
|-- includes/
|   |-- logs/
|   |   |-- logs.txt  (Arquivo gerado automaticamente)
|-- modules/
|   |-- (Seus módulos, ex: painel.php, produtos.php)
|-- accessLogs.php
|-- index.php
```

## Instalação e Configuração

1.  **Copie o arquivo:** Faça o download do arquivo `acessLogs.php` e coloque-o na raiz do seu projeto ou em um diretório de sua preferência.

2.  **Crie a pasta de logs:** Certifique-se de que o diretório `../includes/logs/` exista (relativo à localização do `acessLogs.php`) e que o servidor tenha permissão de escrita nesse diretório.

## Exemplo de Uso

Para registrar um acesso, basta incluir a classe, instanciar um objeto e chamar o método `writeLog()`.

**Exemplo em um módulo `painel_administrativo.php`:**

```php
<?php
// Suponha que o nome de usuário venha de uma sessão
session_start();
$usuarioLogado = isset($_SESSION['username']) ? $_SESSION['username'] : null;

// Inclui a classe de logs
require_once('../acessLogs.php');

// Tenta registrar o acesso
try {
    // Instancia a classe, passando o usuário e o nome do módulo
    $log = new accessLogs($usuarioLogado, 'Painel Administrativo');
    
    // Escreve o registro no arquivo de log
    $log->writeLog();

} catch (Exception $e) {
    // Trate possíveis erros ao escrever o log
    error_log('Erro ao gravar log de acesso: ' . $e->getMessage());
}
```

## Resultado no arquivo logs.txt;
```
O Usuário nome_do_usuario acessou o modulo 'Painel Administrativo' em 21-08-2025 23:33:01
O Usuário  Visitante acessou o modulo 'Painel Administrativo' em 21-08-2025 23:34:10
```

## Possíveis Melhorias Futuras

Este projeto serve como uma base sólida que pode ser expandida com novas funcionalidades, tais como:

* **Integração com Banco de Dados:** Salvar os logs em uma tabela de um banco de dados (MySQL, PostgreSQL) para facilitar a consulta e a geração de relatórios.
* **Níveis de Log:** Implementar diferentes níveis de log (INFO, WARNING, ERROR) para categorizar os eventos.
* **Registro de IP:** Adicionar o registro do endereço IP do usuário para uma camada extra de segurança.
* **Rotação de Logs:** Criar um sistema para arquivar logs antigos (ex: `logs-2025-08.txt`) e evitar que o arquivo principal se torne muito grande.
* **Interface de Visualização:** Desenvolver uma interface web simples para visualizar, filtrar e pesquisar os logs.

