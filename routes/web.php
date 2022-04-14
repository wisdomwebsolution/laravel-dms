<?php

use Illuminate\Support\Facades\Route;

Auth::routes(['verify' => true]);

Route::namespace('Auth')->group(function () {
    Route::prefix('register')->name('register.')->group(function () {
        Route::get('/', 'RegisterController@index')->name('index');

        Route::post('/', 'RegisterController@register')->name('register');
    });

    Route::get('email/verify/{id}/{hash}', 'VerificationController@verify')->name('verify');
});

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('verified')->group(function () {
    Route::middleware('auth')->group(function () {
        Route::namespace('Client')->group(function () {
            Route::get('dashboard', 'DashboardController@index')->name('dashboard.index');

            Route::prefix('domain')->name('domain.')->group(function () {
                Route::get('/', 'DomainController@index')->name('index');
                Route::get('/new', 'DomainController@new')->name('new');
                Route::get('/{domain}/edit', 'DomainController@edit')->name('edit')->where('domain', '[0-9]+');

                Route::post('/store', 'DomainController@store')->name('store');
                Route::post('/{domain}/update', 'DomainController@update')->name('update')->where('domain', '[0-9]+');
                Route::post('/{domain}/delete', 'DomainController@delete')->name('delete')->where('domain', '[0-9]+');
            });

            Route::prefix('dns')->name('dns.')->group(function () {
                Route::get('/', 'DnsController@index')->name('index');
                Route::get('{domain}/domain/new/', 'DnsController@new')->name('new')->where('domain', '[0-9]+');
                // Route::get('{domain}/domain/{dns}/edit/', 'DnsController@edit')->name('edit')->where('domain', '[0-9]+');

                Route::post('/store', 'DnsController@store')->name('store');
            });
        });
    });
});
