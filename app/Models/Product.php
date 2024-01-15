<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'color',
        'in_stock',
        'photo',
        'price',
    ];

    const COLOR_LIST = [
        'red' => 'Red',
        'blue' => 'Blue',
        'green' => 'Green',
        'yellow' => 'Yellow',
        'black' => 'Black',
        'white' => 'White',
    ];

    /**
     * Accessors
     */
    protected function price(): Attribute
    {
        return Attribute::make(
            get: fn($value) => $value / 100,
            set: fn($value) => $value * 100,
        );
    }

    /**
     * Relationship
     */
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}
