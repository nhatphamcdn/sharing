<?php

use Illuminate\Database\Seeder;
use App\Tag;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $seedTags = [
            [
                'name' => 'Technical',
                'slug' => 'technical'
            ],
            [
                'name' => 'PHP sharing',
                'slug' => 'php-sharing'
            ],
            [
                'name' => 'Javascript sharing',
                'slug' => 'javascript-sharing'
            ],
            [
                'name' => 'QA',
                'slug' => 'qa'
            ],
            [
                'name' => 'Solution expert',
                'slug' => 'solution-expert'
            ]
        ];

        foreach($seedTags as $tag) {
            $create = Tag::create($tag);

            if (!$create) {
                echo 'Create tag fail.';
            }
        }
    }
}
