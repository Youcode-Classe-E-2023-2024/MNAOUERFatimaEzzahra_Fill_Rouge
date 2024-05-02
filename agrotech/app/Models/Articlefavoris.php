<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Articlefavoris extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'created_by',
        'article_id',
    ];

    public function article(): belongsTo
    {
        return $this->belongsTo(Article::class, 'article_id');
    }

    public function user(): belongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public static function isFavoris($user_id, $article_id)
    {
        return self::whereRaw("created_by = $user_id")->where('article_id', $article_id)->exists();
    }
}
