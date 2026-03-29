<?php

namespace App\Models;

use App\Enums\SettingType;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = ['group', 'name', 'slug', 'type', 'value', 'options', 'description', 'is_private'];

    protected $casts = [
        'type' => SettingType::class,
        'options' => 'array',
        'is_private' => 'boolean',
    ];

    public static function get($slug, $default = null)
    {
        $setting = self::where('slug', $slug)->first();
        if (!$setting) return $default;
        if ($setting->type === SettingType::IMAGE && $setting->value) return asset('storage/' . $setting->value);
        return $setting->value;
    }

    /**
     * Helper to get target attribute for URLs
     * Usage: <a href="{{ setting('link') }}" target="{{ Setting::getTarget('link') }}">
     */
    public static function getTarget($slug)
    {
        $setting = self::where('slug', $slug)->first();
        if ($setting && isset($setting->options['blank']) && $setting->options['blank']) {
            return '_blank';
        }
        return '_self';
    }
}
