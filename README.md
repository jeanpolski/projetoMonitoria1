# Projeto de Monitoria

O objetivo do projeto é fornecer uma plataforma de fácil gestão e manuseio, onde usuários, monitores ou alunos possam exercer e prestar sua função de forma mais dinâmica e organizada.

---

## 🚀 Como rodar?

```bash
git clone https://github.com/jeanpolski/projetoMonitoria1
cd <DIRETORIO_DO_REPOSITORIO>
cp .env.example .env
```

1. Abra o arquivo `.env` e altere:

   * `DB_DATABASE=<NOME_DO_SEU_BANCO>`
   * `DB_CONNECTION=<BANCO_DE_DADOS>` — (usei `mysql` no meu caso)
2. Remova quaisquer comentários relacionados ao DB (se houver).
3. Abra o XAMPP e inicie o **Apache** e o **MySQL**.
4. Crie um banco de dados com o mesmo nome usado em `DB_DATABASE`.

Em seguida, execute:

```bash
php artisan key:generate
composer install
php artisan migrate
php artisan serve
```

---

## 📘 Diário de Progressão

### ✅ Feito:

* Construído CRUD.
* Banco de dados: **MySQL**.
* Tabelas de **Monitores**, **Matérias**, **Sessões**, **Disponibilidade**, **Avaliações** e **Usuários**.
* Models:

  * `MonitoriaAvailability`
  * `Rating`
  * `Session`
  * `Subject`
  * `Monitors`

### 🛠️ A fazer:

* [ ] **Refinar Views**: refinar visualização mobile/desktop de algumas telas.
* [ ] **Autenticação**: diferenciar alunos de monitores e suas permissões.

### 🗺 Navegação:

* / -- Página Inicial.
* /sessions -- Mostra sessões marcadas pelos monitores.
* /sessions/id/rate -- Usuários podem avaliar uma sessão já concluída.
* /monitors -- Registra monitores e valida o Aluno como um.
* /availability -- Mostra horário semanal de atuação do monitor.
* /subjects -- Mostra matérias matriculadas na grade.


### 📋 Notas:

---
