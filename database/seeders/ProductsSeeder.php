<?php

namespace Database\Seeders;

use App\Models\File;
use App\Models\State;
use App\Models\Product;
use App\Models\PriceList;
use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $priceList = PriceList::factory()->create();
        $products = Product::factory(10)->create();
        $states = State::all();

        $products->each(function ($product) use ($states, $priceList) {
            $product->files()->createMany(File::factory(5)->make()->toArray());

            $prices = $states->map(function ($state) use ($priceList) {
                return [
                    'price_list_id' => $priceList->id,
                    'state_id' => $state->id,
                    'amount' => rand(1, 5000) / 10
                ];
            });

            $product->prices()->createMany($prices);
        });
    }
}
