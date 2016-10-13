<?php

 /** Settings file include to allow control over database settings via
 *   environment variables only.
 */

  if ( getenv('DB_DRIVER')=="sqlite") {
//  if (True) {
    $databases['default']['default'] = array (
      'database' => 'sites/default/files/.ht.sqlite',
      'prefix' => '',
      'namespace' => 'Drupal\\Core\\Database\\Driver\\sqlite',
      'driver' => 'sqlite',
    );
  }
  else {
    $databases['default']['default'] = array (
      'database' => getenv('MYSQL_DATABASE'),
      'username' => getenv('MYSQL_USER'),
      'password' => getenv('MYSQL_PASSWORD'),
      'prefix' => '',
      'host' => getenv('MYSQL_HOST'),
      'port' => '3306',
      'namespace' => 'Drupal\\Core\\Database\\Driver\\mysql',
      'driver' => 'mysql',
    );
  }

#  var_dump($databases);
