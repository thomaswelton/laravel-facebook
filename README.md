[![Build Status](https://travis-ci.org/thomaswelton/laravel-facebook.png?branch=master)](https://travis-ci.org/thomaswelton/laravel-facebook)
[![Latest Stable Version](https://poser.pugx.org/thomaswelton/laravel-facebook/v/stable.png)](https://packagist.org/packages/thomaswelton/laravel-facebook)
[![Total Downloads](https://poser.pugx.org/thomaswelton/laravel-facebook/downloads.png)](https://packagist.org/packages/thomaswelton/laravel-facebook)
[![Bitdeli Badge](https://d2weczhvl823v0.cloudfront.net/thomaswelton/laravel-facebook/trend.png)](https://bitdeli.com/free "Bitdeli Badge")


# Installation

Update your `composer.json` file to include this package as a dependency
```json
"thomaswelton/laravel-facebook": "dev-master"
```

Register the Facebook service provider by adding it to the providers array in the `app/config/app.php` file.
```
Thomaswelton\LaravelFacebook\LaravelFacebookServiceProvider
```

Alias the Facebook facade by adding it to the aliases array in the `app/config/app.php` file.
```php
'aliases' => array(
	'Facebook' => 'Thomaswelton\LaravelFacebook\Facades\Facebook'
)
```

# Configuration

Copy the config file into your project by running
```
php artisan config:publish thomaswelton/laravel-facebook
```

Edit the config file to include your app ID and secret key.

# Useage

This Facebook class extends the Facebook PHP SDK, so all the methods listed here http://developers.facebook.com/docs/reference/php/ are available, as well as the folowing.


### getShareUrl

Get a share URL. If you have not set your app ID then the URL will use the old sharer.php urls as they do not require an app ID or redirect_url

```php

$shareData = array(
    'link' => '', // url
    'picture' => '', // picture url
    'name' => '', // Title
    'caption' => '', // Caption
    'description' => '', // Description
);

echo Facebook::getShareUrl($shareData);
```

### hasLiked

For page tab apps, will let you know if a user has liked the page.
Returns
- 1 - Liked
- 0 - Not liked
- -1 - Don't know either way

```php
Facebook::hasLiked();
```

