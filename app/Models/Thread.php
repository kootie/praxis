<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Thread extends Model
{
    use HasFactory;

    use SoftDeletes;

    //thread has many users
    public function Users(){
        return $this->belongsToMany(User::class);
    }

    public function Messages(){
        return $this->hasMany(Message::class,'thread_id');
    }

    public function Job(){
        return $this->belongsTo(Job::class);
    }
}
