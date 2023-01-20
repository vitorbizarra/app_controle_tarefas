# App Controle Tarefas

Um sistema para você gerenciar suas tarefas onde você pode adicionar, visualizar, editar, excluir suas tarefas. Além de também poder exportar suas tarefas como uma lista nos formatos XLSX, CSV ou PDF.

## Configuração e Instalação

Para rodarmos o App Controle Tarefas em nossa máquina é necessário que tenhamos o NPM e o Composer instalados em nossas máquinas.

### 1º Passo:
Crie um banco de dados pelo seu gerenciador de bancos de dados MySQL (de preferência pelo MySQL Workbench).

### 2º Passo:
Crie seu próprio arquivo .env na raiz do projeto usando o arquivo .env.example como modelo.

### 3º Passo:
Adicione os dados de acesso ao banco de dados no seu arquivo .env:

    [...]

    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=seubanco
    DB_USERNAME=seuusuario
    DB_PASSWORD="suasenha"
    
    [...]

### 4º Passo:
Para instalar as dependências do projeto utilize os comandos:

    npm install

e

    composer install



### 5º Passo:
Gere sua App Key do Laravel com o comando:

    php artisan key:generate

### 6º Passo: 
Rode as migrations utilizando o comando:

    php artisan migrate

### 7º Passo: 
Utilize os comandos: 
    
    npm run dev

e 

    php artisan serve

para utilizar a aplicação

### 8º Passo:
Registre sua conta no sistema para realizar o login e começar a utilizar todas as funcionalidades do sistema.