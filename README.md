# Doctrine DBAL Bug

This is a test case for <https://github.com/doctrine/dbal/issues/5243>.

This is configured with a full docker environment to make it easier to replicate,
but should work with php and mysql locally.

The included environment requires `make`, `docker`, and `docker compose`.

Migration being incorrectly generated: <https://github.com/natewiebe13/doctrine-dbal-bug/blob/master/migrations/Version20220204191726.php>  
Entity in question: <https://github.com/natewiebe13/doctrine-dbal-bug/blob/master/src/Entity/Test.php>

## Steps to Replicate (with docker env)

- Run: `make && make install && make migration`
- A new migration will be created with an empty up and a number of queries for down ([an example of this has been committed](https://github.com/natewiebe13/doctrine-dbal-bug/blob/master/migrations/Version20220204191726.php))

## Steps to Replicate (without docker env)

- Run `composer install`
- Update `.env*` to match your env
- Run: `bin/console make:migration`
- A new migration will be created with an empty up and a number of queries for down ([an example of this has been committed](https://github.com/natewiebe13/doctrine-dbal-bug/blob/master/migrations/Version20220204191726.php))
