<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $connection = 'mongodb';
    protected $collection = 'products';

    protected $fillable = [
        'name', 
        'description', 
        'ingredients', 
        'price', 
        'image', 
        'category_id',
        'category_name', 
        'status',
    ];
    
    public function isAvailable()
    {
        return $this->status;
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
