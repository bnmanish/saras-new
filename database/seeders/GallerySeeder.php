<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Gallery;
use App\Models\GalleryImage;

class GallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Gallery::factory()->count(5)->create()->each(function ($gallery) {
            GalleryImage::factory()->count(rand(2, 5))->create([
                'gallery_id' => $gallery->id,
            ]);
        });
    }
}
