<?php

use Illuminate\Database\Seeder;
use App\Models\Client;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $clients = [
            [
                'first_name' => 'Ivan',
                'last_name' => 'Ivanov',
                'phone' => '0888888',
                'email' => 'ivan@abv.bg',
            ],
            [
                'first_name' => 'Peter',
                'last_name' => 'Ivanov',
                'phone' => '083333',
                'email' => 'peter@abv.bg',
            ],
            [
                'first_name' => 'Dimitar',
                'last_name' => 'Dimitrov',
                'phone' => '0887777',
                'email' => 'dimitar@abv.bg',
            ],
            [
                'first_name' => 'Todor',
                'last_name' => 'Iliev',
                'phone' => '08844566',
                'email' => 'todor@abv.bg',
            ],
        ];

        foreach ($clients as $client_item) {
            $client = Client::where('email', $client_item['email'])->first();
            if (!$client) {
                $client = new Client;
            }    
            $client->first_name = $client_item['first_name'];
            $client->last_name = $client_item['last_name'];
            $client->phone = $client_item['phone'];
            $client->email = $client_item['email'];
            $client->save();
        }    
    }
}
