
build:
	docker build --tag php .

composer-install:
	./php.sh composer install

run-tests:
	./php.sh vendor/bin/phpunit tests