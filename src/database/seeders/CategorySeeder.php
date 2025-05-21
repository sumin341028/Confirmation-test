<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        // 既存データを削除（リセット）
        DB::table('categories')->truncate();

        // すっきりしたカテゴリだけを登録
        $categories = [
            ['content' => '商品の交換について'],
            ['content' => '配送について'],
            ['content' => '返品について'],
            ['content' => 'その他のお問い合わせ'],
        ];

        DB::table('categories')->insert($categories);
    }
}