# projeto_livraria_api
projeto sobre api's rest @pedbot

# inicializar o projeto buildando a imagem do dockerfile
docker-compose build app

# comando para criar os containers 
docker-compose up -d

# baixar composer
docker-compose exec app composer install

# gerar uma chave única para o aplicativo com a artisan
docker-compose exec app php artisan key:generate

