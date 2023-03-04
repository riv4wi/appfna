<?php

use App\Photo;
use Illuminate\Database\Seeder;

class PhotoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Photo::class)->create([
            'uuid'              => '35b9f4b9-bc8f-4439-b149-80a6d19b3443',
            'path'   	        => null,
            'original_name'     => 'casco1.png',
            'article_uuid'      => 'afc918e8-fe8d-42ce-a145-fba5d4cfbebb',
        ]);

        factory(Photo::class)->create([
            'uuid'              => '983f2c7e-0aca-42b7-b1e3-9015392ce66a',
            'path'   	        => null,
            'original_name'     => 'casco2.png',
            'article_uuid'      => 'afc918e8-fe8d-42ce-a145-fba5d4cfbebb',
        ]);

        factory(Photo::class)->create([
            'uuid'              => '0cb37faa-bfb3-479e-adb7-e26d074ddf25',
            'path'   	        => null,
            'original_name'     => 'casco3.png',
            'article_uuid'      => 'afc918e8-fe8d-42ce-a145-fba5d4cfbebb',
        ]);

        factory(Photo::class)->create([
            'uuid'              => '1f0f968c-1f1c-45e1-9dee-dfc4dd63a3b8',
            'path'   	        => null,
            'original_name'     => 'MTB Raleigh Mojave.png',
            'article_uuid'      => '8749d65f-14c9-4665-8243-9530af4ceb19',
        ]);

        factory(Photo::class)->create([
            'uuid'              => '808116ca-2e70-466f-8580-e07e4e7d1174',
            'path'   	        => null,
            'original_name'     => 'venzo-primal.png',
            'article_uuid'      => '808116ca-2e70-466f-8580-e07e4e7d1174',
        ]);
    }
}
