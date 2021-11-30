
<?php

use App\Models\College;

function uploadImage($folder, $image){
    $image->store('/files', $folder);
    $filename = $image->hashName();
    return  $filename;
 }

function remove_previous($model)
 {
     $image_path = public_path().'/uploads/files/'.$model->files;
     if(file_exists($image_path)){
         unlink($image_path);
     }

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




