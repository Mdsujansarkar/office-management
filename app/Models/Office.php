<?php

declare(strict_types=1);

namespace App\Models;

use App\Models\Reservation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Office extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'user_id',
        'title',
        'description',
        'lat',
        'lng',
        'address_line1',
        'address_line2',
        'approval_status',
        'hidden',
        'price_per_day',
        'monthly_discount'
    ];
    protected $casts = [
        'lat' => 'decimal',
        'lng' => 'decimal',
        'approval_status' => 'integer',
        'hidden' => 'boolean',
        'price_per_day' => 'integer',
        'monthly_discount' => 'integer'
    ];
    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function reservations(): HasMany
    {
        return $this->hasMany(Reservation::class);
    }
    public function images(): MorphMany
    {
        return $this->morphMany(Image::class, 'resource');
    }
}
