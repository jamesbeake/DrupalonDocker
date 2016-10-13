FROM jb/drupal-base:0.1

COPY _drupal/drupalsite.make /drupalsite.make
RUN drush make /drupalsite.make /var/www/drupal_site

WORKDIR /var/www/drupal_site

COPY _drupal/site-install.yml $_HOME/site-install.yml
RUN drupal chain --file=$_HOME/site-install.yml

COPY _sitefiles/default.settings.php sites/default/settings.php
RUN chmod 444 sites/default/settings.php
COPY _sitefiles/database.local.php sites/default/database.local.php
RUN chmod 444 sites/default/database.local.php
ENV DB_DRIVER sqlite

COPY _sitefiles/salt.txt /var/www/salt.txt
ENV _SALT /var/www/salt.txt

RUN mkdir sites/default/config-sync
RUN chown www-data:www-data . -R

VOLUME ["/var/www/drupal_site/sites/default/files"]

CMD ["/toolbox/Docker-Start.sh"]
