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
        ];

        $this->db->table('products')->insertBatch($data);
	}
}
