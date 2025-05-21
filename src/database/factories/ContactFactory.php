<?php

namespace Database\Factories;

use App\Models\Contact;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;

class ContactFactory extends Factory
{
    protected $model = Contact::class;

    public function definition(): array
    {
        $faker = \Faker\Factory::create('ja_JP'); // 日本語Faker

        $details = [
            '商品が破損して届きました。交換をお願いします。',
            '注文した商品が届きません。',
            'サイズが合わなかったので返品したいです。',
            '配送の時間指定はできますか？',
            '領収書の発行は可能でしょうか？',
            '商品について詳しく教えてください。',
            '問い合わせ内容が反映されていないようです。',
            '注文をキャンセルしたいです。',
            'お届け先の住所を変更したいです。',
            'サイトの使い方がよくわかりません。',
        ];

        return [
            'first_name' => $faker->firstName,
            'last_name' => $faker->lastName,
            'gender' => $faker->numberBetween(1, 2),
            'email' => $faker->unique()->safeEmail,
            'tel' => $faker->numerify('0##########'), // ハイフンなしに変更
            'address' => $faker->address,
            'building' => $faker->secondaryAddress,
            'category_id' => optional(Category::inRandomOrder()->first())->id ?? 1,
            'detail' => $faker->randomElement($details), // 日本語文ランダム選択！
            'created_at' => $faker->dateTimeBetween('-1 year', 'now'),
        ];
    }
}