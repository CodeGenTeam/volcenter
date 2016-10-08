#!/bin/bash

source ~/.profile # для перезагрузки .profile, чтобы bash обновил переменные

gulp stop

# Terminal npm
out=$(sudo netstat -ltupn | grep ${NPM_PID})
sed -i '/NPM_PID/d' ~/.profile;

if [ "$out" != "" ]; then
    kill -kill ${NPM_PID}
fi

# Gulp
out=$(sudo netstat -ltupn | grep gulp | awk '{print $7}' | sed s/[^0-9]//g | uniq)

if [ "$out" != "" ]; then
for el in "${out[@]}"; do
  kill -kill $el
done
fi

# Python
out=$(sudo netstat -ltupn | grep python | awk '{print $7}' | sed s/[^0-9]//g | uniq)

if [ "$out" != "" ]; then
for el in "${out[@]}"; do
  kill -kill $el
done
fi