<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\ResponseCache\Facades\ResponseCache;

class Setting extends Model
{
    use HasFactory;

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'is_active' => 'boolean',
    ];

    public static function boot()
    {
        parent::boot();

        Partner::created(function () {
            ResponseCache::clear();
        });

        Partner::updated(function () {
            ResponseCache::clear();
        });

        Partner::deleted(function () {
            ResponseCache::clear();
        });
    }

    /**
     * @return array
     */
    public static function activeSettings()
    {
        $settings = self::where('is_active', true)->get();
        $settingItems = [];
        foreach ($settings as $setting) {
            $settingItems[$setting->alias] = $setting;
        }
        return $settingItems;
    }

}
