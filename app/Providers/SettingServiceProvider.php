<?php


namespace App\Providers;

use App\Models\Setting;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class SettingServiceProvider extends ServiceProvider
{
    public function register(): void {}

    public function boot(): void
    {
        // Only run if the table exists to avoid errors during initial migration
        if (!app()->runningInConsole() && Schema::hasTable('settings')) {

            $settings = Setting::getAllSettings();

            // 1. Set global config so you can use config('settings.site_name')
            config(['settings' => $settings]);

            // 2. Dynamic Mail Configuration (Optional but pro)
            if (isset($settings['mail_from_address'])) {
                config(['mail.from.address' => $settings['mail_from_address']]);
                config(['mail.from.name' => $settings['site_name'] ?? 'Sabyasachi Roy']);
            }
        }
    }
}
