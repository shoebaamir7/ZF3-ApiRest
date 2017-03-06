# ZF3-ApiRest

[![Build Status](https://travis-ci.org/Tony133/ZF3-ApiRest.svg?branch=master)](https://travis-ci.org/Tony133/ZF3-ApiRest)

Simple Example Api Rest with ZF3 and Doctrine 2

## Install with Composer

```
	$ curl -s http://getcomposer.org/installer | php
	$ php composer.phar install
```

## Getting with Curl

```
	$ curl -v -X GET http://127.0.0.1:8080/api/book
	$ curl -v -X GET http://127.0.0.1:8080/api/book/:id
	$ curl -d "title=test&price=19.99" -v -X POST http://127.0.0.1:8080/api/book
	$ curl -d "title=test&price=19.99" -v -X PUT http://127.0.0.1:8080/api/book/:id
	$ curl -v -X DELETE http://127.0.0.1:8080/api/book/:id
```
