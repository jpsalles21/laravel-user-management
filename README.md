# Gerenciamento de usuários

Este projeto é uma aplicação desenvolvida com Laravel para visualizar uma tabela de usuários da API: [https://dummyjson.com/users](https://dummyjson.com/users). Siga os passos abaixo para configurar o ambiente de desenvolvimento e executar o projeto localmente.

## Para executar a aplicaçação

- Certifique-se de possuir o PHP 8.2.12 instalado pelo [XAMPP](https://www.apachefriends.org/download.html), [Composer](https://getcomposer.org/download/) e [Laravel 11.20](https://laravel.com/docs/11.x/installation) instalados na sua máquina.
- Para evitar qualquer erro, entre no arquivo php.ini que está na php, dentro da pasta xampp no disco local C, e habilite ```extension=zip``` e ```extension=fileinfo```

1. **Clone o repositório**: ```git clone https://github.com/jpsalles21/laravel-user-management.git```

2. **Entre no diretório do projeto**: ```cd laravel-user-management```

3. **Instale as dependências**: ```composer install```

4. **Copie o arquivo .env**: ```cp .env.example .env``` no Linux. Para o windows, copie o arquivo .env.example e renomeie para .env

5. **Gere a chave de aplicação**: ```php artisan key:generate```

6. **Execute o servidor**: ```php artisan serve```

   No navegador, entre em: [http://localhost:8000](http://localhost:8000) para visualizar a aplicação.


## Features 

- Dropdown para selecionar os estados e visualizar apenas os usuários daquele estado
  
![image](https://github.com/user-attachments/assets/5551ac1f-0439-448e-a50f-ae7e256b4f51)


- Tabela de usuário com foto, nome, email, telefone, cidade e estado, organizado por ordem alfabética 

![image](https://github.com/user-attachments/assets/d5626e01-217a-4fae-9a43-c29bf2ec944c)


- Nova página com mais detalhes do usuário, que são acessadas ao clicar em um usuário da tabela. 

![image](https://github.com/user-attachments/assets/598db966-e7e2-4d00-a271-1ec077716a5c)



