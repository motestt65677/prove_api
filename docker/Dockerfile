FROM ubuntu:16.04
MAINTAINER chengshair <chengshair@gmail.com>

# ENV VAR
ENV HOME=/root WORKDIR=/var/www/html/Prove
ENV TERM xterm

# Switch to /root
WORKDIR $HOME

# Setting time zone
ADD ./docker/Timezone_Taipei /etc/localtime

# Update and install package
RUN apt update -y\
    && apt-get install -y software-properties-common \
    && LC_ALL=C.UTF-8 add-apt-repository ppa:ondrej/php\
    && apt update -y \
    && apt install -y apache2 git curl \
        php7.2 libapache2-mod-php7.2 php7.2-mbstring \
        php7.2-xmlrpc php7.2-soap php7.2-gd php7.2-xml \
        php7.2-cli php7.2-zip php7.2-bcmath php7.2-json php7.2-mysql

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# # Setup apache rewrite mod
# RUN a2enmod rewrite

# Setup temphawk web service
COPY . $WORKDIR
WORKDIR $WORKDIR
# RUN cp ./docker/php7.2/php.ini /etc/php/7.2/apache2/php.ini
RUN composer install

# Setup apache rewrite mod
RUN cp $WORKDIR/docker/Prove.conf /etc/apache2/sites-available/Prove.conf \
    && a2dissite 000-default.conf \
    && a2ensite Prove.conf \
    && a2enmod rewrite \
    && service apache2 restart
RUN chown -R www-data:www-data /var/www/html/Prove/ \
    && chmod -R 755 /var/www/html/Prove/

RUN cp $WORKDIR/docker/docker-entrypoint.sh /entrypoint.sh
ENTRYPOINT ["/entrypoint.sh"]

# Export port
EXPOSE 80 443


