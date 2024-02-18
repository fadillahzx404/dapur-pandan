<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transactions extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $fillable = ['users_id', 'order_id', 'method_id', 'tax', 'total_price', 'method_payment', 'transaction_status', 'expired_time','image_confirm'];

    public function methodPay()
    {
        return $this->belongsTo(PaymentMethods::class, 'method_id', 'id');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }
}
