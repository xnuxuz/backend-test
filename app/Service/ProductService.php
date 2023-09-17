<?php

namespace App\Service;

use App\EloquentRepository\EloquentProductRepository;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use InvalidArgumentException;

class ProductService{

    protected $eloquentProduct;

    public function __construct(EloquentProductRepository $eloquentProduct)
    {
        $this->eloquentProduct = $eloquentProduct;
    }

    public function findAll()
    {
        $data = $this->eloquentProduct->findAll();
        return $data;
    }

    public function find($id)
    {
        $data = $this->eloquentProduct->find($id);
        return $data;
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'price' => 'required'
        ]);

        if($validator->fails())
        {
            throw new InvalidArgumentException($validator->errors()->first());
        }

        $data = $this->eloquentProduct->create($request->all());
        return $data;
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'price' => 'required'
        ]);

        if($validator->fails())
        {
            throw new InvalidArgumentException($validator->errors()->first());
        }

        $data = $this->eloquentProduct->update($request->all(), $id);
        return $data;
    }

    public function delete($id)
    {
        $data = $this->eloquentProduct->delete($id);
        return $data;
    }
}
