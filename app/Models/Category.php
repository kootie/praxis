<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes as EloquentSoftDeletes;

class Category extends Model
{
    use HasFactory;

    use EloquentSoftDeletes;

    public function jobs(){
        return $this->hasMany(Job::class,'category_id');
    }
}
