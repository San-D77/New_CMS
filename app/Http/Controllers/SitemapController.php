<?php

namespace App\Http\Controllers;

use App\Models\Backend\Article;
use App\Models\Backend\Category;
use App\Models\Backend\Tag;
use App\Models\Backend\WebSetting;
use Illuminate\Http\Request;

class SitemapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function robots(){
        $output = "User-agent: *\n";
        $output .= "Disallow:\n\n";
        $output .= "Sitemap: " . url('sitemap.xml') . "\n"; // Add the sitemap URL

        return response($output)->header('Content-Type', 'text/plain');
     }

    public function index()
    {
        $static_routes = ["home"];
        $privacy_policy = WebSetting::where('key','privacy-policy')->first();
        $about_us = WebSetting::where('key','about-us')->first();
        $contact_us = WebSetting::where('key','contact-us')->first();
        $categories = Category::select("slug", "updated_at")->get();
        $articles = Article::where('status','1')->where('task_status','published')->select('slug','updated_at')->get();
        return response()->view("frontend.pages.sitemap.index", compact("static_routes", "categories", "articles", "privacy_policy","contact_us","about_us"))->header('Content-Type', 'text/xml');
    }


}
