<p align="center">
    <a href="https://laravel.com" target="_blank">
        <img src="https://static.autoconf.com.br/site-quest-multimarcas/images/logo.png?1e735f3a33e0d80d877bf225314fb369" width="300">
    </a>
</p>

## Sobre

Olá, nesse desafio iremos fazer nossa aplicação obter dados de veículos do site QuestMultimarcas. Optei por utilizar a biblioteca Domdocument do laravel para propor um código mais limpo e legivel ao invés do REGEX(NA MINHA OPNIÃO):

## Stacks

- Ubuntu 20.04
- PHP 7.4.3
- Laravel Framework 7.30.6
- Node 18.0.0
- Npm 8.6.0
- Composer 2.5.8
- MYSQL 8.0.34
- Apache

## Mão na masssa!

## Instalação e config do php7.4, apache2 e composer

- O PHP E O APACHE TEM DIVERSAS FORMAS DE INSTALAR NO AMBIENTE, GOSTO DE USAR O TUTORIAL DO HOWTOFORGE E RECOMENDO. PARA GANHARMOS TEMPO DEIXO A INDICAÇÃO E VAMOS CONFIGURAR E INSTALAR O MYSQL.

  	R:  <a href="https://www.howtoforge.com/tutorial/how-to-install-laravel-php-web-framework-on-ubuntu-2004/" target="_blank">CLIQUE AQUI!</a>

## Instalação e config do mysql

- RODE NO TERMINAL(ATALHO -> CTR+ALT+T) O SEGUINTE COMANDO PARA INSTALAR O MYSQL(NESSE CASO IREI UTILIZAR O APTITUDE):

	R: 1° RODE = sudo apt-get install aptitude, 2° = sudo aptitude install mysql-server mysql-client;

- PRA LOGAR NO mysql EXECUTE ESTE COMANDO. (POR PADRÃO O MYSQL JÁ VEM CONFIGURADO SEM SENHA):

	R: 1° RODE = sudo su, 2° RODE = mysql -u root, 3° RODE O ALTER SE QUISER UMA SENHA PRO USER ROOT DO MYSQL = ALTER USER 'root'@'localhost' IDENTIFIED WITH mysql_native_password BY 'admin';

- SE PREFERIR CRIE UM USER NOVO:
    
    R: 1° RODE = CREATE USER 'admin@admin.com'@'localhost' IDENTIFIED BY 'admin';, 2° RODE PARA DEFINIR OS PRIVILÉGIOS DESSE CARA = GRANT ALL PRIVILEGES ON admin.* TO 'admin@admin.com'@'localhost';, 3° RODE PARA APLICAR AS ALTERAÇÕES = FLUSH PRIVILEGES;;

- AGORA VAMOS CRIAR NOSSO DATABASE:
    
    R: 1° RODE(VAMOS LOGAR NO USER CRIADO) = mysql -u admin@admin.com -p, 2° RODE = CREATE DATABASE questmultimarcas;, 3° RODE = exit;

- AGORA APÓS REALIZAR O CLONE DO PROJETO, VOCÊ PODE RENOMEAR O ARQUIVO .ENV.EXAMPLE PARA .ENV:(VOCÊ PODE ABRIR NA SUA IDE DE PREFERÊNCIA OU VIA TERMINAL QUE É O QUE VOU MOSTRAR AQUI)

    R: 1° RODE(VÁ ATÉ A APLICAÇÃO APERTE O BOTÃO ESQUERDO DO MOUSE E CLIQUE NA OPÇÃO ABRIR NO TERMINAL OU ABRA UM TERMINAL E NAVEGUE ATÉ A APLICAÇÃO) = ATUALIZE AS INFOS DE CONEXÇÃO COM O BANCO, NESSE EXEMPLO IREI DEIXAR COMO ESTA A CONFIG FEITA Á CIMA.
        ## DB_CONNECTION=mysql
        ## DB_HOST=127.0.0.1
        ## DB_PORT=3306
        ## DB_DATABASE=questmultimarcas
        ## DB_USERNAME=admin@admin.com
        ## DB_PASSWORD=admin;

## Vamos rodar nossa aplicação

- NODE E NPM:

	R: 1° RODE = curl -o- https://raw.githubusercontent.com/nvm-sh/nvm/v0.39.0/install.sh | bash, 2° RODE(ABRA OUTRO TERMINAL PARA CARREGAR BASHRC E RODE) = nvm install 18.0.0, 3° RODE = nvm use 18.0.0, 4° RODE = node -v npm -v;

- A BRINCADEIRA COMEÇA A FICAR BOA!!!!:

	R: 1° RODE = composer install - NO MEU CASO ELE RECLAMOU DA DEPEDÊNCIA DO CURL QUE ESTÁ FALTANDO, CASO ACONTEÇA O MESMO COM VOCÊ, RODE = sudo apt-get install php7.4-cuRL.
    PERCEBA Q NA IMAGEM A BAIXO APÓS FAZER A INSTALÇAO DO NÓDULO DO CURL NO PHP O CAMANDO COMPOSER INSTALL RODA E CONSEGUE INSTALAR AS DEPÊNDENCIAS DO PROJETO;
    <p align="center">
        <a href="https://drive.google.com/file/d/1rfCTJYo5hyNxrDq3Q2yIKa8GU7QLGeAl/view?usp=sharing">CLIQUE AQUI PARA VER A IMAGEM!</a>
    </p>
    
- AGORA VAMOS RODAS AS MIGRATE E APROVEITAR A PLATAFORMA:

	R: 2° RODE(NA MINHA MÁQUINA ELE RECLAMOU DO PHP-PDO-MYSQL SE ENFRENTAR O MESMO PROBLEMA DEIXAREI A BAIXO COMO RESOLVER.) = php artisan migrete --seed, 3° RODE(PARA CRIPTOGRAFAR A APLICAÇÃO) = php artisan key:generate, 4° E ÚLTIMO = php artisan serve;
    PARA RESOLVER O PHP-PDO-MYSQL RODE = sudo apt-get install -y php-pdo-mysql;


##OBRIGADO A TODOS!!!!!!!
