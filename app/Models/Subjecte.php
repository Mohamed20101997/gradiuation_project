<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subjecte extends Model
{
    protected $fillable = ['name','hours','college_id','semester_id','doctor_id'];






    ///////////////// Relation ////////////

    public function college(){
        return $this->belongsTo(College::class, 'college_id', 'id');
    }


    public function semester(){
        return $this->belongsTo(Semester::class, 'semester_id', 'id');
    }

    public function doctor(){
        return $this->belongsTo(Admin::class, 'doctor_id', 'id');
    }

    public function scopeWhenSearch($query , $search)
    {
        return $query->when($search , function($q) use ($search){
            return $q->where('name' , 'like' , "%$search%") ;
        });

    } //end of scopeWhenSearch


//    public function scopeWhenRole($query , $search)
//    {
//        return $query->when($search , function($q) use ($search){
//            return $q->where('role',$search) ;
//        });
//
//    } //end of scopeWhenSearch
}
