<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Image;
class ImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Image::create([
            'shop_id' => '1',
            'image_url' => 'https://coachtech-matter.s3-ap-northeast-1.amazonaws.com/image/sushi.jpg',
        ]);
        Image::create([
            'shop_id' => '2',
            'image_url' => 'https://coachtech-matter.s3-ap-northeast-1.amazonaws.com/image/yakiniku.jpg',
        ]);
        Image::create([
            'shop_id' => '3',
            'image_url' => 'https://coachtech-matter.s3-ap-northeast-1.amazonaws.com/image/izakaya.jpg',
        ]);
        Image::create([
            'shop_id' => '4',
            'image_url' => 'https://coachtech-matter.s3-ap-northeast-1.amazonaws.com/image/italian.jpg',
        ]);
        Image::create([
            'shop_id' => '5',
            'image_url' => 'https://coachtech-matter.s3-ap-northeast-1.amazonaws.com/image/ramen.jpg',
        ]);
        Image::create([
            'shop_id' => '6',
            'image_url' => 'https://coachtech-matter.s3-ap-northeast-1.amazonaws.com/image/yakiniku.jpg',
        ]);
        Image::create([
            'shop_id' => '7',
            'image_url' => 'https://coachtech-matter.s3-ap-northeast-1.amazonaws.com/image/italian.jpg',
        ]);
        Image::create([
            'shop_id' => '8',
            'image_url' => 'https://coachtech-matter.s3-ap-northeast-1.amazonaws.com/image/ramen.jpg',
        ]);
        Image::create([
            'shop_id' => '9',
            'image_url' => 'https://coachtech-matter.s3-ap-northeast-1.amazonaws.com/image/izakaya.jpg',
        ]);
        Image::create([
            'shop_id' => '10',
            'image_url' => 'https://coachtech-matter.s3-ap-northeast-1.amazonaws.com/image/sushi.jpg',
        ]);
        Image::create([
            'shop_id' => '11',
            'image_url' => 'https://coachtech-matter.s3-ap-northeast-1.amazonaws.com/image/yakiniku.jpg',
        ]);
        Image::create([
            'shop_id' => '12',
            'image_url' => 'https://coachtech-matter.s3-ap-northeast-1.amazonaws.com/image/yakiniku.jpg',
        ]);
        Image::create([
            'shop_id' => '13',
            'image_url' => 'https://coachtech-matter.s3-ap-northeast-1.amazonaws.com/image/izakaya.jpg',
        ]);
        Image::create([
            'shop_id' => '14',
            'image_url' => 'https://coachtech-matter.s3-ap-northeast-1.amazonaws.com/image/sushi.jpg',
        ]);
        Image::create([
            'shop_id' => '15',
            'image_url' => 'https://coachtech-matter.s3-ap-northeast-1.amazonaws.com/image/ramen.jpg',
        ]);
        Image::create([
            'shop_id' => '16',
            'image_url' => 'https://coachtech-matter.s3-ap-northeast-1.amazonaws.com/image/izakaya.jpg',
        ]);
        Image::create([
            'shop_id' => '17',
            'image_url' => 'https://coachtech-matter.s3-ap-northeast-1.amazonaws.com/image/sushi.jpg',
        ]);
        Image::create([
            'shop_id' => '18',
            'image_url' => 'https://coachtech-matter.s3-ap-northeast-1.amazonaws.com/image/yakiniku.jpg',
        ]);
        Image::create([
            'shop_id' => '19',
            'image_url' => 'https://coachtech-matter.s3-ap-northeast-1.amazonaws.com/image/italian.jpg',
        ]);
        Image::create([
            'shop_id' => '20',
            'image_url' => 'https://coachtech-matter.s3-ap-northeast-1.amazonaws.com/image/sushi.jpg',
        ]);
    }
}
