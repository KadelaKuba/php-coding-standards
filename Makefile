# Using GNU `make` command for scripts/commands aliases.

# If you type make in your cli, it will list all the available commands.
help:
	@ echo "Usage: make <target>\n"
	@ echo "Available targets:\n"
	@ cat Makefile | grep -oE "^[^: ]+:" | grep -oE "[^:]+" | grep -Ev "help|default|.PHONY"

# DOCKER
run:
	docker-compose up -d

stop:
	docker-compose down

# BACKEND
container-bash:
	docker-compose exec cs-coding-standards bash

standards:
	docker-compose exec cs-coding-standards composer standards

ecs:
	docker-compose exec cs-coding-standards composer ecs

ecs-fix:
	docker-compose exec cs-coding-standards composer ecs-fix

ecs-md:
	docker-compose exec cs-coding-standards composer ecs-md

ecs-md-fix:
	docker-compose exec cs-coding-standards composer ecs-md-fix

lint:
	docker-compose exec cs-coding-standards composer lint


