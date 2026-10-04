<?php

use App\Http\Controllers\NewsletterUnsubscribeController;
use App\Livewire\Components\Bedding\Contacts;
use App\Livewire\Components\Bedding\CustomTailoring;
use App\Livewire\Components\Bedding\Fabrics;
use App\Livewire\Components\Bedding\Hero;
use App\Livewire\Components\Bedding\HowItWorks;
use App\Livewire\Components\Bedding\OrderForm;
use App\Livewire\Components\Bedding\OurWorks;
use Illuminate\Support\Facades\Route;

Route::group([], function () {

    Route::get('/', Hero::class)
        ->name('home');

    Route::get('/newsletter/unsubscribe/{token}',
        NewsletterUnsubscribeController::class)
        ->name('unsubscribe');

    Route::get('/fabrics', Fabrics::class)
        ->name('fabrics');

    Route::get('/sizes', CustomTailoring::class)
        ->name('sizes');

    Route::get('/process', HowItWorks::class)
        ->name('prcess');

    Route::get('/order-form', OrderForm::class)
        ->name('order-form');

    Route::get('/our-works', OurWorks::class)
        ->name('our-works');
    Route::get('/contacts', Contacts::class)
        ->name('contacts');
});

Route::get(
    '/newsletter/unsubscribe/{token}',
    NewsletterUnsubscribeController::class,
)->name('newsletter.unsubscribe');
