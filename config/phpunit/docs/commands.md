# Commands

## Run Tests
./tools/phpunit --configuration config/phpunit/phpunit.xml

./vendor/bin/phpunit --configuration config/phpunit/phpunit.xml
./vendor/bin/phpunit -c config/phpunit/phpunit.xml
./vendor/bin/phpunit -c config/phpunit/phpunit.xml --coverage-html ./coverage
./vendor/bin/phpunit -c config/phpunit/phpunit.xml --debug
./vendor/bin/phpunit -c config/phpunit/phpunit.xml --debug --verbose
./vendor/bin/phpunit -c config/phpunit/phpunit.xml --verbose
./vendor/bin/phpunit -c config/phpunit/phpunit.xml --testsuite unit
./vendor/bin/phpunit -c config/phpunit/phpunit.xml --testsuite integration 
./vendor/bin/phpunit -c config/phpunit/phpunit.xml --testsuite debug
./vendor/bin/phpunit --list-suites
./vendor/bin/phpunit --testsuite unit
