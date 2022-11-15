<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Employee;

class employee_factoryFactory extends Factory
{
    protected $model = Employee::class;

    public function definition()
    {
        return [
          'name' =>$this->faker->name,
          'email' =>$this->faker->email,
          'designation' =>$this->faker->designation,
          'department' =>$this->faker->department
        ];
    }
}
