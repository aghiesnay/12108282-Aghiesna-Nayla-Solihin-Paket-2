<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'user_id',
        'sales_date',
        'total_price',
        'pay',
        'change',
    ];

    public function customer()
    {
        //Many to one
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function user()
    {
        //Many to one
        return $this->belongsTo(User::class, 'user_id');
    }
}
