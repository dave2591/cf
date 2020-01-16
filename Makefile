.PHONY: currencyFair-run php-bash docker-up postgres-cli run-tests

currencyFair-run:
	echo "\e[1;33;44mStarting Dave's CurrencyFair Tech Test...\e[0m"
	docker-compose up -d --force-recreate
	sudo chmod -R 0777 ./storage ./bootstrap/cache
	docker-compose exec php-fpm composer install
	docker-compose exec php-fpm php artisan migrate
	@echo "API Endpoint: http://127.0.0.1:2591/api/transactions"
	@echo "Frontend URL: http://127.0.0.1:2591/app.html"

run-tests:
	docker-compose exec php-fpm ./vendor/bin/phpunit

php-bash:
	docker-compose exec php-fpm bash

docker-up:
	docker-compose up -d --force-recreate

docker-cleanup:
	docker-compose down -v --rmi all --remove-orphans

postgres-cli:
	docker-compose exec postgres psql postgres --user=user