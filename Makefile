install:
	docker build -t kata-checkout .
	docker run -d -p 8000:8000 -v $(shell pwd):/app --name kata-checkout kata-checkout
	docker exec kata-checkout /bin/sh -c  "cp .env.example .env && composer install"
