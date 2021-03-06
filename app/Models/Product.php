<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'price',
        'model',
        'supplier_id',
        'description',
        'category_id',
    ];

    public function categories()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
    public function suppliers()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id', 'id');
    }
}
