<?php

namespace App\Providers;

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
            //システムオーナーのみ表示
            if (Auth::guard()->name != "owner"){
                $event->menu->remove('owner_grant_permissions_owner_only');
                $event->menu->remove('owner_dashboard_owner_only');
                $event->menu->remove('owner_add_admin_owner_only');
            }
            //管理者のみ表示
            if (Auth::guard()->name != "admin"){
                $event->menu->remove('admin_dashboard_admin_only');
                $event->menu->remove('admin_search_member_admin_only');

            }
            //ユーザー以外表示
            if (Auth::guard()->name =="web"){
                $event->menu->remove('admin_add_predictive_data_admin_only');

            }
            //ユーザーのみ表示
            if (Auth::guard()->name !="web"){
                $event->menu->remove('edit_user_only');
                $event->menu->remove('profile_user_only');
                $event->menu->remove('user_skill_sheet');
                $event->menu->remove('project_user_only');
                $event->menu->remove('engineer_skills_user_only');
                $event->menu->remove('language_proficiency_user_only');
                $event->menu->remove('qualification_user_only');
                $event->menu->remove('portfolio_user_only');
                $event->menu->remove('inexperienced_skills_user_only');
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
