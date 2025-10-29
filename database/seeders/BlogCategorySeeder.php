<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BlogCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\BlogCategory::create([
            'title' => 'Technology',
            'slug' => 'technology',
            'meta_title' => 'Technology Blogs',
            'meta_keywords' => 'tech, innovation, gadgets',
            'meta_description' => 'Latest blogs on technology and innovation.',
            'description' => 'Explore the world of technology.',
            'status' => 'active',
        ]);

        \App\Models\BlogCategory::create([
            'title' => 'Health',
            'slug' => 'health',
            'meta_title' => 'Health and Wellness',
            'meta_keywords' => 'health, wellness, fitness',
            'meta_description' => 'Tips and articles on health and wellness.',
            'description' => 'Stay healthy and fit.',
            'status' => 'active',
        ]);

        \App\Models\BlogCategory::create([
            'title' => 'Travel',
            'slug' => 'travel',
            'meta_title' => 'Travel Adventures',
            'meta_keywords' => 'travel, adventure, destinations',
            'meta_description' => 'Discover new places and travel tips.',
            'description' => 'Embark on amazing travel journeys.',
            'status' => 'active',
        ]);
    }
}
