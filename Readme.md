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