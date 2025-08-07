<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pretest extends Model
{
    use HasFactory;
    protected $fillable = ['keyword', 'description'];

    public function scopeKeywordSearch($query, $key)
    {
        if (!empty($key)) {
            $query->where('keyword', 'like', '%' . $key . '%');
        }
    }
}


