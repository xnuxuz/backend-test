<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use SoftDeletes;

    protected $fillable = ['transaction_code'];

    public function DetailTransaction()
    {
        return $this->hasMany(DetailTransaction::class);
    }
}
