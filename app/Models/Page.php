<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\ResponseCache\Facades\ResponseCache;

class Page extends Model
{
    use HasFactory;

    CONST ABOUT_ALIAS = 'about';
    CONST CONTACTS_ALIAS = 'contacts';
    CONST SECTIONS_ALIAS = 'sections';
    CONST SERVICES_ALIAS = 'services';
    CONST NEWS_ALIAS = 'news';

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'top_nav' => 'boolean',
        'bottom_nav' => 'boolean',
        'is_active' => 'boolean',
    ];

    public static function boot()
    {
        parent::boot();

        Page::created(function () {
            ResponseCache::clear();
        });

        Page::updated(function () {
            ResponseCache::clear();
        });

        Page::deleted(function () {
            ResponseCache::clear();
        });
    }

    /**
     * @return array
     */
    public static function activePages()
    {
        $pages = self::where('is_active', true)->orderBy('sort')->get();
        $pageItems = [];
        foreach ($pages as $page) {
            $pageItems[$page->alias] = $page;
        }

        return $pageItems;
    }
}
