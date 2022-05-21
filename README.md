# ApiTeste
Api Teste usando laravel/Retorna seu Cep

Para utilizar o projeto precisa do Xamp , Composer e Laravel.

Abaixe o Projeto no C:/xampp/htdocs/.

Composer install no diretorio do projeto

Faça uma copia da .env.exemple  e renomeie para .env

no local C:\Windows\System32\drivers\etc coloque no arquivo hosts:

127.0.0.1               seuendereco.com

no local C:\xampp\apache\conf\extra coloque no arquivo httpd-vhosts: 


 
       <VirtualHost *:80> 
        ServerAdmin tete.atzori.alves@gmail.com
        DocumentRoot "C:/xampp/htdocs/Laravel/public"
        ServerName seuendereco.com
        ServerAlias seuendereco.com
        SetEnv environment_type production
        
        <Directory "C:/xampp/htdocs/Laravel/public">
                AllowOverride All
                Options Indexes FollowSymLinks Includes ExecCGI
                Require all granted
        </Directory>
        
        <VirtualHost>
 
 
Apos essa etapa pare o apache do xamp e ligue ele novamente para reconhecer as mudanças.

Rota para os testes  http://seuendereco.com/search/local/, precisa informar pelo menos 1 Cep.

