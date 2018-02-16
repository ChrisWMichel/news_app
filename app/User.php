<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use PhpParser\Comment;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
      'firstname', 'lastname', 'email', 'password', 'email_token', 'is_permission'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
      'password', 'remember_token',
    ];

    public static function generateVerificationCode(){
        return str_random(40);
    }

    public function events(){
        return $this->hasMany(Event::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function contacts(){
        return $this->hasMany(Contact::class);
    }


}
