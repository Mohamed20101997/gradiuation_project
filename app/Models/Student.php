<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;

class Student extends Authenticatable
{
    use Notifiable;

    protected $fillable = ['name', 'email', 'password','college_id'];

    protected $hidden = ['password', 'remember_token'];
    public $timestamps = false;



    public function college(){
        return $this->belongsTo(College::class , 'college_id' , 'id');
    }

    public function scopeWhenSearch($query , $search)
    {
        return $query->when($search , function($q) use ($search){
            return $q->where('name' , 'like' , "%$search%")
                    ->orWhere('email' , 'like' , "%$search%");
        });

    } //end of scopeWhenSearch


}
