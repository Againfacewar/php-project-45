install:
	composer install

brain-games:
	bin/brain-games

brain-even:
	bin/brain-even

brain-calc:
	bin/brain-calc

brain-gcd:
	bin/brain-gcd

brain-progression:
	bin/brain-progression

list:
	bin/game-list

brain-prime:
	bin/brain-prime

validate:
	composer validate

autoload:
	composer dump-autoload

lint:
	composer exec --verbose phpcs -- --standard=PSR12 src bin

fix-lint:
	composer exec --verbose phpcbf -- --standard=PSR12 src bin