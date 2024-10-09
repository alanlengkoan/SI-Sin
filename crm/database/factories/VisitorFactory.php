<?php

namespace Database\Factories;

use App\Models\Visitor;
use Illuminate\Database\Eloquent\Factories\Factory;

class VisitorFactory extends Factory
{
    protected $model = Visitor::class;

    public function definition()
    {
        return [
            'ip'         => $this->faker->ipv4,
            'city'       => $this->faker->city,
            'region'     => $this->faker->state,
            'country'    => $this->faker->country,
            'loc'        => $this->faker->city,
            'org'        => $this->faker->company,
            'timezone'   => $this->faker->timezone,
            'created_at' => $this->faker->dateTimeThisMonth,
        ];
    }
}
