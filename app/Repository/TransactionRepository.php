<?php

namespace App\Repository;

interface TransactionRepository{
    public function findAll();
    public function create(array $data);
}
