<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'categoryId',
        'qunatity',
        'discount_price',
        'price',
        'image',
        'description',
    ];
    public function category()
    {
        return $this->belongsTo(Category::class, 'categoryId');
    }
}
