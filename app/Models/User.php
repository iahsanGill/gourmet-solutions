<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password', 'is_admin', 'description'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function lunchBoxes()
    {
        return $this->hasMany(LunchBox::class);
    }

    public function receivedOrders()
    {
        return $this->hasMany(Order::class);
    }
}
