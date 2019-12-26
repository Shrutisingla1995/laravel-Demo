<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      DB::table('products')->insert(array(
          array(
              'name' => 'Printer',
              'price' => '5000',
          ),
          array(
              'name' => 'Pendrive',
              'price' => '300',
          ),
          array(
              'name' => 'Mouse',
              'price' => '350',
          ),
          array(
              'name' => 'Keyboard',
              'price' => '700',
          ),
      ));

    }
}
