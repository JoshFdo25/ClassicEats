<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $connection = 'mongodb';
    protected $table = 'categories';

    protected $fillable = [
        'name',
        'image'
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
