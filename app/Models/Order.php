<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'lunchbox_id',
        'customer_name',
        'contact_number',
        'delivery_address'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function lunchbox()
    {
        return $this->belongsTo(LunchBox::class);
    }
}
