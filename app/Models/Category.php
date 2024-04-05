<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
            'kode',
            'name',
            'description',
    ];
    
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($category) {
            $category->generateId();
        });
    }

    public function generateId()
    {
        $maxId = DB::table('categories')->max('id');
        $this->id = $maxId ? $maxId + 1 : 1;
    }
}