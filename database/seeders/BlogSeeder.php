<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Blog::create([
            'title' => 'The Future of AI',
            'slug' => 'the-future-of-ai',
            'meta_title' => 'Exploring the Future of Artificial Intelligence',
            'meta_keywords' => 'AI, artificial intelligence, technology',
            'meta_description' => 'An in-depth look at the advancements in AI.',
            'short_description' => 'AI is transforming industries.',
            'description' => 'Artificial Intelligence is revolutionizing the way we live and work.',
            'user_id' => 1,
            'blog_category_id' => 1, // Technology
            'status' => '1',
            'trending' => '1',
            'latest' => '1',
            'featured' => '1',
            'popular' => '1',
            'other' => '0',
        ]);

        \App\Models\Blog::create([
            'title' => 'Healthy Eating Habits',
            'slug' => 'healthy-eating-habits',
            'meta_title' => 'Adopting Healthy Eating Habits',
            'meta_keywords' => 'health, nutrition, diet',
            'meta_description' => 'Tips for maintaining a healthy diet.',
            'short_description' => 'Eat well to live well.',
            'description' => 'Discover the benefits of healthy eating.',
            'user_id' => 1,
            'blog_category_id' => 2, // Health
            'status' => '1',
            'trending' => '1',
            'latest' => '1',
            'featured' => '0',
            'popular' => '1',
            'other' => '0',
        ]);

        \App\Models\Blog::create([
            'title' => 'Top Travel Destinations',
            'slug' => 'top-travel-destinations',
            'meta_title' => 'Best Travel Destinations in 2023',
            'meta_keywords' => 'travel, destinations, vacation',
            'meta_description' => 'Explore the top places to visit.',
            'short_description' => 'Plan your next adventure.',
            'description' => 'A guide to the most beautiful destinations.',
            'user_id' => 1,
            'blog_category_id' => 3, // Travel
            'status' => '1',
            'trending' => '0',
            'latest' => '1',
            'featured' => '1',
            'popular' => '0',
            'other' => '1',
        ]);
    }
}
