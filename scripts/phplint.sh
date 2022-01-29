#! /bin/sh

find ../ -iname '*.php' -not -path "..//supportbee/vendor/*" | while read line; do
  lint_cmd="$(php -l $line)"
  rs=$?
  if [ $rs != 0 ]; then
    exit $rs
  fi
done
