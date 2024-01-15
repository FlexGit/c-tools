<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\ResponseCache\Facades\ResponseCache;

class Product extends Model
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

        Product::created(function () {
            ResponseCache::clear();
        });

        Product::updated(function () {
            ResponseCache::clear();
        });

        Product::deleted(function () {
            ResponseCache::clear();
        });
    }

    public function section(): BelongsTo
    {
        return $this->belongsTo(Section::class);
    }
}
