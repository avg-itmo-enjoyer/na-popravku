OCI_RUNTIME=podman
.PHONY: test start stop restart run

start:
	sudo ${OCI_RUNTIME} compose up --build --detach
	sudo ${OCI_RUNTIME} compose exec php composer install

stop:
	sudo ${OCI_RUNTIME} compose down --remove-orphans

restart: docker-compose.yml .docker/php.Dockerfile stop start

test: restart
	sudo ${OCI_RUNTIME} compose exec php composer test tests/*.php

run: restart
	sudo ${OCI_RUNTIME} compose exec php php main.php
