<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reservation extends Model
{
    use HasFactory;
    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function offices(): BelongsTo
    {
        return $this->belongsTo(Office::class);
    }
}
