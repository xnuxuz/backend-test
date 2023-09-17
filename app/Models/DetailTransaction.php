<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailTransaction extends Model
{
    protected $table = 'detail_transaction';

    protected $fillable = ['product_id', 'transaction_id', 'payment_method_id', 'customer_address_id'];

    protected $with = [
        'Product',
        'PaymentMethod',
        'CustomerAddress'
    ];

    public function Transaction()
    {
        return $this->hasOne(Transaction::class);
    }

    public function Product()
    {
        return $this->belongsTo(Product::class);
    }

    public function PaymentMethod()
    {
        return $this->belongsTo(PaymentMethod::class);
    }

    public function CustomerAddress()
    {
        return $this->belongsTo(CustomerAddress::class);
    }
}
