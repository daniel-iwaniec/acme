#!/usr/bin/env bash

set -e

cd "$(dirname "$(readlink -f "${BASH_SOURCE[0]}")")/infrastructure" || { echo "cd failed"; exit 1; }

if [ "$1" == "remove" ] || [ $# -gt 1 ]; then
    docker-compose down -v --rmi all
    exit 0
fi

docker-compose up -d
docker-compose exec -w /application acme composer install

printf "\n\n%sRunning shop tests ⚙\n\n" "$(tput setaf 10)"
tput sgr 0
docker-compose exec -w /application acme vendor/bin/phpunit

printf "\n\n%sRunning shop analysis ⚙\n\n" "$(tput setaf 10)"
tput sgr 0
docker-compose exec -w /application acme vendor/bin/phpstan analyse source test --level=max
