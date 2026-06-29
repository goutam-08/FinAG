<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    protected $fillable = [
        'user_id',
        'category_name',
        'category_type',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
