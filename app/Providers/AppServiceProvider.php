<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Validator::extend('custom_kana', function ($attribute, $value, $parameters, $validator) {
            return preg_match('/^[a-zA-Zァ-ンーぁ-ん]+$/u', $value);
        }, '指定されたフィールドは半角英字、全角カタカナ、または全角ひらがなでなければなりません。');
    }
}
