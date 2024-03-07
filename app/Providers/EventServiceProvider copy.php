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

            dump($user->first_name);
            dump($role_name . "::ロール");
            dump($user->role->id . "::ロールID");

            //システムオーナー以外非表示
            if ($role_name != "owner") {
                $event->menu->remove('grant_permissions_owner');
            }

            //管理者以外非表示
            if ($role_name != "admin" ) {
                $event->menu->remove('admin_dashboard_admin');
                $event->menu->remove('admin_search_member_admin');
                $event->menu->remove('owner_grant_permissions_owner');
                $event->menu->remove('owner_add_admin_owner');
            }
            //ユーザー以外表示
            if ($role_name != "user") {
                $event->menu->remove('admin_add_predictive_data_admin');
            }
            // //ユーザーのみ表示
            if ($role_name != "user") {
                $event->menu->remove('edit_user');
                $event->menu->remove('profile_user');
                $event->menu->remove('user_skill_sheet');
                $event->menu->remove('project_user');
                $event->menu->remove('engineer_skills_user');
                $event->menu->remove('language_proficiency_user');
                $event->menu->remove('qualification_user');
                $event->menu->remove('portfolio_user');
                $event->menu->remove('inexperienced_skills_user');
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
