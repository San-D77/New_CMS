<?php

namespace App\Jobs;

use App\Models\Backend\Article;
use App\Models\Backend\Category;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Cache;

class HomePageCache implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Cache::forget(config('constants.home_page_cache_key'));
        return self::getCache();
    }

    public static function getCache()
    {
        return Cache::rememberForever(config('constants.home_page_cache_key'), function () {
            // get featured articles
            $featured_articles = Article::activeAndPublish()
                ->with(['category', 'writer'])
                ->where('is_featured', true)
                ->where('task_status', 'published')
                ->limit(config('constants.article_limit', 8))
                ->get();
            $ids = $featured_articles->pluck('id')->toArray();

            $editor_choice = Article::activeAndPublish()
                ->with(['category', 'writer'])
                ->where('task_status', 'published')
                ->where('editor_choice', 1)
                ->limit(config('constants.article_limit', 8))
                ->whereNotIn('id', $ids)
                ->get();

            $ids = array_merge($ids, $editor_choice->pluck('id')->toArray());



            $category_articles = [];
            foreach (
                config('constants.homepage_categories')
                 as $category_slug
            ) {
                $cat = Category::where('slug',$category_slug)->where('status',1)->first();
                if($cat){
                    array_push($category_articles, $cat
                    ->articles()
                    ->with(['category', 'writer'])
                    ->where('task_status', 'published')
                    ->limit(config('constants.article_limit', 7))
                    ->whereNotIn('id', $ids)
                    ->get());
                }
            }
            return [
                'featured_articles' => $featured_articles,
                'editor_choice' => $editor_choice,
                'category_articles' => $category_articles

            ];
        });
    }
}
