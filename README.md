# Projeto de Curso Livewire 3, do LaravelDaily, com algumas modificações.

## Página do curso:

https://laraveldaily.com/course/livewire-3?mtm_campaign=search-tag-course

## Tópicos abordados no curso:

1. Forms, Hooks, $set e $toggle
2. Exemplo prático de CRUD
3. SPA e Parent-Child Components
4. Exemplo de CRUD mais alargado, uploads.
5. Parent-Child form, select components.
6. Testes automáticos com Livewire

### 1. Forms, Hooks, $set e $toggle

Podem ser consultados com a rota `/posts`.

A classe `App\Livewire\PostEdit` implementa as funcionalidades.

### 2. Exemplo prático de CRUD

Podem ser consultados com a rota `/products`.

As classes `App\Livewire\ProductList` e `App\Livewire\ProductEdit` implementam as funcionalidades.

### 3. SPA e Parent-Child Components

Podem ser consultados com a rota `/tasks`.

A classe `App\Livewire\TaskList` implementa as funcionalidades.

### 4. Exemplo de CRUD mais alargado, uploads.

Extensão e refatoração do exemplo 2.

### 5. Parent-Child form, select components.

Podem ser consultados com a rota `/countries`.

A classe `App\Livewire\CountryList` implementa as funcionalidades.

### 6. Testes automáticos com Livewire

Foram criados os testes `CreatePostTest`, `ShowDashboardTest` e `UrlQueryParameterTest`.

## Modificações

Algumas modificações foram feitas no projeto original:

- Foi adicionado CRUD às categorias de produtos.
- Os produtos tem o preço formatado em euros.
- Foi adicionado o `CountrySeeder` e `CitySeeder` para popular a base de dados.
- Foram adicionados outros campos ao `Country` e `City` models.

## Estado

[![Laravel](https://github.com/lcloss/livewire3daily/actions/workflows/laravel.yml/badge.svg)](https://github.com/lcloss/livewire3daily/actions/workflows/laravel.yml)

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
