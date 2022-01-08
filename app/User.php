<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Notifications\VerifyEmail;


class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    public function sendEmailVerificationNotification()
    {
        $this->notify(new VerifyEmail);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','picture','description','role','rating','ref','google_id','email_verified_at',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function threads(){

        return $this->hasMany('App\Models\Thread');

    }

    public function comments(){

        return $this->hasMany('App\Models\Comment');

    }

    public function rate(){

        return $this->getRating($this->threads()->count(), $this->comments()->count());
    }

    public function getRating($nb_threads, $nb_comments)
    {
        $rating = intdiv($nb_threads, 10) + intdiv($nb_comments, 5);
        return $rating;
    }
    
}
