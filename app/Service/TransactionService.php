<?php

namespace App\Service;

use App\EloquentRepository\EloquentTransactionRepository;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use InvalidArgumentException;

class TransactionService{
    protected $eloquentTransaction;

    public function __construct(EloquentTransactionRepository $eloquentTransaction)
    {
        $this->eloquentTransaction = $eloquentTransaction;
    }

    public function findAll()
    {
        $data = $this->eloquentTransaction->findAll();
        return $data;
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'product_id' => 'required|exists:products,id',
            'transaction_code' => 'required|unique:transactions,transaction_code',
            'payment_method_id' => 'required|exists:payment_method,id',
            'customer_address_id' => 'required|exists:customer_address,id'
        ]);

        if($validator->fails())
        {
            throw new InvalidArgumentException($validator->errors()->first());
        }

        $data = $this->eloquentTransaction->create($request->all());
        return $data;
    }
}
