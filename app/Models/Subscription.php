<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'duration',
        'features',
        'is_active',
        'icon_url',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'duration' => 'integer',
        'features' => 'array',
        'is_active' => 'boolean',
    ];

    public function userSubscriptions()
    {
        return $this->hasMany(UserSubscription::class);
    }
}
