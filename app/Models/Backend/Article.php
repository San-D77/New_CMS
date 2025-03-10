<?php

namespace App\Models\Backend;

use App\Jobs\Backend\ArticleLogJob;
use App\Jobs\HomePageCache;
use App\Jobs\OrgSchema;
use App\Models\Backend\User;
use App\Models\StaticPost;
use App\Models\Traits\SeoTrait;
use DOMDocument;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Article extends Model
{
    use HasFactory, SeoTrait;


    protected $fillable = ['title', 'slug', 'summary', 'body', 'image', 'category_id', 'writer_id', 'editor_id', 'published_at', 'status', 'task_status', 'tables', "is_featured", "editor_choice",'featured_image_alt_text','schema','views','faq','faq_schema'];

    protected $casts = [
        'tables' => 'array',
        'published_at' => 'datetime',
    ];

    protected $hidden = ['created_at', 'updated_at', 'deleted_at', 'published_at', 'status', 'task_status', 'tables', 'editor_id'];

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

    public function staticPost()
    {
        return $this->hasOne(StaticPost::class);
    }

    public function articleLog()
    {
        return $this->hasMany(ArticleLog::class);
    }

    public function getDiscussionsAttribute()
    {
        return array_filter(
            $this->articleLog()
                ->whereNotNull('discussion')
                ->select('article_id', 'id', 'discussion')
                ->get()
                ->pluck('discussion')
                ->toArray() ?? [],
        );
    }

    public function readMore()
    {
        return null;
    }

    public function linkableArticles($search = null)
    {
        $url = url('/') . '/';
        $articles = Article::where('task_status', 'published')
            ->where('status', 1)
            ->where('id', '!=', $this->id)
            ->select(DB::raw("title, id , CONCAT('$url',slug) as value , image"))->where('title', 'like', "%$search%")
            ->get();



        $ar = Article::where('task_status', 'published')
        ->where('status', 1)
        ->where('id', '!=', $this->id)
        ->select(DB::raw("title, id , CONCAT('$url',slug) as value , image"))->where('body', 'like', "%$search%")
        ->whereNotIn('id', $articles->pluck('id')->toArray())
        ->get();

        $articles = $articles->merge($ar);

        return $articles;
    }

    public function getIncomingLinkAttribute()
    {
        return Article::where('body', 'like', '%' . route('singleArticle', $this->slug) . '%')
            ->where('id', '!=', $this->id)
            ->count() ?? 0;
    }

    public function getOutgoingLinkAttribute()
    {
        $n = 'href="'.env("APP_URL");
        $count =  substr_count($this->body,    $n);
    if($count){
        return $count;
    }else{
        return 0;
    }
    }

    public function more()
    {
        return Article::whereNot('id', $this->id)
            ->limit(8)
            ->get();
    }

    public function youMayAlsoLike()
    {
        return Article::whereNot('id', $this->id)
            ->limit(8)
            ->get();
    }

    public function readMoreArticles()
    {
        return $this->belongsToMany(Article::class, ReadMoreArticle::class, 'article_id', 'read_more_article_id')->ActiveAndPublish();
    }

    // public function getBodyAttribute($value)
    // {
    //     $dom = new DOMDocument();
    //     $dom->loadHTML($value);
    //     $images = $dom->getElementsByTagName('img');
    //     foreach ($images as $image) {
    //         $image->setAttribute('class', 'img-fluid');
    //     }
    //     return $dom->saveHTML();
    // }

    public static function boot()
    {
        parent::boot();
        static::created(function ($model) {
            HomePageCache::dispatchAfterResponse();
            OrgSchema::dispatchAfterResponse($model);
            if ($model->task_status == "published") {
                OrgSchema::dispatch($model);
            }
        });
        static::updated(function ($model) {
            HomePageCache::dispatchAfterResponse();
            OrgSchema::dispatchAfterResponse($model);
            if ($model->task_status == "published") {
                OrgSchema::dispatch($model);
            }
        });
    }

    public function scopeActiveAndPublish(Builder $q)
    {
        return $q->where('task_status', 'published')->where('status', 1)->orderBy('published_at', 'desc');
    }

    public function scopeSearchJson(Builder $q, $field, $value)

    {
        return $q->where("tables->quick-facts->$field", "like", "%$value%");
    }
}
