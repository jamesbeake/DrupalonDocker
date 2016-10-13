FROM debian:8.5

RUN DEBIAN_FRONTEND=noninteractive apt-get -y update && apt-get -y install \
    git apache2 curl mysql-client sqlite php5 php-apc php5-curl php5-gd php5-json php5-sqlite php5-mysql\
    && rm -rf /var/lib/apt/lists/*

## INSTALL/CONFIGURE  A P A C H E  ##
COPY _apache/drupal_site.conf /etc/apache2/sites-available/000-default.conf
RUN sed -i 's/AllowOverride None/AllowOverride All/g' /etc/apache2/apache2.conf
RUN a2enmod rewrite
COPY _apache/servername.conf /etc/apache2/conf-available
RUN a2enconf servername

#make the environment variable availabe to command like COPY that don't have a environment context
ENV _HOME /root

## INSTALL C O M P O S E R  ##
RUN curl -sS https://getcomposer.org/installer | php && \
    mv composer.phar /usr/local/bin/composer

# parallel retrieval of composer packages - speed up build
RUN composer global require hirak/prestissimo:^0.3

##Install DRUSH / DRUPAL CONSOLE##
RUN composer global require drupal/console:@stable
RUN composer global require drush/drush
RUN ln -s $_HOME/.composer/vendor/bin/drupal /usr/local/bin/drupal
RUN ln -s $_HOME/.composer/vendor/drush/drush/drush /usr/local/bin/drush

COPY Docker-Start.sh /toolbox/

CMD ["/toolbox/Docker-Start.sh"]

