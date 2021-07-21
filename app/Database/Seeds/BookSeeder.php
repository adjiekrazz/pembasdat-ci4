<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class BookSeeder extends Seeder
{
	public function run()
	{
		$data = [
            [
                'code' => 'KD001',
                'title' => 'Batman/Fortnite: Zero Point',
                'year' => 2021,
                'author' => 'Christos Gage',
                'publisher' => 'Penguin Random House',
                'publication_year' => 2021,
                'status' => 'not available'
            ],
            [
                'code' => 'KD002',
                'title' => 'Nine Lives',
                'year' => 2021,
                'author' => 'Danielle Steel',
                'publisher' => 'Penguin Random House',
                'publication_year' => 2021,
                'status' => 'available'
            ],
            [
                'code' => 'KD003',
                'title' => 'Six Crimson Cranes',
                'year' => 2021,
                'author' => 'Elisabeth Lim',
                'publisher' => 'Penguin Random House',
                'publication_year' => 2021,
                'status' => 'available'
            ],
            [
                'code' => 'KD004',
                'title' => 'Count the Ways',
                'year' => 2021,
                'author' => 'Joyce Maynard',
                'publisher' => 'HarperCollins',
                'publication_year' => 2021,
                'status' => 'available'
            ],
            [
                'code' => 'KD005',
                'title' => 'Island Queen',
                'year' => 2021,
                'author' => 'Vanessa Riley',
                'publisher' => 'HarperCollins',
                'publication_year' => 2021,
                'status' => 'available'
            ],
        ];

        $this->db->table('books')->insertBatch($data);
	}
}
