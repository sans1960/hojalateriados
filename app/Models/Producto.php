<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    protected $fillable = ['nombre','referencia','slug','descripcion','detalles','imagen','category_id','subcategory_id','estado','precio'];


    public function getRouteKeyName(){
        return 'slug';
    }
    
    public function subcategory(){
        return $this->belongsTo(SubCategory::class);
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }
}
