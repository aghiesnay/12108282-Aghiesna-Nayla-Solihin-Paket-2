<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail_Sale extends Model
{
    use HasFactory;

    protected $fillable = [
        'sale_id',
        'product_id',
        'amount',
        'sub_total',
    ];

    protected $table = 'detail_sales'; 

    public function product()
    {
        // Many-to-one relationship with Product model, using 'product_id' as foreign key
        return $this->belongsTo(Product::class, 'product_id');
    }
}

