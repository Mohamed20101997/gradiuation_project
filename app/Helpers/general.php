
<?php

use App\Models\College;

function uploadImage($folder, $image){
    $image->store('/public', $folder);
    $filename = $image->hashName();
    return  $filename;
 }

function remove_previous($folder,$model)
 {
    Storage::disk($folder)->delete($model->image);

 } //end of remove_previous function

function remove_image($folder,$image)
 {
    Storage::disk($folder)->delete($image);

 } //end of remove_previous function

function image_path($val)
 {
    return asset('storage/images/public/'. $val);
 }

function colleges(){
    $doctor = auth()->guard('doctor')->user()->id;

    $colleges = College::whereHas('subject', function ($query) use($doctor){
        return $query->where('doctor_id', $doctor);
    })->get();

    return $colleges;

}




