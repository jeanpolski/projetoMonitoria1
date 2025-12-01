# Sistema de Monitoria FATEC PG

Sistema de gerenciamento de monitorias para a FATEC de Praia Grande. Plataforma que conecta alunos monitores com estudantes para organizar sessões de acompanhamento acadêmico.

## Início Rápido

### Pré-requisitos
- PHP 8.4+
- Composer 2.8+
- MySQL 8.0+
- Laravel 12+

### Instalação

```bash
git clone https://github.com/jeanpolski/projetoMonitoria1
cd projetoMonitoria1
cp .env.example .env
composer install
php artisan key:generate
```

### Configuração

Configure o arquivo `.env`:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=example
DB_USERNAME=root
DB_PASSWORD=
```

Inicie a aplicação:

```bash
php artisan migrate
php artisan serve
```

Acesse em `http://localhost:8000/`

## Tecnologias

- Backend: Laravel (PHP), Laravel Breeze, Eloquent ORM
- Frontend: Blade, TailwindCSS, Bootstrap, JavaScript, AJAX, HTML5, CSS3
- Banco de Dados: MySQL
- Versionamento: Git, GitHub

## Funcionalidades

- Autenticação e autorização por tipo de usuário
- Gerenciamento de monitorias, matérias e horários
- Sistema de avaliações em tempo real
- Controle de permissões (Monitor, Aluno)
- Interface responsiva
- Proteção CSRF

## Tipos de Usuário

- **Monitor**;
- **Aluno**;
- **Visitante**;

## Rotas Principais

- `GET /` - Página inicial
- `GET /about` - Sobre
- `GET /sessions` - Listagem de monitorias
- `POST /sessions/{id}/rate` - Avaliar monitoria
- `GET /monitors` - Listagem de monitores
- `POST /monitors/create` - Autenticação de monitores
- `GET /subjects` - Listagem de matérias
- `GET /availability` - Gerenciar horários
- `POST /register` - Cadastro
- `POST /login` - Autenticação

## Notas
