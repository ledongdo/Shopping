<?php 
namespace App\Traits;
use Storage;

trait StorageImageTrait{
    public function storageTraitUpload($request,$fileName,$foderName)
    {
        if($request->hasFile($fileName)){
            $file =  $request->$fileName;
    $fileNameOrigin = $file->getClientOriginalName();
    $fileNameHash = str_random(20) . '.' .$file->getClientOriginalExtension();
    $filePath = $request->file($fileName)->storeAs('public/'. $foderName. '/' .auth()->id(),$fileNameHash);
    $dataUploadTrait = [
        'file_name' =>$fileNameOrigin,
        'file_path' =>Storage::url($filePath)

    ];  
    return $dataUploadTrait;
    }
      return null;  
    }

    public function storageTraitUploadMutiple($file,$foderName)
    {
        
            
    $fileNameOrigin = $file->getClientOriginalName();
    $fileNameHash = str_random(20) . '.' .$file->getClientOriginalExtension();
    $filePath = $file->storeAs('public/'. $foderName. '/' .auth()->id(),$fileNameHash);
    $dataUploadTrait = [
        'file_name' =>$fileNameOrigin,
        'file_path' =>Storage::url($filePath)

    ];  
    return $dataUploadTrait;
    
      return null;  
    }
    
}
?>