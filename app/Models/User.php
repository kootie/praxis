<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //Role Relationship
    public function role(){
        return $this->belongsTo(Role::class);
    }

    public function posts(){
        return $this->hasMany(Post::class,'user_id', 'id')->orderBy('created_at','DESC');;
    }

    public function items(){
        return $this->hasMany(Item::class,'user_id', 'id')->orderBy('created_at','DESC');;
    }

    
    public function Favourites(){
        return $this->hasMany(Favourite::class);
    }


    public function hasRole($Role){
	    return null !== $this->role()->where('name',$Role)->first();
    }

       //Role Relationship
    public function jobs(){
        return $this->hasMany(Job::class, 'user_id', 'id')->orderBy('created_at','DESC');
    }

    public function Threads(){
        return $this->belongsToMany(Thread::class);
    }

    public function Messages(){
        return $this->hasMany(Message::class,'user_id');
    }
   
}
