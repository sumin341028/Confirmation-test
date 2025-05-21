<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use App\Models\Contact;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('contacts')->truncate();
        DB::table('categories')->truncate();

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        
        $categories = [
            ['content' => '商品の交換について'],
            ['content' => '配送について'],
            ['content' => '返品について'],
            ['content' => 'その他のお問い合わせ'],
        ];
        DB::table('categories')->insert($categories);

        
        Contact::factory()->count(35)->create();
    }
}