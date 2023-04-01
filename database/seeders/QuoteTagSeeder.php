<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\{
    Quote,
    Tag
};

class QuoteTagSeeder extends Seeder
{
    public function run()
    {
        $tags = Tag::factory(100)->create();

        Quote::factory(100)->create()
                ->each(function($quote) use($tags){
                    $quote->tags()->attach($tags->random(1, 100));
                });
    }
}
