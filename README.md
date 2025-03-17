## Requirements:

-   Laravel (PHP)
-   Vue.js
-   Bootstrap
-   MySQL

## Task:

-   Create a simple Todo application.

## Features:

-   User authentication (registration, login, logout).
-   Users can create, edit, delete, and mark tasks as complete.
-   Display tasks in a responsive interface using Bootstrap.

## Deliverables:

-   Laravel API backend.
-   Vue.js frontend.

# Coisas a serem feitas

-   [x] Autenticação
-   [x] Pensar na estrutura das tabelas tasks
-   [x] Registro de usuários
-   [ ] CRUD de tasks
    -   [ ] Arrumar listagem só permitir listar se for o usuário da task, não esta vindo task alguma
    -   [ ] Fazer visualização
    -   [ ] Editar
    -   [ ] Exclusão
-   [ ] Mehoria de UX
    -   [ ] Procurar tasks por dia, ao selecionar na data do calendario.
    -   [ ] Quando o usuário tentar entrar em uma tela e não estiver logado retornar erro com snackbar
-   [x] Validação de formulários, procurar uma lib
    -   [x] Validar email correto
    -   [ ] Validar login
    -   [ ] Validar criação e edição de tasks
    -   [ ] Fazer login com google
-   [ ] Estilização com bootstrap
    -   [ ] Mudar as fontes
    -   [ ] Deixar responsivo para celular e computador
-   [ ] Melhorar como retorna erro e feedback de sucesso, ver se bootstrap tem algo similar ao snackbar do mui
-   [ ] Deploy

# Ideas para o app

-   Colocar uma barra de progresso para saber quantas tasks criadas ja foram resolvidas
-   Adicionar um calendario para clicar e ir para o dia que pode adicionar as tasks

# Template a ser seguido

-   https://dribbble.com/shots/19752197-Task-Management-App

## Exemplo de app todolist

-   https://app.todoist.com/app/today

# Artigos importantes

-   https://dev.to/fidalmathew/async-vs-defer-in-javascript-which-is-better-26gm
-   [Modelo de api restful com laravel e vue-js](https://medium.com/@cesarkohl/vue-js-laravel-restful-api-application-cbd2af3a888c)
-   [Modelo de autenticação com sanctum](https://www.itsolutionstuff.com/post/laravel-12-rest-api-authentication-using-sanctum-tutorialexample.html)
-   procurar sobre code pattern e clean architecture em laravel e vue
