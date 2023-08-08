<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Customer extends Model
{
    use HasFactory , SoftDeletes;

    protected $fillable = ['name' , 'age' , 'email','phone' , 'address' , 'career' ,'user_id', 'deleted_at' ];

    public function user()
     {
        return $this->belongsTo(User::class , 'user_id' , 'id');
    }

    protected  static   function booted(){
        static::addGlobalScope('user' , function(Builder $query){
            $query->where('user_id' , '=' , Auth::id());
        });
    }


}