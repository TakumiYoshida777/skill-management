<?php

namespace App\Providers;

use App\Models\Admin;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Event;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        Event::listen(BuildingMenu::class, function (BuildingMenu $event) {


            $user = Auth::user();
            $role_name = $user->role->name ?? 'user';

            //システムオーナー以外非表示
            if ($role_name != "owner") {
                $event->menu->remove('grant_permissions_owner');//権限付与
            }

            // 管理者かつシステムオーナー以外非表示
            if ($role_name != "admin" && $role_name != "owner") {
                $event->menu->remove('admin_dashboard_admin');//管理者ホーム
                $event->menu->remove('admin_search_member_admin');//ユーザー検索画面
            }

        });
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
