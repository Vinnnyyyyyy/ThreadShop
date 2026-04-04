<?php
 
namespace App\Models;
 
use Illuminate\Database\Eloquent\Model;
 
class Product extends Model
{
    // These fields can be mass-assigned (saved from a form)
    protected $fillable = [
        'name',
        'description',
        'price',
        'category',
        'size',
        'stock',
        'image',
    ];
}
 