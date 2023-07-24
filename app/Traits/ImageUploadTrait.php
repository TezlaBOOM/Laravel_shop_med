<?php
namespace App\Traits;

use File;
use Illuminate\Http\Request;

trait ImageUploadTrait{

    public function uploadImage(Request $request, $inputName ,$path)
    {
        if($request->hasFile($inputName))
        {
            $image=$request->{$inputName};
            $ext = $image->getClientOriginalExtension();
            $imageName='media_'.uniqid().'.'.$ext;

            $image->move(public_path($path), $imageName);

            return $path.'/'.$imageName;

        }
    }
    public function uploadMultiImage(Request $request, $inputName, $path)
    {
        $imagePaths=[];
        if($request->hasFile($inputName))
        {
            $images = $request->{$inputName};
            foreach($images as $image){
                $ext = $image->getClientOriginalExtension();
                $imageName = 'media_'.uniqid().'.'.$ext;
                $image->move(public_path($path),$imageName);
                $imagePaths[]=$path.'/'.$imageName;
            }
            return $imagePaths;
        }
    }

    public function updateImage(Request $request, $inputName ,$path, $oldPath=null)
    {
        if($request->hasFile($inputName)){
            if(File::exists(public_path($oldPath))){
                File::exists(public_path($oldPath));
            }
        
            $image=$request->{$inputName};
            $ext = $image->getClientOriginalExtension();
            $imageName='media_'.uniqid().'.'.$ext;

            $image->move(public_path($path), $imageName);

            return $path.'/'.$imageName;

        }
    }
    public function deleteImage(string $Path)
    {
        if(File::exists(public_path($Path))){
            File::exists(public_path($Path));
        }
    }
}