<?php

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            [
                'product_name' => 'Tablet Lenovo',
                'product_code' => '4556',
                'price' => '95.00',
            ],
            [
                'product_name' => 'Tablet Asus 12',
                'product_code' => '7878',
                'price' => '320.00',
            ],
            [
                'product_name' => 'Samsung',
                'product_code' => '3467',
                'price' => '120.00',
            ],
            [
                'product_name' => 'GSM Samsung',
                'product_code' => '2478',
                'price' => '199.00',
            ],
        ];

        foreach ($products as $product_item) {
            $product = Product::where('product_code', $product_item['product_code'])->first();
            if (!$product) {
                $product = new Product;
            }    
            $product->product_name = $product_item['product_name'];
            $product->product_code = $product_item['product_code'];
            $product->price = $product_item['price'];
            $product->save();
        }    
    }
}
