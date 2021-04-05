<p align="center"><a href="https://www.soluti.com.br/" target="_blank"><img src="https://www.soluti.com.br/media/logo/stores/1/Logo_horizontal_23x.png" width="400"></a></p>

## Sobre o teste

* Refatorar o código da parte 1.
* Cadastro de usuário.
* Leitura de um certificado digital.
* Login de usuário.
* Arquitetura Cliente-Servidor, fazendo uso da arquitetura REST.
* CPF deve ser único.
* Email deve ser único.
* Login deverá ser feito usando Email e Senha.
* Qualquer um pode se cadastrar na aplicação.
* O usuário pode fazer upload de um certificado (PEM).
* ~~Certificado só é visível para o dono da conta (do certificado)~~.
* O envio do arquivo PEM do cliente (frontend) para o servidor (backend) e apresentar as informações do certificado.
* Prazo de validade do certificado.
* DN.
* Issuer DN.
* ~~É necessário criar um arquivo de LOG, trilhando as principais ações da aplicação~~.
* Necessário documentar api REST fazendo uso do Swagger ou Blueprint.
* Banco de dados deverá ser relacional MYSQL.

## Tecnologia utilizadas

- Linguagens: JS e PHP
- Front-End: Vue.js e Tailwind
- Back-End: Laravel
- Banco: MySql

## Requisitos

- Banco MySql, Node e Composer instalados na máquina.

## Instalação

Front: 
- npm install

Back:
- composer install
- Renomear o arquivo .env.example para .env e configurar com os dados de acesso a o banco de dados MySql
- php artisan key:generate
- php artisan migrate

## Como rodar

Front: npm run serve
- localhost:8000

Back: php artisan serve
- localhost:8080

## Sobre o projeto

No projeto foi construído o CRUD de usuários, autenticação de usuário, leitura do certificado, onde que no Back foi criado a API Restful para que o Front possa consumir essa API.

## Fluxo do projeto

- Back: route -> controller -> request -> resource -> service -> model
- Front: route -> page -> componentes -> vuex -> axios

## O que foi feito

- Layout agradável em TailwindCSS.
- SPA em Vue.js.
- API Restful em Laravel.
- CRUD Usuários.
- Autenticação de usuários.
- Leitura do certificado.
- Documentação API <a href="https://documenter.getpostman.com/view/8741536/TzCQam2M">https://documenter.getpostman.com/view/8741536/TzCQam2M</a>

## Pendências

- Retorno de falha na validação da requisição no Front.
- Certificado visível por usuários (TENANT).
- Log da aplicação
- Documentar api REST no Swagger ou Blueprint
- Envio do certificado via form data no front end.

## Melhorias

- Máscaras para os campos de entrada.
- Responsividade.
- Confirmar senha.

## Observações

- Enviar o certificado via requisição manualmente pelo postman

<img src="https://i.ibb.co/kyHWJtD/print.png">

