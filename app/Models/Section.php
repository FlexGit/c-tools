<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\ResponseCache\Facades\ResponseCache;

class Section extends Model
{
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

        Section::created(function () {
            ResponseCache::clear();
        });

        Section::updated(function () {
            ResponseCache::clear();
        });

        Section::deleted(function () {
            ResponseCache::clear();
        });
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    public function section(): BelongsTo
    {
        return $this->belongsTo(Section::class);
    }

    public function sections(): HasMany
    {
        return $this->hasMany(Section::class);
    }

    /**
     * @param $sectionId
     * @return mixed
     */
    public static function activeSections($sectionId = 0) {
        $sections = self::where('is_active', true)->orderBy('title')->get();
        if ($sectionId) {
            $sections = $sections->where('section_id', $sectionId);
        } else {
            $sections = $sections->whereNull('section_id');
        }

        return $sections;
    }
}
