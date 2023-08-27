<p align="center">
    <a href="https://laravel.com" target="_blank">
        <img src="https://static.autoconf.com.br/site-quest-multimarcas/images/logo.png?1e735f3a33e0d80d877bf225314fb369" width="400">
    </a>
</p>

## Sobre

Olá, nesse desafio iremos fazer nossa aplicação obter dados de veículos do site QuestMultimarcas. Optei por utilizar a biblioteca Domdocument do laravel para propor um código mais limpo e legivel ao invés do REGEX(NA MINHA OPNIÃO):

## Stacks

- Ubuntu 20.04
- PHP 7.4.3
- Laravel Framework 7.30.6
- MYSQL 8.0.34
- Apache2.service - The Apache HTTP Server

## Mão na masssa!

## Instalação e config do php7.4 e apache2

- RODE NO TERMINAL(ATALHO -> CTR+ALT+T) O SEGUINTE COMANDO PARA INSTALAR O APACHE(NESSE CASO IREI UTILIZAR O APT):

	R: 1° RODE(ATUALIZE) = sudo apt update && sudo apt upgrade, 2° RODE = sudo apt install apache2 , 3° RODE = systemctl start apache2, 4° RODE = systemctl enable apache2, 5° RODE(CTRL + C PARA SAIR DO STATUS DO APACHE) = systemctl status apache2, 6° RODE(Em seguida, adicione os serviços SSH, HTTP e HTTPS ao firewall UFW usando o comando a seguir) =  for svc in ssh http https
                                                                                                                                                                    do 
                                                                                                                                                                    ufw allow $svc
                                                                                                                                                                    done, 
    7° RODE = sudo ufw enable, 8° RODE(NA URL DO NAVEGADOR) = http://10.5.5.25/ OU localhost;

- BORA PRO PHP(VAMOS UTILIZAR O APTITUDE):

	R: 1° RODE = sudo aptitude install php, 2° RODE(Repositório que fornece versões anteriores do PHP) = sudo add-apt-repository ppa:ondrej/php, 3° RODE = sudo aptitude install php7.4 (versão específica), 4° RODE(PRA GARANTIR QUE TODOS OS MÓDULOS PHP ESTARÃO INSTALADOS CORRETAMENTE) = sudo aptitude install php7.4 libapache2-mod-php7.4 php7.4-mysql php7.4-common php7.4-curl php7.4-json php7.4-xml php7.4-mbstring php7.4-gettext php7.4-gd php7.4-zip php7.4-soap php7.4-xmlrpc php7.4-intl php7.4-cli php7.4-dev php-pear libapache2-mod-php7.4 php7.4-bz2;

## Instalação e config do mysql

- RODE NO TERMINAL(ATALHO -> CTR+ALT+T) O SEGUINTE COMANDO PARA INSTALAR O MYSQL(NESSE CASO IREI UTILIZAR O APTITUDE):

	R: 1° RODE = sudo apt-get install aptitude, 2° = sudo aptitude install mysql-server mysql-client;

- PRA LOGAR NO mysql EXECUTE ESTE COMANDO. (POR PADRÃO O MYSQL JÁ VEM CONFIGURADO SEM SENHA):

	R: 1° RODE = sudo su, 2° RODE = mysql -u root, 3° RODE O ALTER SE QUISER UMA SENHA PRO USER ROOT DO MYSQL = ALTER USER 'root'@'localhost' IDENTIFIED WITH mysql_native_password BY 'admin';

- SE PREFERIR CRIE UM USER NOVO:
    
    R: 1° RODE = CREATE USER 'admin@admin.com'@'localhost' IDENTIFIED BY 'admin', 2° RODE PARA DEFINIR OS PRIVILÉGIOS DESSE CARA = GRANT ALL PRIVILEGES ON *.* TO 'admin@admin.com'@'localhost', 3° RODE PARA APLICAR AS ALTERAÇÕES = FLUSH PRIVILEGES;

- AGORA VAMOS CRIAR NOSSO DATABASE:
    
    R: 1° RODE(VAMOS LOGAR NO USER CRIADO) = mysql -u admin@admin.com -p, 2° RODE = CREATE DATABASE questmultimarcas, 3° RODE = exit;

- AGORA APÓS REALIZAR O CLONE DO PROJETO, VOCÊ PODE RENOMEAR O ARQUIVO .ENV.EXAMPLE PARA .ENV:(VOCÊ PODE ABRIR NA SUA IDE DE PREFERÊNCIA OU VIA TERMINAL QUE É O QUE VOU MOSTRAR AQUI)

    R: 1° RODE(VÁ ATÉ A APLICAÇÃO APERTE O BOTÃO ESQUERDO DO MOUSE E CLIQUE NA OPÇÃO ABRIR NO TERMINAL OU ABRA UM TERMINAL E NAVEGUE ATÉ A APLICAÇÃO) = ATUALIZE AS INFOS DE CONEXÇÃO COM O BANCO NESSE EXEMPLO IREI DEIXAR COMO ESTA A CONFIG FEITA Á CIMA.
        ## DB_CONNECTION=mysql
        ## DB_HOST=127.0.0.1
        ## DB_PORT=3306
        ## DB_DATABASE=questmultimarcas
        ## DB_USERNAME=admin@admin.com
        ## DB_PASSWORD=admin;

## Vamos rodar nossa aplicação