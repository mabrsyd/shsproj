<?php

namespace Database\Factories;

use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProjectFactory extends Factory
{
    /**
     * Nama model yang terkait dengan factory.
     *
     * @var string
     */
    protected $model = Project::class;

    /**
     * Definisikan model state untuk factory.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'customer_name' => $this->faker->name,
            'laptop_brand' => $this->faker->word,
            'issue_description' => $this->faker->sentence,
            'total_price' => $this->faker->numberBetween(1000000, 10000000),
            'status' => $this->faker->randomElement(['Dalam Proses', 'Selesai']),
        ];
    }
}
