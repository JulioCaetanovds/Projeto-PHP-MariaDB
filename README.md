# Lavagem Automotiva

## Descrição
Este projeto é um sistema simples para gerenciamento de lavagem automotiva, permitindo o cadastro de clientes, veículos, agendamento de serviços, entre outras funcionalidades.

## Funcionalidades

- Cadastro de Clientes
- Cadastro de Veículos
- Agendamento de Serviços

## Requisitos

- XAMPP ou similar (para executar o servidor localmente)
- Banco de dados MySQL

## Configuração

1. Clone o repositório.
2. Importe o script SQL fornecido para criar o banco de dados.
3. Configure o arquivo `conexão.php` com as credenciais do seu banco de dados.

## Execução

1. Inicie o servidor local (XAMPP, por exemplo).
2. Abra o navegador e acesse `http://localhost/seu_diretorio`.
3. Explore as funcionalidades através da interface web.

## Estrutura do Projeto

- `CadastroCli.php`: Página de cadastro de clientes.
- `CadastroVeic.php`: Página de cadastro de veículos.
- `Agendamento.php`: Página de visualização e agendamento de serviços.
- `AgendamentoFormInsert.html`: Formulário para agendar novos serviços.
- `ClienteFormInsert.html`: Formulário para cadastrar novos clientes.
- `VeiculoFormInsert.html`: Formulário para cadastrar novos veículos.
- `AgendamentoFormEditar.php`: Formulário para editar agendamentos.

## Autor

Júlio Caetano Vieira dos Santos

## Licença

Este projeto é distribuído sob a licença MIT. Consulte o arquivo [LICENSE](LICENSE) para obter detalhes.