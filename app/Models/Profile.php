<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Profile extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'user_id',
        'residence',
        'native',
        'contact',
        'alternate_contact',
        'date_of_birth',
        'facebook_username',
        'instagram_username',
        'linkedin_username',
    ];

    public function user(){
        $this->belongsTo('App\Models\User');
    }
}
