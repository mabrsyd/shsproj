<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Inventory extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'category',
        'stock',
        'price',
        'image',
        'condition',
        'is_visible',
        'sku',
        'minimum_stock',
        'notify_low_stock'
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'is_visible' => 'boolean',
        'notify_low_stock' => 'boolean',
    ];

    // Check if stock is low
    public function isLowStock(): bool
    {
        return $this->stock <= $this->minimum_stock;
    }

    // Get status label
    public function getStockStatusAttribute(): string
    {
        if ($this->stock <= 0) {
            return 'Out of Stock';
        } elseif ($this->isLowStock()) {
            return 'Low Stock';
        }
        return 'In Stock';
    }

    // Scope for visible items
    public function scopeVisible($query)
    {
        return $query->where('is_visible', true);
    }

    // Scope for low stock items
    public function scopeLowStock($query)
    {
        return $query->whereRaw('stock <= minimum_stock');
    }
}