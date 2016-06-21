#! /bin/sh

find ../ -iname '*.php' | while read line; do
  lint_cmd="$(php -l $line)"
  rs=$?
  if [ $rs != 0 ]; then
    exit $rs
  fi
done
