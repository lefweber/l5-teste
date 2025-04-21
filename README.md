# Projeto de API de Filmes e Catálogo Web Star Wars (Teste Técnico)

Este é um projeto desenvolvido como um **teste técnico**, que combina funcionalidades de uma **API RESTful** com um **catálogo web** para exibição de filmes em PHP puro.

## Regras

- O layout da aplicação livre;
- Exibições em telas distintas, deverá ser possível acessar os detalhes e voltar ao catálogo de filmes;
- Em seu backend, crie uma api para consumir a api do Star Wars, podendo utilizar a biblioteca cURL, por exemplo;
- A idade dos filmes deverá ser calculada no backend;
- Seu frontend deve fazer requisições para sua própria api local;
- Crie endpoints distintos para cada tipo de requisição;
- Usar a criatividade e criar mais três features que não estão nesta descrição;
- Utilizar o banco para guardar mais informações, caso tenha necessidade, como erros de retorno da api, por exemplo;
- Estruturar o projeto no padrão MVC;
- Utilizar o PHP 7.4;
- Utilizar Programação Orientação a Objeto;
- Você **não poderá utilizar frameworks** no PHP, o código terá de ser 100% seu;
- A cada vez que houver interação com a api do projeto, guarde um log na base de dados com dados como: data/hora e solicitação realizada.

## Descrição
O projeto foi baseado na API externa [Star Wars API (SWAPI)](https://swapi.dev/) como fonte de informações sobre filmes da saga Star Wars.

A aplicação exibe todos os filmes da saga em um catálogo ordenado por data de lançamento, mostrando:

- Nome do filme;
- Data de lançamento;
- Resumo.

Ao clicar em "Mais Detalhes", o usuário visualiza uma página detalhada contendo:

- Nome do filme;
- Sinopse;
- Nº do episódio;
- Data de lançamento;
- A idade do filme em anos, meses e dias (calculada no back-end).
- Diretor(a);
- Produtor(es);
- Nome dos personagens;
- Botão de Like e Dislike;
- Indicativo de visualizações.

## Funcionalidades Adicionais

Além do requisito básico, foram implementadas as seguintes **features opcionais**:

- Busca simples de filmes;
- Possibilidade de dar **like** e **dislike** em filmes;
- Contagem de visualizações (views) de cada filme;
- Registro de logs de erros e eventos relevantes no banco de dados.

## Tecnologias Permitidas no teste

- PHP (7.4 ou superior)
- MySQL
- JavaScript
- HTML
- CSS
- JQuery
- Bootstrap

## Estrutura do Projeto

O projeto foi desenvolvido com uso de **Orientação a Objetos (OO)** e segue o padrão **MVC** para separação de responsabilidades.

## Recursos Internos

- Banco de dados para armazenar informações sobre filmes, logs de erros e eventos.
- Biblioteca cURL para integração com a API externa SWAPI.
- Docker Compose com uma imagem do MySQL para configuração rápida do ambiente.
- Ao rodar **composer install**, a migração criará automaticamente o banco de dados e o alimentará com os registros iniciais.

## Requisitos

- PHP 7.4 ou superior instalado na máquina.
- Banco de dados MySQL ou MariaDB (caso deseje, pode utilizar o docker-compose do projeto).
- Docker (opcional, para uso do Docker Compose).
- Composer (para gerenciamento de dependências).

## Instruções

1. **Com o terminal na pasta do projeto, configure as variáveis de ambiente:**
Copie o arquivo .env.example para .env e configure suas variáveis de ambiente, definindo o acesso ao banco de dados.

```bash
cp .env.example .env
```

2. **Rode o container:**
Se estiver utilizando Docker, suba o container MySQL.

```bash
docker compose up
```

3. **Instale as dependências e rode a migração:**

```bash
composer install
```

Ao rodar o comando acima ou **composer update**, por conveniência após a instalação das dependências, um script sempre realiza o seguinte:

- Cria as pastas **public/css** e **public/js** se não houver;
- Copia o arquivo **bootstrap.min.css** para **public/css**;
- Copia os arquivos **bootstrap.bundle.min.js** e **jquery.min.js** para **public/js**;
- Roda a migração localizada em **database/migrate.php** para criação do banco de dados e tabelas.

#### Observação Importante

No caso de erro na migração, como este abaixo:

```bash
> php database/migrate.php
Erro na migração!
could not find driver
Script php database/migrate.php handling the post-install-cmd event returned with error code 1
```

É necessário instalar o driver do PDO. Rode o comando:

```bash
sudo apt install php-mysql
```

Agora rode novamente:

```bash
composer install
```

#### Dependências de Ambiente de Desenvolvimento

Além do módulo acima <em><strong>php-mysql</em></strong>, também é necessário o <em><strong>php-curl</em></strong>.

4. **Inicie o servidor embutido do PHP:**

```bash
php -S localhost:8000 -t public
```

5. **Acesse a aplicação no navegador:**

```bash
xdg-open http://localhost:8000/
```

## Exemplo de Uso da API

Adicionar like a um filme:
PATCH /api/v1/like/{id}

Adicionar dislike a um filme:
PATCH /api/v1/dislike/{id}

## Licença

Este projeto está licenciado sob a **MIT License**.
