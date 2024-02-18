<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentMethods extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $fillable = ['method_name', 'account_name', 'account_number'];
}
