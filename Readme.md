[![Build Status](https://travis-ci.org/thomaswelton/laravel-facebook.png?branch=master)](https://travis-ci.org/thomaswelton/laravel-facebook)
[![Latest Stable Version](https://poser.pugx.org/thomaswelton/laravel-facebook/v/stable.png)](https://packagist.org/packages/thomaswelton/laravel-facebook)
[![Total Downloads](https://poser.pugx.org/thomaswelton/laravel-facebook/downloads.png)](https://packagist.org/packages/thomaswelton/laravel-facebook)

Register the Facebook service provider by adding it to the providers array in the `app/config/app.php` file. 

```
ThomasWelton\Facebook\FacebookServiceProvider
```

Alias the Facebook facade by adding it to the aliases array in the `app/config/app.php` file. 

```php
'aliases' => array(
	'Facebook' => 'ThomasWelton\Facebook\Facades\Facebook'
)
```
