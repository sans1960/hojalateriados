<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['nombre','referencia','slug','descripcion','comentarios','imagen','subcategory_id','tipo','precio','opcion'];


    public function getRouteKeyName(){
        return 'slug';
    }
    
    public function subcategory(){
        return $this->belongsTo(SubCategory::class);
    }
}
