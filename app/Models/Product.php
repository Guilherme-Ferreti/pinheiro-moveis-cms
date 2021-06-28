<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    const DEFAULT_PRICING_STATE = 25; // São Paulo

    protected $fillable = ['name', 'description', 'slug'];

    public function files()
    {
        return $this->morphMany(File::class, 'fileable');
    }

    public function images()
    {
        return $this->morphMany(File::class, 'fileable')->where('mime_type', 'like', 'image/%');
    }

    public function prices()
    {
        return $this->hasMany(Price::class);
    }

    public function currentPrice(int $state_id = self::DEFAULT_PRICING_STATE)
    {
        return $this->prices()
                ->where('state_id', $state_id)
                ->first()
                ->price;
    }
}
