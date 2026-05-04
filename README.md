# Vue + Symfony + CodeIgniter Challenge

## Como clonar o projeto

No terminal:

```
git clone https://github.com/daniel-alcar/vue-symfony-codeigniter-challenge.git
cd vue-symfony-codeigniter-challenge
````

## Como executar

### CodeIgniter

```
cd backend-codeigniter
php -S localhost:8080
```

### Symfony

```
cd backend-symfony
symfony php -S localhost:8000 -t public
```

### Vue.js

```
cd frontend-vue
npm install
npm run dev
```

## URLs

### CodeIgniter

* (http://localhost:8080/api/projects) (GET)
* (http://localhost:8080/api/projects) (POST)
* (http://localhost:8080/api/projects/{id}) (GET)

### Symfony

* (http://localhost:8000/api/projects) (GET)
* (http://localhost:8000/api/projects) (POST)
* (http://localhost:8000/api/projects/{id}) (GET)

### Vue

* (http://localhost:5173)

## Arquitetura

- O frontend em Vue consome APIs REST para interação com o usuário
- O backend em Symfony atua como intermediário, consumindo a API do CodeIgniter
- O CodeIgniter é responsável pela comunicação direta com o banco de dados MySQL
- A comunicação entre os serviços ocorre via HTTP utilizando JSON


Agora está **100% padrão README** 👍
```
