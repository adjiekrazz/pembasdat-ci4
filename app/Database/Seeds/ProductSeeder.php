<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ProductSeeder extends Seeder
{
	public function run()
	{
		$data = [
            [
                'product_name' => 'Nabati Wafer',
                'product_price' => '2000'
            ],
            [
                'product_name' => 'Taro Seaweed',
                'product_price' => '5000'
            ],
            [
                'product_name' => 'Gudang Garam Signature',
                'product_price' => '17500'
            ],
            [
                'product_name' => 'Susu Dancow',
                'product_price' => '4000'
            ],
            [
                'product_name' => 'Cornetto Ice Cream',
                'product_price' => '7000'
            ],
            [
                'product_name' => 'Magnum Ice Cream',
                'product_price' => '10000'
            ],
            [
                'product_name' => 'Chocolatos',
                'product_price' => '1000'
            ],
            [
                'product_name' => 'Lays',
                'product_price' => '5000'
            ],
            [
                'product_name' => 'Kacang Garuda',
                'product_price' => '4000'
            ],
            [
                'product_name' => 'Big Cola',
                'product_price' => '5000'
            ],
        ];

        $this->db->table('products')->insertBatch($data);
	}
}
