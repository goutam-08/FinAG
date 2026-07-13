<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Goals extends Model
{
    protected $fillable = [
        'user_id',
        'goal_name',
        'category',
        'target_amount',
        'saved_amount',
        'target_date',
        'priority',
        'status',
        'notes',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
