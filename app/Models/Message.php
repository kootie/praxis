<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Message extends Model
{
    use HasFactory;

    use SoftDeletes;

    public function Thread(){
        return $this->belongsTo(Thread::class);
    }

    public function User(){
        return $this->belongsTo(User::class);
    }
}
