<?php

Route::get('/channel.html', function(){
	return '<script src="//connect.facebook.net/'. Config::get('laravel-facebook::locale') .'/all.js"></script>';
});