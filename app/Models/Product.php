<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'title',
        'description',
        'category_id',
    ];

    public function categories() {
        return $this->belongsTo(Category::class,'category_id','id');
    }
}
