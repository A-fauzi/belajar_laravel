<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'photo_url',
        'status_member',
        'favourites_destination',
        'wallet',
        'about',
    ];

    public function user()
    {
        return $this->hashOne(User::class);
    }
}
