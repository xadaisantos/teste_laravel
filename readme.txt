Após você clonar o repositório, dentro da pasta teste_laravel/ digite:

>>> composer install
>>> php artisan key:generate

Configure o .env com informacoes necessárias do seu banco.

>>> php artisan migrate --seed
>>> php artisan serve

Acesse o endereco http://localhost:8000/login

Após os Seeds, já existe um usuário criado, com 5 cursos.