<?php

use App\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = ['star', 'sun', 'moon', 'planet'];

        foreach($tags as $tag_name){
            $newTag = new Tag;
            $newTag->name = $tag_name;
            $newTag->slug = Str::of($tag_name)->slug("-");
            $newTag->save();
        }
    }
}
