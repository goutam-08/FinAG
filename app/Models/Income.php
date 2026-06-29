<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    protected $table = 'incomes';

    protected $fillable = [
        'user_id',
        'title',
        'category_id',
        'amount',
        'description',
        'Cr_date',
        'Dr_date',
        'Cr_Dr',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
