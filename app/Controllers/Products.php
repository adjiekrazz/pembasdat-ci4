<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProductModel;
use CodeIgniter\API\ResponseTrait;

class Products extends BaseController
{
    use ResponseTrait;
    protected $productModel;
    protected $validation;
    protected $authorization;
    protected $authentication;

    public function __construct()
    {
        $this->productModel = new ProductModel();
        $this->validation = \Config\Services::validation();
        $this->validation->setRules([
            'product_name' => ['label' => 'Product Name', 'rules' => 'required|min_length[3]'],
            'product_price' => ['label' => 'Product Price', 'rules' => 'required|integer']
        ]);
        $this->authorization = service('authorization');
        $this->authentication = service('authentication');
    }

	public function index()
	{
        helper(['form', 'url']);
		return view('products');
	}

    public function getProducts()
    {
        if (! $this->authorization->hasPermission('read', $this->authentication->user()->id)){
            return $this->failForbidden("You don't have permissions to view resources.");
        } else {
            $search = $this->request->getVar('search')['value'];
            $limit = $this->request->getVar('length');
            $start = $this->request->getVar('start');
            $order_index = $this->request->getVar('order')[0]['column'];
            $order_field = $this->request->getVar('columns')[$order_index]['data'];
            $order_ascdesc = $this->request->getVar('order')[0]['dir'];

            $products_query = $this->productModel->orderBy($order_field, $order_ascdesc);
            if ($search)
            {
                $products_query = $products_query->like('product_name', $search);
            }
            $products_data = $products_query->findAll($limit, $start);
            $products_filter_total = $products_query->countAll();
            $products_total = $this->productModel->countAll();

            $callback = array(
                'draw' => $this->request->getVar('draw'),
                'recordsTotal' => $products_total,
                'recordsFiltered' => $products_filter_total,
                'data' => $products_data,
            );

            header('Content-Type: application/json');
            echo json_encode($callback);
        }
    }

    public function addProduct()
    {
        if (! $this->authorization->hasPermission('create', $this->authentication->user()->id)){
            return $this->failForbidden("You don't have permissions to create new resources.");
        } else {
            $product_data = [
                'product_name' => $this->request->getVar('product_name'),
                'product_price' => $this->request->getVar('product_price')
            ];
    
            if ($this->validation->run($product_data))
            {
                $this->productModel->insert($product_data);
                return $this->respondCreated($product_data);
            } else {
                return $this->failValidationErrors($this->validation->getErrors());
            }
        }
    }

    public function editProduct()
    {
        if (! $this->authorization->hasPermission('edit', $this->authentication->user()->id)){
            return $this->failForbidden("You don't have permissions to edit resources.");
        } else {
            $product_data = [
                'product_name' => $this->request->getVar('product_name'),
                'product_price' => $this->request->getVar('product_price')
            ];

            if ($this->validation->run($product_data))
            {
                $this->productModel->update($this->request->getVar('product_id'), $product_data);
                return $this->respondCreated($product_data);
            } else {
                return $this->failValidationErrors($this->validation->getErrors());
            }
        }
    }

    public function deleteProduct($id = null)
    {
        if ($id === null)
        {
            return $this->failNotFound('Product ID cannot be null');
        }

        if (! $this->authorization->hasPermission('delete', $this->authentication->user()->id)){
            return $this->failForbidden("You don't have permissions to delete resources.");
        } else {
            if ($this->productModel->delete($id))
            {
                $this->respondDeleted($id);
            }
        }
    }
}