<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DoctorSubject extends Model
{
    protected $fillable = ['subject_id','doctor_id','files','title','description'];
    public $timestamps = false;

    //////// Relations  //////////////
    ///
    public function subject(){
        return $this->belongsTo(Subjecte::class , 'subject_id','id');
    }

    public function doctor(){
        return $this->belongsTo(Doctor::class , 'doctor_id','id');
    }


}
