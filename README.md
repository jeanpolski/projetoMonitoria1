# Projeto de Monitoria

O objetivo do projeto é fornecer uma plataforma simples e eficiente para gerenciar sessões de monitoria, permitindo que **alunos** e **monitores** interajam de forma organizada.  
A aplicação oferece cadastro, gerenciamento de disponibilidade, agendamento de sessões e sistema de avaliação após cada monitoria concluída.

---

## 🚀 Como rodar o projeto

### 1️⃣ Clonar e configurar o ambiente

git clone https://github.com/jeanpolski/projetoMonitoria1  
cd projetoMonitoria1  
cp .env.example .env  

### 2️⃣ Configurar o arquivo `.env`

Atualize:

- DB_CONNECTION=mysql  
- DB_DATABASE=<NOME_DO_BANCO>  
- DB_USERNAME=<USUARIO>  
- DB_PASSWORD=<SENHA>  

Remova comentários sobre banco, caso existam.

### 3️⃣ Preparar o ambiente

composer install  
php artisan key:generate  
php artisan migrate  
php artisan serve  

A aplicação estará disponível em:  
http://localhost:8000

---

## 🧩 Tecnologias Utilizadas

### 🔹 Backend e Estrutura
- **Laravel (PHP)** — Framework principal.
- **Eloquent ORM** — Manipulação das tabelas.
- **Middleware (`auth`)** — Proteção de rotas.
- **Laravel Breeze** — Autenticação completa.
- **Composer** — Gerenciamento de dependências PHP.

### 🔹 Frontend
- **Blade** — Template engine.
- **JavaScript (Vanilla)** — Funções de interação.
- **AJAX (Fetch API)** — Envio de avaliações sem recarregar a página.
- **HTML5 e CSS3** — Estrutura e estilo.
- **TailwindCSS** — Em telas de login/registro via Breeze.
- **Bootstrap** — Layout das páginas internas.

### 🔹 Banco de Dados
- **MySQL**

### 🔹 Versionamento
- **Git + GitHub**

---

## 📘 Diário de Progressão

### ✅ Concluído
- CRUD completo das entidades:
  - Monitores  
  - Sessões  
  - Matérias  
  - Disponibilidade  
  - Avaliações  
  - Usuários  
- Telas protegidas com middleware `auth`
- Sistema de avaliação usando AJAX
- Login e registro com Laravel Breeze
- Layout responsivo com Bootstrap
- Migrations e models configurados

### 🛠️ A fazer
- [x] Refinar visual mobile/desktop  
- [x] Criar permissões específicas para aluno x monitor  
- [ ] Restringir avaliação ao aluno disciplinado
- [ ] Histórico de sessões por usuário  
- [ ] Criar painel administrativo mais detalhado  

---

## 🗺️ Navegação do Sistema

**/** — Página inicial  
**/sessions** — Lista de sessões  
**/sessions/{id}/rate** — Avaliação da sessão  
**/monitors** — Cadastro de monitores  
**/availability** — Grade de horários  
**/subjects** — Matérias cadastradas  
**/register-monitor** — Área para criação de login de monitor, protegida por autenticação
**/register** — Área para criação de login de aluno
**/login** - Área para login de aluno/monitor

---

## 📋 Notas
- O sistema utiliza **Bootstrap** nas telas internas e **TailwindCSS** nas telas geradas pelo Breeze.  
- O rating usa JavaScript + Fetch API com CSRF protection.  
- Todo CRUD foi feito com Eloquent ORM.  

---
