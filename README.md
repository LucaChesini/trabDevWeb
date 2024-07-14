# Configuração
Inicialize as dependências do composer
```
composer install
```
Copie o .env do projeto
```
cp .env.example .env
```
Gere a chave de encriptação do laravel
```
php artisan key:generate
```
Atualize as migrations
```
php artisan migrate
```
Criar link do storage
```
php artisan storage:link
```