<?php

use Illuminate\Database\Seeder;
use App\React;

class ReactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $seedReacts = [
            [
                'name' => 'Like',
                'slug' => 'like'
            ],
            [
                'name' => 'Normal',
                'slug' => 'normal'
            ],
            [
                'name' => 'Best solution',
                'slug' => 'best-solution'
            ],
            [
                'name' => 'Good',
                'slug' => 'good'
            ]
        ];

        foreach($seedReacts as $react) {
            $create = React::create($react);

            if (!$create) {
                echo 'Create react fail.';
            }
        }
    }
}
