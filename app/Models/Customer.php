<?php

namespace App\Models;

use Database\Factories\CustomerFaker;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use SoftDeletes, HasFactory;

    public function Address()
    {
        return $this->hasOne(CustomerAddress::class);
    }

    protected static function newFactory()
    {
        return CustomerFaker::new();
    }
}
