<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Invoice>
 */
class InvoiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'invoice_id' => $this->faker->sentence(6),
            'user_id' => '6',
            'from_street_address' => $this->faker->sentence(25),
            'status' => 'pending',
            'payment_due' => $this->faker->date(),
            'from_city' => $this->faker->sentence(20),
            'from_zip' => $this->faker->sentence(20),
            'from_country' => $this->faker->sentence(20),
            'to_name' => $this->faker->sentence(20),
            'to_email' => $this->faker->sentence(20),
            'to_street_address' => $this->faker->sentence(20),
            'to_city' => $this->faker->sentence(20),
            'to_zip' => $this->faker->sentence(20),
            'to_country' => $this->faker->sentence(20),
            'issue_date' => $this->faker->date(),
            'payment_terms' => $this->faker->sentence(10),
            'project_description' => $this->faker->sentence(20),
            'item1_name' => $this->faker->sentence(20),
            'item1_qty' => $this->faker->numberBetween(1, 100),
            'item1_price' => $this->faker->numberBetween(1, 10000),
            'item1_total' => $this->faker->numberBetween(1, 1000000),
            'item2_name' => $this->faker->sentence(20),
            'item2_qty' => $this->faker->numberBetween(1, 100),
            'item2_price' => $this->faker->numberBetween(1, 10000),
            'item2_total' => $this->faker->numberBetween(1, 1000000),
            'item3_name' => $this->faker->sentence(20),
            'item3_qty' => $this->faker->numberBetween(1, 100),
            'item3_price' => $this->faker->numberBetween(1, 10000),
            'item3_total' => $this->faker->numberBetween(1, 1000000)
        ];
    }
}
