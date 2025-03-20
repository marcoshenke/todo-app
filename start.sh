echo "Rodando as migrations..."
php artisan migrate --force

echo "Gerando a chave do Laravel..."
php artisan key:generate --force

echo "Iniciando o PHP-FPM..."
php-fpm -D

echo "Iniciando o Nginx..."
nginx -g "daemon off;"
