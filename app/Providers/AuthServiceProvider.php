<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\User;
use App\Policies\UserPolocy;
use Illuminate\Auth\Access\Response;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * アプリケーションのポリシーマッピング
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        User::class => UserPolocy::class,
    ];

    /**
     * 全アプリケーション認証／認可サービス登録
     */
    public function boot(): void
    {
        Gate::define('grant_admin',function(User $user){
            return $user->role_id === 2 || $user->role_id === 3;
        });
        Gate::define('grant_owner',function(User $user){
            return $user->role_id === 3;
        });
    }
}
