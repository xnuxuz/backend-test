<?php

namespace App\EloquentRepository;

use App\Models\Product;
use App\Repository\ProductRepository;

class EloquentProductRepository implements ProductRepository{
    public function findAll()
    {
        return Product::all();
    }

    public function find(int $id)
    {
        return Product::findOrFail($id)->first();
    }

    public function create(array $data)
    {
        return Product::create([
            'name' => $data['name'],
            'price' => $data['price']
        ]);
    }

    public function update(array $data, int $id)
    {
        return Product::findOrFail($id)->update([
            'name' => $data['name'],
            'price' => $data['price'],
            'updated_at' => \Carbon\Carbon::now()
        ]);
    }

    public function delete(int $id)
    {
        return Product::findOrFail($id)->delete();
    }
}
