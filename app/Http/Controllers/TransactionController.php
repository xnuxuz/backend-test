<?php

namespace App\Http\Controllers;

use App\Service\TransactionService;
use Illuminate\Http\Request;

class TransactionController extends BaseController
{
    protected $serviceTransaction;

    public function __construct(TransactionService $serviceTransaction)
    {
        $this->serviceTransaction = $serviceTransaction;
    }

    public function index()
    {
        try {
            $data = $this->serviceTransaction->findAll();
           return $this->out(data:$data, status:'OK');
        } catch (\Throwable $th) {
            return $this->out(status: 500, error: $th->getMessage());
        }
    }

    public function store(Request $request)
    {
        try {
            $data = $this->serviceTransaction->create($request);
           return $this->out(data:$data, status:'OK');
        } catch (\Throwable $th) {
            return $this->out(status: 500, error: $th->getMessage());
        }
    }
}
