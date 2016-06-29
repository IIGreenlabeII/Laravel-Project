<?php

	// default url redirect
	Route::get('/', function ()
	{
		return Redirect::to('/blog');
	});

	// sends you to the right category page
	Route::get('/blog/{category?}', 'BlogsController@index');
	// saves the comment on a post
	Route::post('/blog/save', 'BlogsController@store');

	// sends you to the right about page
	Route::get('/about/{category}', 'AboutController@index');

	// sends you to the right disciplines page
	Route::get('/disciplines/{category}', 'DisciplinesController@index');

	// sends you to the right ventures page
	Route::get('/ventures/{category}', 'VenturesController@index');

	// sends you to the contact page
	Route::get('/contact', 'ContactController@index');

	// send you to the sitemap page
	Route::get('/sitemap', 'SitemapController@index');