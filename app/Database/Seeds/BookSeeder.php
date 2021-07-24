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
                'status' => 'Not Available'
            ],
            [
                'code' => 'KD002',
                'title' => 'Nine Lives',
                'year' => 2021,
                'author' => 'Danielle Steel',
                'publisher' => 'Penguin Random House',
                'publication_year' => 2021,
                'status' => 'Available'
            ],
            [
                'code' => 'KD003',
                'title' => 'Six Crimson Cranes',
                'year' => 2021,
                'author' => 'Elisabeth Lim',
                'publisher' => 'Penguin Random House',
                'publication_year' => 2021,
                'status' => 'Available'
            ],
            [
                'code' => 'KD004',
                'title' => 'Count the Ways',
                'year' => 2021,
                'author' => 'Joyce Maynard',
                'publisher' => 'HarperCollins',
                'publication_year' => 2021,
                'status' => 'Available'
            ],
            [
                'code' => 'KD005',
                'title' => 'Island Queen',
                'year' => 2021,
                'author' => 'Vanessa Riley',
                'publisher' => 'HarperCollins',
                'publication_year' => 2021,
                'status' => 'Available'
            ],
            [
                'code' => 'KD006',
                'title' => 'The Maidens',
                'year' => 2021,
                'author' => 'Alex Michaelides',
                'publisher' => 'Macmillan',
                'publication_year' => 2021,
                'status' => 'Available'
            ],
            [
                'code' => 'KD007',
                'title' => 'One Last Stop',
                'year' => 2021,
                'author' => 'Casey McQuiston',
                'publisher' => 'Macmillan',
                'publication_year' => 2021,
                'status' => 'Available'
            ],
            [
                'code' => 'KD008',
                'title' => 'Any Way the Wind Blows',
                'year' => 2021,
                'author' => 'Rainbow Rowell',
                'publisher' => 'Macmillan',
                'publication_year' => 2021,
                'status' => 'Available'
            ],
            [
                'code' => 'KD009',
                'title' => 'American Marxism',
                'year' => 2021,
                'author' => 'Mark R. Levin',
                'publisher' => 'Simon & Schuster',
                'publication_year' => 2021,
                'status' => 'Available'
            ],
            [
                'code' => 'KD010',
                'title' => 'It Ends with Us',
                'year' => 2016,
                'author' => 'Colleen Hoover',
                'publisher' => 'Simon & Schuster',
                'publication_year' => 2016,
                'status' => 'Available'
            ],
            [
                'code' => 'KD011',
                'title' => 'Falling',
                'year' => 2021,
                'author' => 'T. J. Newman',
                'publisher' => 'Simon & Schuster',
                'publication_year' => 2021,
                'status' => 'Available'
            ],
            [
                'code' => 'KD012',
                'title' => 'Anxious People',
                'year' => 2021,
                'author' => 'Fredrik Backman',
                'publisher' => 'Simon & Schuster',
                'publication_year' => 2021,
                'status' => 'Available'
            ],
            [
                'code' => 'KD013',
                'title' => 'The Unhoneymooners',
                'year' => 2019,
                'author' => 'Christina Lauren',
                'publisher' => 'Simon & Schuster',
                'publication_year' => 2019,
                'status' => 'Available'
            ],
            [
                'code' => 'KD014',
                'title' => 'Grit',
                'year' => 2018,
                'author' => 'Angela Duckworth',
                'publisher' => 'Simon & Schuster',
                'publication_year' => 2018,
                'status' => 'Available'
            ],
            [
                'code' => 'KD015',
                'title' => 'Mis 10th Edition',
                'year' => 2021,
                'author' => 'Hossein Bidgoli',
                'publisher' => 'Cengage',
                'publication_year' => 2021,
                'status' => 'Available'
            ],
            [
                'code' => 'KD016',
                'title' => 'Oracle 12C 3rd Edition',
                'year' => 2016,
                'author' => 'Joan Casteel',
                'publisher' => 'Cengage',
                'publication_year' => 2016,
                'status' => 'Available'
            ],
            [
                'code' => 'KD017',
                'title' => 'C# Programming 5th Edition',
                'year' => 2016,
                'author' => 'Barbara Doyle',
                'publisher' => 'Cengage',
                'publication_year' => 2016,
                'status' => 'Available'
            ],
            [
                'code' => 'KD018',
                'title' => 'Java Programming 8th Edition',
                'year' => 2016,
                'author' => 'Joyce Farrell',
                'publisher' => 'Cengage',
                'publication_year' => 2016,
                'status' => 'Available'
            ],
            [
                'code' => 'KD019',
                'title' => 'Encyclopedia of Neuroscience',
                'year' => 2009,
                'author' => 'Marc D. Binder',
                'publisher' => 'Springer Nature',
                'publication_year' => 2009,
                'status' => 'Available'
            ],
            [
                'code' => 'KD020',
                'title' => 'Successful Emotions',
                'year' => 2016,
                'author' => 'Lochner, Katharina',
                'publisher' => 'Springer Nature',
                'publication_year' => 2016,
                'status' => 'Available'
            ],
            [
                'code' => 'KD021',
                'title' => 'Process Mining',
                'year' => 2016,
                'author' => 'Van Der Aalst, Wil',
                'publisher' => 'Springer Nature',
                'publication_year' => 2016,
                'status' => 'Available'
            ],
        ];

        $this->db->table('books')->insertBatch($data);
	}
}
