<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Storage;
class Helpers extends Controller
{
    public function isValid($data , $rules){

        $isvalid = Validator::make($data,$rules);
        if($isvalid->fails()){
            return redirect()->back()->withErrors($isValid);
        }

    }

    public function addFile($folderName, $file, $fileUrl){
        
        
        $path = public_path($folderName);
        
        $filename = $file->getClientOriginalName();
        $file->move($path,$filename);
        //Storage::disk('local')->put($path, file_get_contents($file));
        
        $storagePath = $fileUrl.$folderName.$filename;

        return $storagePath;

    }
}
