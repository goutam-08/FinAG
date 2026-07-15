<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Goal extends Model
{
    protected $table = 'goals';

    protected $casts = [
        'target_date' => 'date',
        'target_amount' => 'decimal:2',
        'saved_amount' => 'decimal:2',
    ];

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
