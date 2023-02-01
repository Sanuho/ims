<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Item>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'item_cd'=> $this->faker->randomNumber(9,true),
            'item_nm'=>$this->faker->words(2, true),
            'cust_pn'=>$this->faker->word(),
            'category_id'=>$this->faker->numberBetween(1, 7),
            'unit_id'=>$this->faker->numberBetween(1, 3),
            'pck_unit_cd'=>$this->faker->randomDigitNotNull(),
            'customer_id'=>1,
            'location_id'=>$this->faker->randomDigitNotNull(),
            'buy_price'=>$this->faker->randomNumber(9,true),
            'sel_price'=>$this->faker->randomNumber(9,true),
            'active_flg'=>1
        ];
    }
}
