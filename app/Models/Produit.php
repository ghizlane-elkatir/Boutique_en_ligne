<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'prix',
        'images',
        'stock',
        'categorie_id'
    ];
    public function getPrice()
    {
        return $this->prix;
    }
    public function cartItems()
    {
        return $this->hasMany(CartItem::class);
    }

}
