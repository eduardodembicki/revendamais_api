<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 1500 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

# CRUD - Laravel + Vue.js
Repositório criado com o objetivo de apresentar um simples CRUD utilizando Laravel + Vue.js. A aplicação consiste no gerenciamento de CEP.

## Instalação e configuração
Para realizar a instalação deste repositório, faça os seguintes passos em seu terminal:

Clone o repositório em uma pasta  
```
git clone https://github.com/eduardodembicki/revendamais_api.git
```


Faça a configuração do banco de dados  
```
vim .env
```

Gere uma chave para a sua aplicação  
```
php artisan key:generate
```

Faça a migração das bases de dados  
```
php artisan migrate --seed
```

## Iniciando a aplicação
Você pode iniciar a aplicação através do comando:  
```
php artisan serve
```

## API endpoints

### Listar CEP
```
GET /api/cep
```
Você também pode filtrar os produtos utilizando alguns campos especiais na URL  
```
GET /api/cep/{cep} // Irá fazer uma busca pelo cep
GET /api/fuzzy/{qualquer_coisa} // Irá filtrar a busca por qualquer valor dentro de cep e logradouro

```

### Adicionar CEP
Para adicionar um cep, faça uma chamada **POST** para o endereço abaixo  
```
POST /api/cep
```
Os seguintes campos são necessários para adicionar um produto  
- cep (Obrigatório, único)
- logradouro (Obrigatório)

### Editar CEP
Para editar um cep faça uma chamada **PUT/PATCH** para o endereço abaixo, substituindo o parâmetro **{id}** pelo ID do cep  
```
PUT|PATCH /api/cep/{id}
```

### Remover CEP
Para remover um cep faça uma chamada **DELETE** para o endereço abaixo, substituindo o parâmetro **{id}** pelo ID do cep  
```
DELETE /api/cep/{id}
```
