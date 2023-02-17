<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Models\Products;

class Category extends Model
{
    use HasFactory;

    use HasFactory, SoftDeletes;

	protected $table = 'categories';

    protected $fillable = [
        'name',
    ];

    public function product()
    {
        return $this->hasMany(Product::class, 'category_id', 'id');
    }
}
