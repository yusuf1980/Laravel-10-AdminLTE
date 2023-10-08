<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use App\Scope\PublishedTrait;

class Post extends Model
{
    use HasFactory, HasSlug, PublishedTrait;

    protected $fillable = [
        'title',
        'user_id',
        'category_id',
        'published_date',
        'content',
        'summary',
        'slug',
        'image',
        'published'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    public function getPublishedDateAttribute($value)
    {
        $published = explode('-', $value);
        return $published[2].'-'.$published[1].'-'.$published[0];
    }
}
