#! /bin/bash

file=sites/default/settings.php

if [ ! -e "$file" ]; then
  echo "no settings.php"
else
  echo Starting Apache
  pwd
  exec apache2ctl -DFOREGROUND
fi

echo "endofscript"
