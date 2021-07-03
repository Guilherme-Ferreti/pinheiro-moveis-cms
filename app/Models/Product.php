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

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, fn($query, string $search) => 
            $query->where('name', 'like', "%$search%")
        );
    }

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

    public function currentPricing(int $state_id = self::DEFAULT_PRICING_STATE) : ?Price
    {
        return Price::select('prices.*')
            ->join('price_lists', function ($join) {
                $join->on('prices.price_list_id', '=', 'price_lists.id')
                        ->whereDate('price_lists.started_at', '<=', now())
                        ->whereDate('price_lists.ended_at', '>=', now());
            })
            ->where('prices.state_id', $state_id)
            ->where('prices.product_id', $this->id)
            ->first();

        /*  
            Notice: whereHas implementation replaced by join clauses for better performance
            
            return $this->prices()
                    ->whereHas('priceList', function ($query) {
                        $query->current();
                    })
                    ->where('state_id', $state_id)
                    ->first();
        */
    }

    public function isAvailable(int $state_id = self::DEFAULT_PRICING_STATE) : bool
    {
        return $this->hasPrice($state_id) && $this->hasStock();
    }

    public function hasPrice(int $state_id = self::DEFAULT_PRICING_STATE) : bool
    {
        $price = $this->currentPricing($state_id);

        return $price ? (bool) $price->amount : false;
    }

    public function hasStock() : bool
    {
        return (bool) $this->stock;
    }

    public function getStockAttribute () : int
    {
        // TODO: create stock functionality

        return 0;
    }
}
