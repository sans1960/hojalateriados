<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['name','slug','image','extract','description'];
    public function getRouteKeyName(){
        return 'slug';
    }
    public function subcategory(){
        return $this->hasMany(SubCategory::class);
    }
    public function producto(){
        return $this->hasMany(Producto::class);
    }
}
