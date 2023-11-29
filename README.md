# WeClient
 
 Sistema web para administração de clientes
## Requisitos

* PHP 8.2 ou superior
* Base de dados que utilize MySQL

Recomendo o uso do software [XAMPP](https://www.apachefriends.org/pt_br/index.html), o mesmo que foi usado no desenvolvimento do site, pois ele oferece um terminal para uso do PHP, um banco de dados que utiliza MySQL e o PhpMyAdmin para eventuais consultas. Além disso, todo o passo a passo é feito com base nele.
## Como utilizar

Após baixar o repositório do github, crie um novo arquivo na pasta com o nome .env, sendo um arquivo sem nome com a extensão .env, abra ele em um editor de texto e cole nele tudo que estiver no arquivo chamado .env.example.

Feito isso, inicie os módulos apache e MySQL no XAMPP.

![Módulos do XAMPP](https://i.imgur.com/M0Iugvh.png "Módulos do XAMPP")

Abra um terminal que consiga executar PHP, o passo a passo será mostrado utilizando o terminal do XAMPP. Para abri-lo no XAMPP, basta selecionar Shell no menu lateral direito.

![Shell do XAMPP](https://i.imgur.com/4QmKhB9.png "Shell do XAMPP")

1. Vá para a pasta do projeto utilizando o comando cd: `cd C:\Users\Fernando\Documents\Laravel\WeClient`

2. Estando na pasta, execute o comando de atualização do composer: `php composer.phar update`. Aguarde ele finalizar a instalação.

3. Crie o banco de dados por meio do comando `php artisan migrate --seed`. Quando questionado se quer criar o banco, digite yes.

4. Execute o comando `php artisan serve`, ele iniciará o servidor com o Laravel, para acessá-lo, basta digital no navegador localhost:8000, sendo 8000 a porta padrão dele.

5. Para fazer login, utilize o email administrador@exemplo.com e a senha 123. eles foram criados na criação do banco de dados.

Vale ressaltar que dessa forma os clientes não vem cadastrados. Caso queira inserir usuários automaticamente, porém com CPFs inválidos, basta ir no arquivo localizado em database\seeders\DatabaseSeeder.php e retirar do comentário a linha 21 (`\App\Models\Cliente::factory(50)->create();`). Após fazer isso, utilize o comando `php artisan migrate:fresh --seed`, com isso, o banco será recriado com dados na tabela de clientes. O sufixo :fresh só deve ser utilizado se o banco já existir.
## Criado por:

- [Fernando Castilho](https://github.com/Fernando-Castilho)
