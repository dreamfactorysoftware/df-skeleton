<?php
namespace DreamFactory\Core\Database;

use DreamFactory\Core\System\Resources\ExampleResource;
use DreamFactory\Core\System\Components\SystemResourceManager;
use DreamFactory\Core\System\Components\SystemResourceType;
use DreamFactory\Core\Enums\LicenseLevel;


class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    public function boot()
    {
//        $this->addMiddleware();

        // subscribe to all listened to events
//        Event::subscribe(new EventHandler());

        // add migrations
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
    }

    public function register()
    {
        // Add system service types.
        $this->app->resolving('df.system.resource', function (SystemResourceManager $df) {
            $df->addType(
                new SystemResourceType([
                    'name'                  => 'example',
                    'label'                 => 'Example Resource',
                    'description'           => 'Example of new system service.',
                    'class_name'            => ExampleResource::class,
                    'subscription_required' => LicenseLevel::GOLD,
                    'singleton'             => false,
                    'read_only'             => false,
                ])
            );
        });
    }

}
