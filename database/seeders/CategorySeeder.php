<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        Schema::disableForeignKeyConstraints();
        Category::truncate();
        Schema::enableForeignkeyConstraints();

        $data=[
            'action', 'romance', 'fiksi', 'horor'
        ];

        foreach ($data as $value) {
            Category::insert([
                'name' => $value
            ]);
        }
    }
}
