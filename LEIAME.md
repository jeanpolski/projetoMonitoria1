# Projeto de Monitora
    O objetivo do projeto é fornecer uma plataforma de fácil gestão e manuseio, onde usuários, monitores ou alunos, possam exercer e prestar seu serviço de forma mais dinâmica e organizada.

## COMO RODAR?
´´´ bash ´´´
git clone https://github.com/jeanpolski/projetoMonitoria1
cd <DIRETORIO_DO_REPOSITORIO>
cp .env.example .env
    Abra o arquivo .env, e altere a linha DB_DATABASE=<NOME_DO_SEU_BANCO>
    Altere a linha DB_CONNECTION=<BANCO_DE_DADOS> // Usei mysql no meu caso.
    Remova os comentários mencionando DB.
    Abra o XAMPP, inicie Apache e MySQL.
    Crie um banco de dados com o mesmo nome usado na linha DB_DATABASE.
´´´ bash ´´´
php artisan key:generate
composer install
php artisan migrate
php artisan serve

## DIARIO DE PROGRESSÃO
    *Construído CRUD;*
    Database mysql;
    Tabelas de Monitores, Matérias, Sessões e Avaliações;
    Models: MonitoriaAvailability, Rating, Session, Subject;
    Routes configurado para Session;
    *View sessions 99% funcional!!!!!!;

    *A fazer!*
    Adicionar métodos create() e edit() em Session; FEITO!
    Refinar métodos nas restantes Models;
    Adicionar views;
    AUTENTICAÇÃO: Diferenciar alunos de monitores e suas permissões.
