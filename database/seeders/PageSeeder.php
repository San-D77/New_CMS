<?php

namespace Database\Seeders;

use App\Models\Backend\WebSetting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;


class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = file_get_contents(base_path("database/seeders/json/pages.json"));
        $data = json_decode($json, true);

        foreach ($data as $page) {
            $date = Carbon::now()->timezone('Asia/Kathmandu');
            $page['created_at'] = $date;
            $page['updated_at'] = $date;
            WebSetting::create($page);
        }
    }
}
