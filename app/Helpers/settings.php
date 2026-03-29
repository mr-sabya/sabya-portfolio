<?php

use App\Models\Setting;
use Illuminate\Support\Facades\Storage;

if (!function_exists('setting')) {
    function setting($slug, $default = null)
    {
        $settings = Setting::getAllSettings();

        if (!array_key_exists($slug, $settings)) {
            return $default;
        }

        $value = $settings[$slug];

        // Logic for Image URLs
        // We check if the value looks like a file path stored in 'settings/'
        if (str_contains($value, 'settings/')) {
            return asset('storage/' . $value);
        }

        return $value;
    }
}
