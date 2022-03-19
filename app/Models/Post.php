<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes as EloquentSoftDeletes;

class Post extends Model
{
    use HasFactory;

    use EloquentSoftDeletes;

    protected $table = 'posts';
    public $primaryKey = 'id';
    public $timestamps = true;

    public function user(){
        return $this->belongsTo(User::class);
    }
}
