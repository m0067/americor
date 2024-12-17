#!/usr/bin/env bash

docker-compose up -d
docker-compose exec americor_php composer install
