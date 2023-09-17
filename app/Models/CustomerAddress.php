<?php

namespace App\Models;

use Database\Factories\CustomerAddressFaker;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CustomerAddress extends Model
{
    use SoftDeletes, HasFactory;

    protected $table = 'customer_address';

    protected $with = [ 'Customer' ];

    public function Customer()
    {
        return $this->belongsTo(Customer::class);
    }
    protected static function newFactory()
    {
        return CustomerAddressFaker::new();
    }
}
