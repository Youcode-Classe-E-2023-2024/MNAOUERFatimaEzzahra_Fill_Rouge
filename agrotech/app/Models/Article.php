<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Article extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'description',
        'date',
        'created_by',
        'picture',
        'categories_id',
        'tags_id'
    ];

    /**
     * Get the user that owns the phone.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }


    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'categories_id');
    }


    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class, 'tag_articles', 'articles_id', 'tags_id');
    }
}
