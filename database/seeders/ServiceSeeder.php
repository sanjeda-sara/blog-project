<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 10; $i++)
        {
            Service::create([
                'service_title' => Str::random(15),
                'service_image' => 'assets/images/service-images/'.$i.'.png',
                'service_content' => Str::random(200),
                'status'        => 1,
                'hit_count'     => 1
            ]);
        }
    }
}
