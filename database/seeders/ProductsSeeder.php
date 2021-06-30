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

        foreach ($products as $product) {
            File::factory(5)->create([
                'fileable_id' => $product->id,
                'fileable_type' => Product::class,
            ]);

            $prices = [];

            foreach ($states as $state) {
                $prices[] = [
                    'price_list_id' => $priceList->id,
                    'state_id' => $state->id,
                    'amount' => rand(1, 5000) / 10
                ];
            }
            
            $product->prices()->createMany($prices);
        }
    }
}
