
<?php

use App\Models\Review;
use \App\Models\User;


define('PAGINATION_COUNT', 15);

function getFolder(){

    return  app()->getLocale() === 'ar' ? 'css-rtl' : 'css';

}

function parent($id){
    $paret  = \App\Models\Category::where('id', $id)->whereTranslation('locale','en')->get();
    foreach ($paret as $p)
    {
         return $p->name;
    }
}


function uploadImage($folder,$image){
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
    return asset('storage/images/'. $val);
 }


 function user(){
    return auth()->guard('users');
}

function average($id){
    $rating = Review::where('product_id', $id)->get();
    $count =  $rating->count();
    $sum = 0 ;
    foreach ($rating as $rat){
        $sum += $rat->rating;
    }
    if($count > 0){
        $average = floor($sum/$count);
    }else{
        $average = 0 ;
    }

    return $average;
}

function getUser($id){
    return User::find($id);
}

