<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PriceList extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'started_at', 'ended_at'];

    protected $casts = [
        'started_at' => 'datetime',
        'ended_at' => 'datetime',
    ];

    public function scopeCurrent($query)
    {
        $query
            ->whereDate('started_at', '<=', now())
            ->whereDate('ended_at', '>=', now());
    }

    public function prices()
    {
        return $this->hasMany(Price::class);
    } 
}
