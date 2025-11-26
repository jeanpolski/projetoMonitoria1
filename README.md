# Monitoria FATEC PG

Sistema de gerenciamento de monitorias para alunos e monitores da faculdade. Permite agendamento de sessões, avaliações entre pares e visualização de disponibilidade.

## Instalação

Clone o repositório e configure as variáveis de ambiente:

\`\`\`bash
git clone https://github.com/jeanpolski/projetoMonitoria1
cd projetoMonitoria1
cp .env.example .env
\`\`\`

Configure o banco de dados no `.env`:

\`\`\`
DB_CONNECTION=mysql
DB_DATABASE=seu_banco_aqui
DB_USERNAME=root
DB_PASSWORD=sua_senha
\`\`\`

Instale as dependências e inicie o servidor:

\`\`\`bash
composer install
php artisan key:generate
php artisan migrate
php artisan serve
\`\`\`

Acesse a aplicação em `http://localhost:8000`

## Tecnologias

- **Backend**: Laravel 11, PHP, Eloquent ORM, Laravel Breeze
- **Frontend**: Blade, Bootstrap, TailwindCSS, JavaScript
- **Banco**: MySQL
- **Versionamento**: Git

## Funcionalidades

- Autenticação de usuários (alunos e monitores)
- CRUD completo de monitorias, matérias, horários e avaliações
- Sistema de avaliações em tempo real
- Controle de permissões por tipo de usuário
- Design responsivo
- Rotas protegidas com middleware

## Próximas melhorias

- Histórico de monitorias por usuário
- Painel administrativo expandido

## Principais rotas

| Rota | Descrição |
|------|-----------|
| `/` | Página inicial |
| `/about` | Sobre o projeto |
| `/sessions` | Todas as monitorias |
| `/sessions/{id}/rate` | Avaliar uma monitoria |
| `/monitors` | Lista de monitores |
| `/monitors-create` | Cadastrar novo monitor |
| `/availability` | Grade de horários |
| `/subjects` | Matérias disponíveis |
| `/register` | Criar conta |
| `/login` | Fazer login |

## Detalhes técnicos

- Bootstrap e TailwindCSS integrados
- Avaliações com JavaScript + Fetch API (CSRF protegido)
- CRUD implementado com Eloquent ORM
- Versionamento completo no Git
