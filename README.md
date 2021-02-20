##### PROJETO DE ESTUDOS LAVAVEL 6 #####

##### FEITO COM UTILITÁRIO LARADOCK #####

Rodar os seguintes comandos em um diretório `laradock`:


> git clone https://github.com/Laradock/laradock.git

Entre no diretório do `laradock` e copie:

> cp env-example .env

Realize as configurações no arquivo `.env` conforme informações no projeto:

> DB_PORT=3306
> DB_DATABASE=curso_laravel
> DB_USERNAME=root
> DB_PASSWORD=root

Suba os containers:

> docker-compose up -d nginx mysql phpmyadmin