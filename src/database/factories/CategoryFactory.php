<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    public function definition(): array
    {
        return [
            'content' => $this->faker->randomElement([
                '商品の交換について',
                '配送に関して',
                'その他のお問い合わせ',
            ]),
        ];
    }
}