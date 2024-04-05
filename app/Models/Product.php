<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
            'kode',
            'name',
            'price',
            'stock',
            'category',
            'brand',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($product) {
            $product->generateId();
        });
    }

    public function generateId()
    {
        $maxId = DB::table('products')->max('id');
        $this->id = $maxId ? $maxId + 1 : 1;
    }
}