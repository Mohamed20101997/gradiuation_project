<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    protected $fillable = ['name'];
    public $timestamps = false;

    public function scopeWhenSearch($query , $search)
    {
        return $query->when($search , function($q) use ($search){
            return $q->where('name' , 'like' , "%$search%") ;
        });

    } //end of scopeWhenSearch


    public function subject(){
        return $this->hasMany(Subjecte::class , 'semester_id','id');
    }
}
