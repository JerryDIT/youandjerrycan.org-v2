DOCKER_COMPOSE = docker-compose

EXEC_PHP       = $(DOCKER_COMPOSE) exec -T php

SYMFONY        = $(EXEC_PHP) bin/console
COMPOSER       = $(EXEC_PHP) composer

QA             = docker run --rm --tty --volume `pwd`:/project -w /project jakzal/phpqa:php7.4-alpine

##
## File dependencies
## -----------------
##

composer.lock: composer.json ## Update Composer dependencies and lockfile
	$(COMPOSER) update

vendor: composer.lock ## Install Composer dependencies
	$(COMPOSER) install

##
## Docker
## ------
##

build: ## Build docker
	$(DOCKER_COMPOSE) pull --quiet --ignore-pull-failures
	$(DOCKER_COMPOSE) build --pull
.PHONY: build

kill: ## kill the project
	$(DOCKER_COMPOSE) kill
	$(DOCKER_COMPOSE) down --volumes --remove-orphans
.PHONY: kill

start: ## Start the project
	$(DOCKER_COMPOSE) up -d
.PHONY: start

stop: ## Stop the project
	$(DOCKER_COMPOSE) stop
.PHONY: stop

restart: ## Restart the project
	$(DOCKER_COMPOSE) stop
	$(DOCKER_COMPOSE) up -d
.PHONY: restart

##
## Utils : Misc
## -----
##

cache-clear: ## symfony cache:clear
	$(SYMFONY) cache:clear
.PHONY: cache-clear

assets: ## run assets
	$(EXEC_PHP) yarn encore dev
.PHONY: assets

##
## Tests
## -----
##

phpunit: ## run phpunit
	$(EXEC_PHP) bin/phpunit --testdox
.PHONY: phpunit

phpunit-debug: ## Run backend specific unit tests
	$(EXEC_PHP) bin/phpunit --filter $(FILTER) -v --debug
.PHONY: phpunit-debug
### ex. make phpunit-debug FILTER=myTestName

php-cs-fixer: ## Run PHP-CS fixer
	$(QA) ./app/php-cs-fixer
.PHONY: php-cs-fixer

.DEFAULT_GOAL := help
help:
	@grep -E '(^[a-zA-Z_-]+:.*?##.*$$)|(^##)' $(MAKEFILE_LIST) | awk 'BEGIN {FS = ":.*?## "}; {printf "\033[32m%-30s\033[0m %s\n", $$1, $$2}' | sed -e 's/\[32m##/[33m/'
.PHONY: help
