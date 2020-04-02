# Olá, seja bem vindo a minha agenda.
## Abaixo as especificações para rodar esse projeto.
* servidor local (xampp, pode ser qualquer outro, mas utilizei o xampp)
* PHP >= 7.2.5
* mysql
* Baixe a ultima versão do LTS do node.

## Agora que a sua máquina já tem as especificações, por favor siga os seguintes comandos para configurar o seu projeto.
* rode o seguinte comando: composer install (irá baixar a vendor)
* rode o seguinte comando: npm install (irá baixar o node_modules)
* Inicie o mysql e o apache no seu servidor local, entre no phpmyadmin > crie um banco chamado: private_code.
* Crie um arquivo chamado .env e copie o conteudo do .env.example para o .env (criado por você)
* php artisan artisan migrate --seed (irá criar as tabelas do banco e os registros iniciais)
* npm run dev (irá compilar o sass)
* entre na pasta database > seeders > UserSeeder.php (nesse arquivo tem um usuário e senha para você logar na ferramenta).

## Show de bola, agora é o momento de iniciar a plataforma, siga os seguinte comandos.
php artisan serve

# Está pronto, é o momento de você testar a sua agenda, espero que goste :)