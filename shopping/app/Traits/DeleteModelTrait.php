<?php
namespace App\Traits;

use Illuminate\Support\Facades\Log;

trait DeleteModelTrait{
    public function deleteModelTrait($id,$model)
    {
        try{
            $model->find($id)->delete();
            return response()->json([
                'code'=> 200,
                'message'=> 'succes'
            ],200);
           }
           catch(\Exception $exception){
            log::error('Message:' . $exception->getMessage() . 'line' . $exception->getLine());
            return response()->json([
                'code'=> 500,
                'message'=> 'fail'
            ],500);
           }
    }
}