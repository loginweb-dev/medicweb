<?php

use Illuminate\Database\Seeder;

class PaymentAccountsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('payment_accounts')->delete();
        
        \DB::table('payment_accounts')->insert(array (
            0 => 
            array (
                'id' => 1,
                'title' => 'Payment 1',
                'image' => 'payment-accounts/September2020/IzapzuZC3qIfjDGSZooP.jpg',
                'number' => 'Nº 1000000543535',
                'name' => 'John Doe',
                'type' => 'Caja de ahorro',
                'ci' => '1234567 - Bn',
                'currency' => 'Bolivianos',
                'created_at' => '2020-09-28 19:01:32',
                'updated_at' => '2020-09-28 19:01:32',
            ),
            1 => 
            array (
                'id' => 2,
                'title' => 'Payment 2',
                'image' => 'payment-accounts/September2020/0K0S9jJ78PixdFqTsngy.jpg',
                'number' => 'Nº 1000000543535',
                'name' => 'John Doe',
                'type' => 'Caja de ahorro',
                'ci' => '1234567 - Bn',
                'currency' => 'Bolivianos',
                'created_at' => '2020-09-28 19:04:11',
                'updated_at' => '2020-09-28 19:04:11',
            ),
        ));
        
        
    }
}