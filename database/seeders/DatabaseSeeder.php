<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Company;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;
use Nette\Utils\Random;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        /*
        $categories = Category::factory()->count(4);

        $products = Product::factory()
            ->hasAttached(rand(1, 50), ['rating' => rand(1, 5)], 'usersRated')
            ->count(4);

        Company::factory()
            ->has($products)
            ->count(50)
            ->hasAttached($categories)
            ->create();
       */


        // ->for($companies, 'company');
        // ->hasAttached(User::factory()->count(6), ['rating' => 4], 'usersRated');

        $products = Product::factory()
            ->count(4);

        $companies = Company::factory()
            ->count(4)
            ->hasAttached(Category::factory()->count(4))
            ->has($products);

        User::factory(50)
            ->has($companies)
            ->hasAttached(1, ['rating' => 1], 'productsRated')
            ->create();
    }
}
