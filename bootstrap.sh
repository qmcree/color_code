#!/bin/bash

readonly DEV_PROJECT_NAME=color_code

# Setup Laravel using Composer.
cd /var/www/
composer create-project laravel/laravel ${DEV_PROJECT_NAME} --prefer-dist
chown -R vagrant:www-data ${DEV_PROJECT_NAME}/
chmod -R ug+w ${DEV_PROJECT_NAME}/app/storage/
mysql -uroot -ppassword -e "CREATE DATABASE ${DEV_PROJECT_NAME};"

# Configure nginx
cd /etc/nginx/sites-available/
mv default default_old
cat > default <<EOL
server {
        listen   80 default_server;

        root /var/www/${DEV_PROJECT_NAME}/public/;
        index index.php index.html index.htm;

        location / {
             try_files \$uri \$uri/ /index.php\$is_args\$args;
        }

        location ~ \.php$ {
                try_files \$uri /index.php =404;
                fastcgi_pass unix:/var/run/php5-fpm.sock;
                fastcgi_index index.php;
                fastcgi_param SCRIPT_FILENAME \$document_root\$fastcgi_script_name;
                include fastcgi_params;
        }
}
EOL
service php5-fpm restart
service nginx restart