#!/usr/bin/env bash
echo "=== NGINX CONFIG DEBUG ==="
cat /etc/nginx/sites-available/default.conf 2>/dev/null || echo "default.conf not found at that path"
ls -la /etc/nginx/sites-available/ 2>/dev/null
ls -la /etc/nginx/ 2>/dev/null
echo "=== END NGINX CONFIG DEBUG ==="
echo "Running composer"
composer install --no-dev --working-dir=/var/www/html

echo "Caching config..."
php artisan config:cache

echo "Caching routes..."
php artisan route:cache

echo "Running migrations..."
php artisan migrate --force

echo "Seeding admin user..."
php artisan db:seed --class=AdminUserSeeder --force
