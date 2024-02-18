<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionDetails extends Model
{
    use HasFactory;
    public $table = 'transactions_details';
    protected $guarded = ['id'];
    protected $fillable = ['order_id', 'transaction_id', 'product_id', 'quantity'];

    public function products()
    {
        return $this->belongsTo(Products::class, 'product_id', 'id');
    }
}
