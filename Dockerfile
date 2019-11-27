FROM debian:buster	

MAINTAINER lnezonde <lnezonde@student.42.fr>

COPY srcs /srcs

RUN apt-get update && apt-get upgrade -y \
&& apt-get install wget -y \
&& apt-get install php-fpm php-mysql php-curl php-gd php-intl php-mbstring php-soap php-xml php-xmlrpc php-zip -y

#nginx
RUN apt-get install nginx -y \
&& mkdir -p /var/www/159.65.67.78/html \
&& chown -R $USER:$USER /var/www/159.65.67.78/html \
&& chmod -R 755 /var/www/159.65.67.78 \
&& cp srcs/self-signed.conf /etc/nginx/snippets/ \
&& cp srcs/index.html /var/www/159.65.67.78/html/ \
&& cp srcs/159.65.67.78 /etc/nginx/sites-available/ \
&& ln -s /etc/nginx/sites-available/159.65.67.78 /etc/nginx/sites-enabled/

#mysql
RUN apt-get install mariadb-server -y \
&& service mysql start \
&& mysql < /srcs/mysql_wp.sql && mysql wordpress < /srcs/wordpress.sql

#phpMyAdmin
RUN wget https://files.phpmyadmin.net/phpMyAdmin/4.9.2/phpMyAdmin-4.9.2-english.tar.gz \
&& tar zxvf phpMyAdmin-4.9.2-english.tar.gz \
&& rm phpMyAdmin-4.9.2-english.tar.gz \
&& mv phpMyAdmin-4.9.2-english/ /usr/share/phpmyadmin \
&& mkdir -p /var/lib/phpmyadmin/tmp \
&& chmod 777 /var/lib/phpmyadmin/tmp \
&& chown -R www-data:www-data /var/lib/phpmyadmin \
&& cp /srcs/config.inc.php /usr/share/phpmyadmin/ && rm /usr/share/phpmyadmin/config.sample.inc.php \
&& service mysql start \
&& mysql < /usr/share/phpmyadmin/sql/create_tables.sql && mysql < /srcs/pma.sql \
&& ln -s /usr/share/phpmyadmin /var/www/159.65.67.78/html/phpmyadmin \ 

#wordpress
RUN tar zxvf /srcs/wordpress.tar.gz \
&& cp /srcs/wp-config.php wordpress/ && rm /wordpress/wp-config-sample.php \
&& mv /wordpress/ /usr/share/wordpress \
&& chown -R www-data:www-data /usr/share/wordpress \
&& ln -s /usr/share/wordpress /var/www/159.65.67.78/html/wordpress

#ssl
RUN openssl req -x509 -nodes -days 365 -newkey rsa:2048 -keyout /etc/ssl/private/nginx-selfsigned.key -out /etc/ssl/certs/nginx-selfsigned.crt -config /srcs/server.csr.cnf

CMD bash /srcs/start.sh && tail -f /dev/null
