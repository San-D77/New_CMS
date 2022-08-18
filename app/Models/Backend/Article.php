<?php

namespace App\Models\Backend;

use App\Jobs\Backend\ArticleLogJob;
use App\Jobs\HomePageCache;
use App\Models\Backend\User;
use App\Models\Traits\SeoTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory, SeoTrait;

    protected $fillable = [
        'title',
        'slug',
        'summary',
        'body',
        'image',
        'category_id',
        'writer_id',
        'editor_id',
        'published_at',
        'status',
        'task_status',
        'tables',
    ];

    protected $casts = [
        'tables' => 'array',
    ];

    protected $hidden = [
        "body",
        "created_at",
        "updated_at",
        "deleted_at",
        "published_at",
        "status",
        "task_status",
        "tables",
        "editor_id"
    ];


    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function writer()
    {
        return $this->belongsTo(User::class, 'writer_id');
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'writer_id');
    }

    public function editor()
    {
        return $this->belongsTo(User::class, 'editor_id');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, ArticleTag::class);
    }


    public function articleLog()
    {
        return $this->hasMany(ArticleLog::class);
    }

    public function getDiscussionsAttribute()
    {
        return array_filter($this->articleLog()
            ->whereNotNull("discussion")
            ->select("article_id", "id", "discussion")
            ->get()->pluck("discussion")->toArray() ?? []);
    }


    public function more()
    {
        return Article::whereNot("id", $this->id)->limit(8)->get();
    }

    public function youMayAlsoLike()
    {
        return Article::whereNot("id", $this->id)->limit(8)->get();
    }


    public static function boot()
    {
        parent::boot();
        static::created(function ($model) {
            HomePageCache::dispatchAfterResponse();

        });
        static::updated(function ($model) {
            HomePageCache::dispatchAfterResponse();
        });
    }
}
