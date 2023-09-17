<?php

namespace App\Http\Controllers;

use App\Service\ProductService;
use Illuminate\Http\Request;

class ProductController extends BaseController
{
    protected $serviceProduct;

    public function __construct(ProductService $serviceProduct)
    {
        $this->serviceProduct = $serviceProduct;
    }

    public function index()
    {
        try {
            $data = $this->serviceProduct->findAll();
            return $this->out(data:$data, status:'OK');
        } catch (\Throwable $th) {
            return $this->out(status: 500, error: $th->getMessage());
        }
    }

    public function find($id)
    {
        try {
            $data = $this->serviceProduct->find($id);
            return $this->out(data:$data, status:'OK');
        } catch (\Throwable $th) {
            return $this->out(status: 500, error: $th->getMessage());
        }
    }

    public function store(Request $request)
    {
        try {
             $data = $this->serviceProduct->create($request);
            return $this->out(data:$data, status:'OK');
        } catch (\Throwable $th) {
            return $this->out(status: 500, error: $th->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        try {
             $data = $this->serviceProduct->update($request, $id);
            return $this->out(data:$data, status:'OK');
        } catch (\Throwable $th) {
            return $this->out(status: 500, error: $th->getMessage());
        }
    }

    public function destroy($id)
    {
        try {$data = $this->serviceProduct->delete($id);
            return $this->out(data:$data, status:'OK');
        } catch (\Throwable $th) {
            return $this->out(status: 500, error: $th->getMessage());
        }
    }
}
