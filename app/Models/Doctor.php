<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;

class Doctor extends Authenticatable
{
    use Notifiable;

    protected $fillable = ['name', 'email', 'password','role'];

    protected $hidden = ['password', 'remember_token'];
    public $timestamps = false;




    public function scopeWhenSearch($query , $search)
    {
        return $query->when($search , function($q) use ($search){
            return $q->where('name' , 'like' , "%$search%")
                    ->orWhere('email' , 'like' , "%$search%");
        });

    } //end of scopeWhenSearch


    public function scopeWhenRole($query , $search)
    {
        return $query->when($search , function($q) use ($search){
            return $q->where('role',$search) ;
        });

    } //end of scopeWhenSearch

}
