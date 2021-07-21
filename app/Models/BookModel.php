<?php

namespace App\Models;

use CodeIgniter\Model;

class BookModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'books';
	protected $primaryKey           = 'id';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDeletes       = false;
	protected $protectFields        = true;
	protected $allowedFields        = ['code', 'title', 'year', 'author', 'publisher', 'publication_year', 'status'];

	// Dates
	protected $useTimestamps        = false;
	protected $dateFormat           = 'datetime';
	protected $createdField         = 'created_at';
	protected $updatedField         = 'updated_at';
	protected $deletedField         = 'deleted_at';

	// Validation
	protected $validationRules      = [
		'code' => [
			'label' => 'Code', 
			'rules' => 'required|min_length[5]|' // should be is_unique[books.code], but it's buggy
		],
    	'title' => [
			'label' => 'Title',
			'rules'  => 'required'
		],
		'year' => [
			'label' => 'Year',
			'rules'  => 'integer|min_length[4]'
		],
		'author' => [
			'label' => 'Author',
			'rules' => 'string'
		],
		'publisher' => [
			'label' => 'Publisher',
			'rules' => 'string'
		],
		'publication_year' => [
			'label' => 'Publication Year',
			'rules'  => 'integer|min_length[4]'
		],
		'status' => [
			'label' => 'Status',
			'rules' => 'string'
		],
	];
	protected $validationMessages   = [];
	protected $skipValidation       = false;
	protected $cleanValidationRules = true;

	// Callbacks
	protected $allowCallbacks       = true;
	protected $beforeInsert         = [];
	protected $afterInsert          = [];
	protected $beforeUpdate         = [];
	protected $afterUpdate          = [];
	protected $beforeFind           = [];
	protected $afterFind            = [];
	protected $beforeDelete         = [];
	protected $afterDelete          = [];
}
