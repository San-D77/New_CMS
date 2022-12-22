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

            $category_section = [];

            if(config('constants.homepage_category')){
                $parameter = 'slug';
                $value = config('constants.homepage_category');
            }else{
                $parameter = 'id';
                $value = 1;
            }

            foreach (
                Category::where($parameter, $value)
                    ->where('status', 1)
                    ->get()
                as $key => $category
            ) {
                $category_section[$category->slug]['category'] = $category;

                $articles1 = $category
                    ->articles()
                    ->with(['category', 'writer'])
                    ->where('task_status', 'published')
                    ->limit(config('constants.article_limit', 7))
                    ->whereNotIn('id', $ids)
                    ->get();

                $ids = array_merge($ids, $articles1->pluck('id')->toArray());

                $articles2 = $category
                    ->articles()
                    ->with(['category', 'writer'])
                    ->where('task_status', 'published')
                    ->limit(2)
                    ->whereNotIn('id', $ids)
                    ->get();
                $ids = array_merge($ids, $articles2->pluck('id')->toArray());

                $category_section[$category->slug]['articles'] = [$articles1, $articles2];
                if ($key == 0) {
                    $category_section[$category->slug]['second']['title'] = 'Editor Choice';
                    $category_section[$category->slug]['second']['articles'] = $editor_choice;
                }
            }
            $today = explode(" ",carbon()->format('F d'));
            return [
                'featured_articles' => $featured_articles,
                'category_section' => $category_section,
                'born_today' => Article::activeAndPublish()
                    ->with(['category', 'writer'])
                    ->where('task_status', 'published')
                    ->where('tables->quick-facts->birth-month->value', '=', $today[0])
                    ->where('tables->quick-facts->birth-day->value', '=', $today[1])
                    ->limit(config('constants.article_limit', 8))
                    ->get(),
                'died_today' => Article::activeAndPublish()
                    ->with(['category', 'writer'])
                    ->where('task_status', 'published')
                    ->where('tables->quick-facts->death-month->value', '=', $today[0])
                    ->where('tables->quick-facts->death-day->value', '=', $today[1])
                    ->limit(config('constants.article_limit', 8))
                    ->get(),
            ];
        });
    }
}
