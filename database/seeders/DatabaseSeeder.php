<?php

namespace Database\Seeders;


// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Customer;
use App\Models\Product;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {


        Product::factory(50)->create();
        //Customer::factory(10)->create();
        // \App\Models\User::factory(10)->create();

        Customer::factory()->create([
            'first_name' => fake()->name(),
            'second_name' => fake()->name(),
            'last_name' => fake()->lastName(),
            'email' => fake()->email(),
            'password' => fake()->password()
        ]);

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
