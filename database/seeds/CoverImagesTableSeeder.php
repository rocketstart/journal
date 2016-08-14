<?php

use App\Models\CoverImage;
use Illuminate\Database\Seeder;

class CoverImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        CoverImage::truncate();

        CoverImage::create([
            'url' => 'https://hd.unsplash.com/photo-1446776811953-b23d57bd21aa',
        ]);
    }
}
