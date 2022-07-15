<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaction>
 */
class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $date = $this->faker->dateTimeBetween('-1 month', '+1 month');
        return [
            'name' => $this->faker->word(),
            'amount' => $this->faker->randomFloat(2, -100, 100),
            'category' => $this->randomCategory(),
            'updated_at' => $date,
            'created_at' => $date,
        ];
    }

    protected function randomCategory()
    {   
        $category = null;
        if ($this->faker->boolean()) {
            $category =  Arr::random([
                Category::CATEGORY_RENT,
                Category::CATEGORY_PHONE,
                Category::CATEGORY_INTERNET,
                Category::CATEGORY_PAPA_SUPPORT,
                Category::CATEGORY_BANK_FEES,
                null
            ]);
        }

        return $category;
    }
}
