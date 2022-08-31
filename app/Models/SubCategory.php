<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;
    protected $fillable = ['name','slug','image','extract','description','category_id'];
    public function getRouteKeyName(){
        return 'slug';
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }
}
