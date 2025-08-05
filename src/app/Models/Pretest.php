<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pretest extends Model
{
    use HasFactory;
    protected $fillable = ['keyword', 'description'];

    public function scopeKeywordSearch($query, $keyword)
    {
        if (!empty($keyword)) {
            $query->where('keyword', 'like', '%' . $keyword . '%');
        }
    }
}


