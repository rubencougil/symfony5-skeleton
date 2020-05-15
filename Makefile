.PHONY: run test

install:
	cd app && composer install

run:
	symfony server:start --no-tls --dir=app

test:
	cd app && ./vendor/bin/behat