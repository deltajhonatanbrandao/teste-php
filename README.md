Documentação: Criar sistema de formulário php usando banco de dados postgresql

Passo 1: Iniciar um Contêiner PostgreSQL
Execute o seguinte comando para iniciar um contêiner PostgreSQL:

## Criando Container POstgresql
docker run --name meu-postgres -e POSTGRES_PASSWORD=12345678 -d postgres

## Visualizando se esta UP
docker ps

Passo 2: Criar a Tabela usuarios no Banco de Dados
## Entrando no container 
docker exec -it meu-postgres bash
## Dentro do container autentique
psql -U postgres -d postgres

## Crie a tabela usuarios para o sistema teste
CREATE TABLE usuarios (
    id SERIAL PRIMARY KEY,
    nome VARCHAR(100),
    email VARCHAR(100)
);

## Visualize a tabela criada
SELECT * FROM usuarios;
## Saindo do container
 Ctrl + D ou execute o comando \q.


## Crie o Dockerfile para o Sistema php

* No diretório S1 se encontra um sistema de formulário em PHP contendo a autenticação ao banco de dados Postgresql ( Atenção ao hostname do banco é o IP ou nome do container postgresql)

* No diretório volume-data é o volume persistente para o banco de dados

*  O Dockerfile para o sistema esta no diretório S1

## Comando para criar a imagem do sistema
docker build -t meu-sistema:v1 .

## Comando para Criar o container do sistema

docker run -d --name meu-sistema -p 8080:80  meu-sistema:v1

## verificando o status do container
docker ps

## Entrando no container
docker exec -ti meu-sistema bash

OBS: O seu sistema deverá estar em /var/www/html/ de acordo com a copia no Dockerfile

OBS: No código aponte o IP do container do banco ou nome

