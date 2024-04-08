# Tarefas API

Este é um projeto Laravel que implementa uma API RESTful e um CMS básico para gerenciar tarefas (Tasks).

## Descrição do Projeto

A API permite aos usuários realizar operações CRUD (Criar, Ler, Atualizar, Excluir) em uma entidade chamada "Tarefas". Cada tarefa possui um título, uma descrição e um status (pendente, concluída, cancelada).

## Funcionalidades

- **CRUD de Tarefas:** Os usuários podem criar, ler, atualizar e excluir tarefas.
- **Listagem de Tarefas:** Os usuários podem visualizar todas as tarefas existentes.
- **Detalhes da Tarefa:** Os usuários podem visualizar os detalhes de uma tarefa específica.
- **Atualização de Tarefa:** Os usuários podem atualizar os detalhes de uma tarefa existente.
- **Exclusão de Tarefa:** Os usuários podem excluir uma tarefa existente.

## Princípios SOLID

Este projeto segue os princípios SOLID, um conjunto de diretrizes de design de software que visam tornar o código mais compreensível, flexível e fácil de manter. Aqui está como os princípios SOLID foram aplicados neste projeto:

- **S (Single Responsibility Principle):** Cada classe tem uma única responsabilidade e um único motivo para mudar. Isso torna o código mais modular e fácil de entender.

- **O (Open/Closed Principle):** O código é aberto para extensão, mas fechado para modificação. Isso significa que novas funcionalidades podem ser adicionadas sem alterar o código existente.

- **L (Liskov Substitution Principle):** As classes derivadas podem ser substituídas por suas classes base sem afetar o comportamento do programa. Isso permite que o código seja mais flexível e extensível.

- **I (Interface Segregation Principle):** Interfaces específicas são preferíveis a interfaces gerais. Isso evita que as classes dependam de funcionalidades que não utilizam.

- **D (Dependency Inversion Principle):** As dependências são injetadas nas classes em vez de serem criadas dentro delas. Isso torna o código mais desacoplado e facilita a substituição de implementações.

A aplicação desses princípios ajuda a garantir que o código seja mais modular, extensível e fácil de manter, promovendo boas práticas de desenvolvimento de software.


## Instalação

1. Clone o repositório:

```bash
git clone https://github.com/tarciziowalter/tasks-api.git
```

2. Instale as dependências:

```bash
composer install
```

3. Copie o arquivo .env.example para .env e configure as variáveis de ambiente, incluindo a conexão com o banco de dados.

4. Gere uma nova chave de aplicativo:

```bash
php artisan key:generate
```

5. Execute as migrações do banco de dados para criar as tabelas necessárias:

```bash
php artisan migrate
```

6. Opcional: Se desejar, você pode adicionar dados fictícios ao banco de dados usando os seeders:

```bash
php artisan db:seed
```

7. Inicie o servidor de desenvolvimento:

```bash
php artisan serve
```

## Uso

Você pode usar o Postman ou qualquer outra ferramenta de cliente HTTP para enviar solicitações à API. Abaixo estão os endpoints disponíveis:

- **POST /api/login:** Autenticação da aplicação
- **POST /api/logout:** Logout da aplicação
- **GET /api/me:** Recupera os dados da sessão.
- **GET /api/tasks:** Retorna todas as tarefas.
- **POST /api/tasks:** Cria uma nova tarefa.
- **GET /api/tasks/{id}:** Retorna os detalhes de uma tarefa específica.
- **PUT /api/tasks/{id}:** Atualiza os detalhes de uma tarefa específica.
- **DELETE /api/tasks/{id}:** Exclui uma tarefa específica.

Certifique-se de incluir os cabeçalhos `Authorization: Bearer {token}`, `Accept: application/json` em todas as solicitações para endpoints, exceto na rota login.


## Tests/Feature

Além disso, foram criados testes automatizados no diretório tests/Feature para garantir a integridade e a funcionalidade da aplicação. Estes testes podem ser executados  individualmente para verificar se todas as funcionalidades estão operando conforme o esperado.

```bash
php artisan test --filter test_authenticated_user_can_create_task
php artisan test --filter test_authenticated_user_can_view_task_details
php artisan test --filter test_authenticated_user_can_view_all_tasks
php artisan test --filter test_authenticated_user_can_update_task
php artisan test --filter test_authenticated_user_can_delete_task
```

## Contribuição

Contribuições são bem-vindas! Se você quiser melhorar este projeto, por favor, abra uma issue ou envie uma solicitação pull.

## Licença

Este projeto está licenciado sob a MIT License.

## Autor

Este projeto foi desenvolvido por [Tarcízio Walter](https://github.com/tarciziowalter). Você pode entrar em contato com o autor por e-mail em [tarciziowalter@outlook.com](mailto:tarciziowalter@outlook.com) ou seguir no [LinkedIn](https://linkedin.com/in/tarciziowalter).
