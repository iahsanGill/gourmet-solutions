<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LunchBox extends Model
{
    protected $fillable = [
        'name', 'description', 'price', 
        'ingredients', 'nutritional_info', 
        'is_available', 'user_id'
    ];

    protected $casts = [
        'is_available' => 'boolean',
        'price' => 'float'
    ];

    public function scopeAvailable($query)
    {
        return $query->where('is_available', true);
    }

    public function user()
    {
        return $this->belongsTo(User::class); // Added relationship
    }
}