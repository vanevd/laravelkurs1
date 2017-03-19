<?php

use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Client;
use App\Models\Product;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $orders = [
            [
                'order_number' => '100',
                'order_date' => '2017-03-05',
                'order_sum' => 100,
                'client' => [
                    'email' => 'vasko@abv.bg',
                ],
                'details' => [
                    [
                        'product' => [
                            'product_code' => '1234',
                        ],
                        'quantity' => 1,
                        'price' => 10,
                    ],
                    [
                        'product' => [
                            'product_code' => '1234',
                            'product_name' => 'www',
                            'price' => 20,
                        ]
                    ],

                ],
            ],    
            [
                'order_number' => '101',
                'order_date' => '2017-03-05',
                'order_sum' => 150,
                'client' => [
                    'email' => 'dragan@abv.bg',
                    'first_name' => 'Dragan',
                    'last_name' => 'Ivanov',
                    'phone' => '0875757',
                ],
            ],    
        ];

        foreach ($orders as $order_item) {
            $order = Order::where('order_number', $order_item['order_number'])->first();
            if (!$order) {
                $order = new Order;
            }    
            $order->order_date = $order_item['order_date'];
            $order->order_number = $order_item['order_number'];
            
            $client = Client::where('email', $order_item['client']['email'])->first();
            if (!$client) {
                $client = new Client;
                $client->first_name = $order_item['client']['first_name'];
                $client->last_name = $order_item['client']['last_name'];
                $client->phone = $order_item['client']['phone'];
                $client->email = $order_item['client']['email'];
                $client->save();
            }
            $order->client_id = $client->id;


            $order->save();
            $order_sum = 0;
            foreach($details as $detail) {

                $order_sum += $product_sum;
            }    
            $order->order_sum = $order_sum;
            $order->save();

        }    
    }
}
