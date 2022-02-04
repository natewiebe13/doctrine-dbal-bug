.PHONY: services
services: docker-compose.override.yml
	docker compose pull
	DOCKER_BUILDKIT=1 docker compose build --pull

.PHONY: install
install: vendor
	docker compose exec php /var/www/wait-for-it.sh mysql:3306 --timeout=120
	docker compose exec php bin/console doctrine:migrations:migrate

docker-compose.override.yml:
	cp docker-compose.local.yml docker-compose.override.yml
	sed -i.bak "s/UID: 1000/UID: `id -u`/g" docker-compose.override.yml
	sed -i.bak "s/GID: 1000/GID: `id -g`/g" docker-compose.override.yml
	rm docker-compose.override.yml.bak

vendor: composer.json composer.lock
	docker compose run --rm php composer install
