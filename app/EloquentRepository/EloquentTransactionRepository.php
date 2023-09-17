<?php

namespace App\EloquentRepository;

use App\Models\Transaction;

use App\Repository\TransactionRepository;

class EloquentTransactionRepository implements TransactionRepository{

    public function findAll()
    {
        return Transaction::with('DetailTransaction')->get();
    }

    public function create(array $data)
    {
        return Transaction::create([
            'transaction_code' => $data['transaction_code']
        ])->DetailTransaction()->create([
            'product_id' => $data['product_id'],
            'payment_method_id' => $data['payment_method_id'],
            'customer_address_id' => $data['customer_address_id']
        ]);
    }
}
