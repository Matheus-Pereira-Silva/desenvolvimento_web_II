## Iniciando o projeto

Para poder abrir o projeto, você precisa executar os seguintes comandos no terminal com o projeto aberto (e tendo PHP && Composer instalados em sua máquina):

### Para instalar as dependências:
```bash
composer install
```

### Para instalar as dependências do Node.js:
```bash
use npm install
```

### Criar uma cópia do arquivo .env.example e renomeá-la para .env:
```bash
cp .env.example .env
```

### Gerar uma nova chave de aplicação:
```bash
php artisan key:generate
```

### Executar as migrações para criar as tabelas no banco de dados:
```bash
php artisan migrate
```

### Para servir o projeto na porta default:
```bash
php artisan serve
```

## Criando o banco de dados no MYSQL:
```bash
create database bd_laravel;
```

### Entrar no banco:
```bash
use bd_laravel;
```

## Execute o comando para realizar a migration (terminal):

Para poder realizar esse processo, vocÊ precisa configurar as variáveis de ambiente do projeto no arquivo .env e informar qual banco de dados será utilizando quanto as configurações de localhost, portas, nome do banco (de acordo com o que foi criando no MYSQL) e a senha (caso precise).

```bash
php artisan migrate
```

### Para instalar as dependências do Node.js:
```bash
use npm install
```

### Para compilar os assets para desenvolvimento:
```bash
use npm run build
```

### Para compilar os assets para desenvolvimento:
```bash
use npm run build
```

### Para rodar o servidor:
```bash
use npm run dev
```
### Para rodar o servidor local:
```bash
php artisan serve
```

## Integrantes:
-Matheus Pereira
-Luiz Fernando Kerico





